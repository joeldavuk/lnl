<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category_Relationship extends Eloquent {

    protected $table = 'category_relationship';
    protected $primaryKey = 'id';

    protected $fillable = [

        'base_category_id',
        'type_of',
        'category_id'
    ];



}