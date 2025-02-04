<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table='users';
    protected $fillable=['job_title','department','reporting_manager','employee','phone_no','city','date_of_birth','profile_photo','last_name','middle_name','gender'];


    public function manager()  {
        return $this->belongsTo(User::class,'reporting_manager');
    }
    public function dept()  {
        return $this->belongsTo(Department::class,'department');
    }

}
