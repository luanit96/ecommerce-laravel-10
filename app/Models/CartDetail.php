<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'product_id',
        'size',
        'color',
        'sample',
        'quantity',
        'price',
        'totalPrice'
    ];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
