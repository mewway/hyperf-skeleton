<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property int $action_id 
 * @property string $name 
 * @property string $birth_date 
 * @property int $credential_type 
 * @property string $credential_number 
 * @property string $mobile 
 * @property string $address 
 * @property int $delivery_id 
 * @property int $user_id 
 */
class ActionApplication extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'action_application';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'action_id' => 'integer', 'credential_type' => 'integer', 'delivery_id' => 'integer', 'user_id' => 'integer'];
}