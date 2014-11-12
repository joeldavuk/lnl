<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categories extends Eloquent {

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [

        'title'
    ];



    public function categoryChildren() {
        return $this->hasMany('App\Category_Relationship','category_id','id')->where('category_relationship.type_of', '=', 'child');
    }

    public function categoryParents() {
        return $this->hasMany('App\Category_Relationship','category_id','id')->where('category_relationship.type_of', '=', 'parent');
    }


    public function itemData() {
        return $this->hasMany('App\Item_Relationship','category_id','id');
    }
    public function itemIds() {

    }






}