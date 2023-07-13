<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $title 
 * @property int $views 
 * @property string $preview 
 * @property string $description 
 */
class Learning extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'learning';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'views' => 'integer'];
}