<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'logo_id',
    ];

    protected $dates = [ 'deleted_at' ];

    public function logo()
    {
        return $this->belongsTo(TeamLogo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
