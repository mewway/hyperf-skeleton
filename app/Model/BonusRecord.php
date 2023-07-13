<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $content 
 * @property \Carbon\Carbon $created_at 
 * @property int $bonus 
 * @property int $type 
 * @property int $delivery_id 
 * @property int $user_id 
 */
class BonusRecord extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bonus_record';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'bonus' => 'integer', 'type' => 'integer', 'delivery_id' => 'integer', 'user_id' => 'integer'];
}