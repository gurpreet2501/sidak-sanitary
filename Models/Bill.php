<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{ 
    protected $table    = 'sidak123_bills';
    protected $fillable    = ['bill_total','gst_in_percentage','discount_in_percentage ','freight_charges','bill_date','party_id','is_booking'];

    public function billingItems(){
   		return $this->hasMany(BillingItems::class, 'bill_id', 'id'); 
    }

    public function party(){
   		return $this->hasMany(Parties::class, 'id', 'party_id'); 
    }
}
