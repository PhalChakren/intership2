<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date_checkin', 'date_checkout'];

    // Define relationship
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}


