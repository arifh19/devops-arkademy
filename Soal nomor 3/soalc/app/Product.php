<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'id_category','id_cashier','price'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }
    public function cashier()
    {
        return $this->belongsTo('App\Cashier', 'id_cashier');
    }
}
