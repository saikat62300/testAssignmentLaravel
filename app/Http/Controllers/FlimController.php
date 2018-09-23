<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flim;
use App\Models\FlimGenre;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Response;
use Session;
use View;
use Yajra\Datatables\Datatables;

class FlimController extends Controller
{
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Flim::query()->where('status', 1))
            ->editColumn('action', function ($flim) {
                return '<a href="/updateFlim?id=' . $flim->id . '" title="Edit"><i class="fa fa-edit"></i></a>'
                . '&nbsp;&nbsp;&nbsp;'
                . '<a href="javascript:void(0)" data-id="' . $flim->id . '" class="item-remove" title="Remove" style="color:red;"><i class="fa fa-remove"></i></a>';
            })
            ->make(true);
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        return view('flim.index');
    }

    public function add(Request $request)
    {
        $data = [];
        $data['flimModel'] = $flimModel = new Flim;
        $data['flimGenreModel'] = $flimGenreModel = new FlimGenre;
        $data['isNew'] = 'yes';

        if (isset($_POST['_token']) && $_POST['_token'] != '') {
            $inputArr = $request->all();
            $genreInput = $inputArr['genre'];
            unset($inputArr['_token']);
            unset($inputArr['genre']);

            $validator = Validator::make($inputArr, Flim::Rules(), Flim::$messages);
            if ($validator->fails()) {
                return redirect('addFlim')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $time = strtotime($inputArr['realease_date']);
                $inputArr['realease_date'] = date('Y-m-d h:i:s', $time);
                $inputArr['status'] = 1;
                $inputArr['created_at'] = date('Y-m-d H:i:s');

                if ($flim = Flim::insert($inputArr)) {
                    $genreArr = [];
                    $genreArr['film_id'] = DB::getPdo()->lastInsertId();
                    $genres = explode(",", $genreInput);
                    foreach ($genres as $key => $genre) {
                        $genreArr['genre'] = $genre;
                        FlimGenre::insert($genreArr);
                    }
                    Session::flash('success', 'Flim has been added successfully !!');
                } else {
                    Session::flash('error', 'Some thing went wrong!!');
                }
            }
            return Redirect::action('FlimController@index');
        }

        return view('flim.add', $data);
    }

    public function update(Request $request)
    {
        if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
            $data = [];
            $data['flimModel'] = $flimModel = Flim::find($_REQUEST['id']);
            $time1 = strtotime($flimModel->realease_date);
            $flimModel->realease_date = date('Y-m-d', $time1);

            $data['isNew'] = 'no';

            if (!$flimModel) {
                return redirect(siteurl('manageFlims'));
            } else {
                $genreArr = [];
                $data['flimGenreModel'] = $flimGenreModel = $flimModel::find($_REQUEST['id'])->flimGenres;
                if ($flimGenreModel) {
                    foreach ($flimGenreModel as $flimGenreModelKey => $flimGenre) {
                        array_push($genreArr, $flimGenre->genre);
                    }
                }
                
                if($genreArr){
                    $flimGenreModel->genre = implode(",", $genreArr);
                }else{
                    $flimGenreModel->genre = '';
                }
                
                if (isset($_POST['_token']) && $_POST['_token'] != '') {
                    $data['isNew'] = 'no';
                    $inputArr = $request->all();
                    $genreInput = $inputArr['genre'];
                    $genreInputArr = explode(",", $genreInput);

                    unset($inputArr['_token']);
                    unset($inputArr['genre']);

                    $genreUpdatedInputArr = array_diff($genreArr, $genreInputArr);

                    $validator = Validator::make($inputArr, Flim::Rules());

                    if ($validator->fails()) {
                        return redirect('updateFlim')
                            ->withErrors($validator)
                            ->withInput();
                    } else {
                        $time = strtotime($inputArr['realease_date']);

                        $flimModel->slug = $inputArr['slug'];
                        $flimModel->name = $inputArr['name'];
                        $flimModel->description = $inputArr['description'];
                        $flimModel->realease_date = date('Y-m-d H:i:s', $time);
                        $flimModel->ticket_price = $inputArr['ticket_price'];
                        $flimModel->country = $inputArr['country'];
                        $flimModel->status = 1;
                        $flimModel->updated_at = date('Y-m-d H:i:s');

                        if ($flimModel->save()) {
                            $newGenreArr = [];
                            $newGenreArr['flim_id'] = $flimModel->id;
                            foreach ($newGenreArr as $newGenreArrKey => $newGenre) {
                                $newGenreArr['genre'] = $newGenre;
                                FlimGenre::insert($newGenreArr);
                            }
                            Session::flash('success', 'Flim has been updated successfully !!');
                        } else {
                            Session::flash('error', 'Some thing went wrong!!');
                        }
                        return Redirect::action('FlimController@index');
                    }
                }
                return view('flim.update', $data);
            }
        } else {
            return redirect(siteurl('manageFlims'));
        }
    }

    public function remove()
    {
        $resp = [];

        if (isset($_GET['id']) && $_GET['id'] != '') {
            $flimModel = Flim::find($_GET['id']);
            $flimModel->status = 3;

            if ($flimModel->save()) {
                $resp['type'] = 'success';
                $resp['msg'] = 'Success. Flim deleted successfully.';
            } else {
                $resp['type'] = 'error';
                $resp['msg'] = 'Error! Unable to delete Flim.';
            }
        } else {
            $resp['type'] = 'error';
            $resp['msg'] = 'Error! No Flim Id found.';
        }
        echo json_encode($resp);
        die();
    }

    //======= API Methods ========//

    public function getFlims(Request $request, $status = 1, $order = 'desc', $limit = 10)
    {
        $data = [];
        $status = isset($_GET['status']) ? $_GET['status'] : $status;
        $order = isset($_GET['order']) ? $_GET['order'] : $order;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : $limit;

        $flims = Flim::where('status', $status)
            ->orderBy('id', $order)
            ->take($limit)
            ->get();

        $data['type'] = 'success';
        $data['msg'] = 'success';
        $data['data'] = $flims;

        return response()->json($data);
    }

    public function getFlim(Request $request)
    {
        $data = [];
        $flimId = isset($_GET['id']) ? $_GET['id'] : '';
        if ($FlimId == '') {
            $data['type'] = 'error';
            $data['msg'] = 'Error! No Flim ID provided.';
            $data['data'] = '';
        } else {
            $Flim = Flim::find($flimId);
            if ($Flim) {
                $data['type'] = 'success';
                $data['msg'] = 'success';
                $data['data'] = $Flim;
            } else {
                $data['type'] = 'error';
                $data['msg'] = 'Error! No data exists for the fiven Flim ID.';
                $data['data'] = '';
            }
        }
        return response()->json($data);
    }

}
