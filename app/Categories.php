<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categories extends Eloquent {

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [

        'title'
    ];



    public function categoryRelations() {
        return $this->hasMany('App\Category_Relationship','category_id','id')->with('categoryData');
    }


    public function itemData() {
        return $this->hasMany('App\Item_Relationship','category_id','id');
    }




}