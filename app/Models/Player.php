<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'position_id',
        'jersey_number',
        'stick_hand',
    ];

    protected $dates = [ 'deleted_at' ];

    public function playingPosition()
    {
        return $this->belongsTo(PlayingPosition::class);
    }
}
