<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

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
        'customer_id',
        'total',
        'status'
    ];

    public function cartdetails() {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }

    public function customers() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
