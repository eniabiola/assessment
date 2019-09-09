<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name','description','price','category_id', 'image', 'color'
	];
    public function category()
    {
    	return $this->belongsTo('App\Model\Category');
    }
}
 