<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flim extends Model
{
    protected $table = 'films';

    public function flimGenres()
    {
        return $this->hasMany('App\Models\FlimGenre');
    }


    public static function Rules()
    {

        $rules = array(
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
            'realease_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
        );
        return $rules;
    }

    public static $messages = array(
        'slug.required' => 'Question is required!',
        'name.required' => 'Name is required!',
        'description.required' => 'Description is required!',
        'realease_date.required' => 'Realease Date is required!',
        'rating.required' => 'Rating is required!',
        'ticket_price.required' => 'Ticket Price is required!',
        'country.required' => 'Country is required!',
    );
}
