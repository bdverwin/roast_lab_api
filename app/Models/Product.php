<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Product extends Model
{
    //
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];


   public function reviews(): HasMany
   {
       return $this->hasMany(Review::class);
   }

   public function carts(): HasMany
   {
        return $this->hasMany(Cart::class);
   }
}
