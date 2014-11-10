<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Item_Relationship extends Eloquent {

    protected $table = 'item_relationship';
    protected $primaryKey = 'item_id';

    protected $fillable = [

        'item_id',
        'category_id'
    ];

    public function items() {
        return $this->hasMany('App\Items','id','item_id');
    }




}