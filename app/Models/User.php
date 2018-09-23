<?php

namespace App\Models;

use Auth;
use DB;
use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Lang;
use Response;
use Session;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable,
    Authorizable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'status', 'roles_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];
    protected $primaryKey = 'id';

    public function username()
    {
        return 'username';
    }

    public static function authorize($request, $inputs)
    {
        /* if either username or password is blank, then return invalid */
        if (empty($inputs['username']) || empty($inputs['password'])) {
            return Response::json(['success' => false, 'message' => Lang::get('messages.AUTH.FAILURE'), 'redir' => '']); // invalid credentials
        }

        /* check for provided credentials in DB */

        $user = DB::table('users')
            ->whereRaw('username="' . trim($inputs['username']) . '"')
            ->first();

        if (!empty($user->id)) {
            if (($user->roles_id != '1') and ($user->roles_id != '2')) {
                return Response::json(['success' => false, 'message' => 'Access denied! Do not have enough previlliage.', 'redir' => '']); // Failed Attempt
            }

            /* if password does not match */
            if (!Hash::check($inputs['password'], $user->password)) {
                return Response::json(['success' => false, 'message' => 'Incorrect Username or Password.', 'redir' => '']); // Failed Attempt
            } else {
//if password matches, account is not locked, then create session
                if (Auth::attempt([
                    'username' => trim($user->username),
                    'password' => trim($inputs['password']),
                ], !empty($inputs['remember']) ? true : false)) {
                    $request->session()->push('user_role', $user->roles_id);
                    $request->session()->push('username', $user->username);
                    return Response::json(['success' => true, 'message' => '', 'redir' => 'dashboard']);
                }
            }
        } else {
            return Response::json(['success' => false, 'message' => 'Incorrect Username or Password.', 'redir' => '']);
        }
    }

    public static function checkUserEmailExists($email)
    {
        $record = DB::table('users')
            ->where('email', trim($email))
            ->count();
        return $record;
    }

    public static function checkUsernameExists($username)
    {
        $record = DB::table('users')
            ->where('username', trim($username))
            ->count();
        return $record;
    }

}
