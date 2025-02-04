<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [ 'name','email','password','job_title', 'department', 'reporting_manager', 'phone_no', 'city', 'date_of_birth', 'profile_photo', 'last_name', 'middle_name', 'gender'];

    // public function user_name()  {
    //     return $this->belongsTo(User::class,'reporting_manager');
    // }
    public function dept()  {
        return $this->belongsTo(Department::class,'department');
    }
    public function manager()  {
        return $this->belongsTo(User::class,'reporting_manager');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function isAdmin(): Attribute
    {
        $admins = ['admin@gmail.com'];
        return Attribute::make(
            get: fn () => in_array($this->email, $admins)
        );
    }
}
