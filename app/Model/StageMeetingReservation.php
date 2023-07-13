<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property int $meeting_id 
 * @property string $start_at 
 * @property string $end_at 
 * @property \Carbon\Carbon $created_at 
 * @property string $name 
 * @property string $birth_date 
 * @property int $credential_type 
 * @property string $credential_number 
 * @property string $mobile 
 */
class StageMeetingReservation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stage_meeting_reservation';
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
    protected $casts = ['id' => 'integer', 'meeting_id' => 'integer', 'created_at' => 'datetime', 'credential_type' => 'integer'];
}