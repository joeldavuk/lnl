<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Item_Meta extends Eloquent {

    protected $table = 'item_meta';
    protected $primaryKey = 'id';

    protected $fillable = [

        'meta_key',
        'meta_value',
        'item_id'
    ];

    public function meta() {
        return $this->belongsTo('Items');
    }




}