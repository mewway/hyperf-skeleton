<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $title 
 * @property string $action_time 
 * @property int $bonus 
 * @property string $contact 
 * @property string $address 
 * @property string $content 
 * @property int $quota 
 * @property string $extra 
 */
class Rookie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rookie';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'bonus' => 'integer', 'quota' => 'integer'];
}