<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property int $stage_id 
 * @property string $name 
 * @property string $remark 
 * @property \Carbon\Carbon $created_at 
 */
class StageMeeting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stage_meeting';
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
    protected $casts = ['id' => 'integer', 'stage_id' => 'integer', 'created_at' => 'datetime'];
}