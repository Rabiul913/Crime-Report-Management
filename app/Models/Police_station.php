<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Police_station extends Model
{
    use HasFactory;

<<<<<<< HEAD
        /**
=======
       /**
>>>>>>> c0ba14c2791c6c480c645da23d86bf9aff865d81
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
<<<<<<< HEAD
        'status',
    ];

    // public function District()
    // {
    //     return $this->belongsTo(District::class,'district_id', 'id');
    // }

=======
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
>>>>>>> c0ba14c2791c6c480c645da23d86bf9aff865d81
}
