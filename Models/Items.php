<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{ 
    protected $table    = 'sidak123_items';
    protected $fillable    = ['name','price','stock','color_id','sku','category_id'];

}
