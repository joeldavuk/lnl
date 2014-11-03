<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Items extends Eloquent {

    protected $table = 'items';
    protected $primaryKey = 'id';

    public function meta() {
        return $this->hasMany('App\Item_Meta','item_id','id');
    }
    protected $fillable = [

        'title',
        'slug',
        'author',
        'content',
        'status',
        'menu_order',
        'item_type'
    ];




}