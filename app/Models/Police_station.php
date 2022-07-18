<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Police_station extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'district_id',
        'station_name',
        'address',
        'mobile',
        'email',
        'status'
    ];

    public function District()
    {
        return $this->hasMany(District::class,'id','district_id');
    }

    public function Complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
