<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Items extends Eloquent {

    protected $table = 'items';
    protected $primaryKey = 'id';


    public function meta()
    {
        return $this->belongsTo('App\Item_Meta','id','item_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories','category_id','item_id');
    }
    public function getByPage($page = 1, $limit = 10)
    {
        $results = StdClass;
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $users = $this->model->skip($limit * ($page - 1))->take($limit)->get();

        $results->totalItems = $this->model->count();
        $results->items = $users->all();

        return $results;
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