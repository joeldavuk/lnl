<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category_Relationship extends Eloquent {

    protected $table = 'category_relationship';
    protected $primaryKey = 'base_category_id';

    protected $fillable = [

        'base_category_id',
        'type_of',
        'category_id'
    ];


    public function items() {
        return $this->hasMany('App\Items','item_id','id');
    }

    public function categoryData() {
        return $this->hasMany('App\Categories','id','category_id');
    }




}