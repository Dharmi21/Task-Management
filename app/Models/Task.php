<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = ['emp_id','manager_id','task','description','file','status','feedback','due_date'];
    public function employee()  {
        return $this->belongsTo(User::class,'emp_id');
    }
    public function manager()  {
        return $this->belongsTo(User::class,'manager_id');
    }
}
