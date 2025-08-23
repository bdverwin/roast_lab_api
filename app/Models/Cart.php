<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    public function products(): HasMany
   {
       return $this->hasMany(Product::class);
   }

   public function users(): HasMany
   {
       return $this->hasMany(User::class);
   }

}
