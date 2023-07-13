<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property string $mobile 
 * @property string $phone 
 * @property string $content 
 * @property string $images 
 * @property int $delivery_id 
 * @property int $user_id 
 * @property string $extra 
 * @property int $status 
 */
class Wish extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wish';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'delivery_id' => 'integer', 'user_id' => 'integer', 'status' => 'integer'];
}