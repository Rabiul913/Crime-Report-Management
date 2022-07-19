<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint_type;

class Complaint extends Model
{
    use HasFactory;
    
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'user_id',
            'co_title',
            'co_against_name',
            'district_id',
            'police_station_id',
            'police_name',
            'co_against_address',
            'co_type_id',
            'detail',
            'co_date',
            'file',
            'status',
    ];

    public function District()
    {
        return $this->hasMany(District::class,'id','district_id');
    }

    public function Complaint_type()
    {
        return $this->hasMany(Complaint_type::class,'id','co_type_id');
    }

    public function Police_station()
    {
        return $this->hasMany(Police_station::class,'id','police_station_id');
    }

    public function User()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function Investigation()
    {
        return $this->belongsTo(Investigation::class);
    }

    public function Attestor()
    {
        return $this->belongsTo(Attestor::class);
    }
           
}
