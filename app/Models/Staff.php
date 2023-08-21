<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'staff_role_id',
        'experience',
    ];

    protected $dates = [ 'deleted_at' ];

    public function staffRole()
    {
        return $this->belongsTo(StaffRole::class);
    }
}
