<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'complaint_id',
        'user_id',
        'detail',
        'date',
        'step',
        'status',
    ];
  

    public function User()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function Complaint()
    {
        return $this->hasMany(Complaint::class,'id','complaint_id');
    }
}
