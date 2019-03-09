<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class BillingItems extends Model
{ 
    protected $table    = 'sidak123_billing_items';
    protected $fillable    = ['item_id','price','quantity_ordered','gst_in_percentage','discount_in_percentage','bill_id','item_name'];

    public function items(){
   		return $this->hasOne(Items::class, 'id', 'item_id'); 
    }
}
