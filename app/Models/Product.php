<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','description','stock','price','offer_price','discount','status','photo','vendor_id','cat_id','child_cat_id','brand_id','size','conditions'];
   
   public function brand(){
        return $this->belongsTo('App\Models\Brand');
   }

   public function rel_product(){
      return $this->hasMany('App\Models\Product','cat_id','id')->where('status','active');
   }
   public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
   }
   public function orders(){
        return $this->belongsToMany(Order::class,'product_orders')->withPivot('quantity');
    }

}
