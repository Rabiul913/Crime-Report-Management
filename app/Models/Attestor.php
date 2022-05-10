<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestor extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'complaint_id',
        'name',
        'father_name',
        'mobile',
        'address',
        'status',
    ];

    public function Complaint()
    {
        return $this->hasMany(Complaint::class,'id','complaint_id');
    }
    
}
