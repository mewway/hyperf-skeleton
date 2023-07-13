<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $title 
 * @property string $spu_code 
 * @property int $price 
 * @property int $inventory 
 * @property string $color_images 
 * @property string $description 
 * @property string $remark 
 * @property string $stage 
 */
class ShoppingProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shopping_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'price' => 'integer', 'inventory' => 'integer'];
}