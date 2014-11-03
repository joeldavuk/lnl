<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categories extends Eloquent {

    protected $fillable = [

        'title'
    ];

    public function parents() {
        return $this->hasMany('category_relationship','category_base_id','id');
    }


}