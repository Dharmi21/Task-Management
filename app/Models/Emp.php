<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{

    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'job_title', 'department', 'reporting_manager', 'phone_no', 'city', 'date_of_birth', 'profile_photo', 'last_name', 'middle_name', 'gender'

    ];
    public function dept()  {
        return $this->belongsTo(Department::class,'department');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
