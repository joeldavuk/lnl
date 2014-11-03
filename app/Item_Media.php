<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Item_Media extends Eloquent {



    protected $fillable = [

        'media_type',
        'media_value'
    ];




}