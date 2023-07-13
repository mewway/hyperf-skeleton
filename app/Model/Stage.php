<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property int $type 
 * @property string $location 
 * @property int $opening_time 
 * @property string $contacts 
 * @property string $mobile 
 * @property string $address 
 * @property string $description 
 */
class Stage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stage';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'type' => 'integer', 'opening_time' => 'integer'];
}