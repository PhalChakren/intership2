<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['username', 'email', 'password', 'admin_id'];

    protected $hidden = ['password'];

    // Define the relationship with the Admin model if needed
    public function admin()
    {
        return $this->belongsTo(users::class);
    }
}

