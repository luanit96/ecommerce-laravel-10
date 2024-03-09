<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

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
        'category_id',
        'user_id',
        'name',
        'price',
        'discount',
        'feature_image_path',
        'feature_image_name',
        'content',
        'slug',
        'quantity'
    ];

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
        ->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id')
        ->withTimestamps();
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')
        ->withTimestamps();
    }

    public function samples() {
        return $this->belongsToMany(Sample::class, 'product_samples', 'product_id', 'sample_id')
        ->withTimestamps();
    }
}
