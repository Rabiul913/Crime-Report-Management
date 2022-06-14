<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Police_station;

class District extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'name',
        'status',
    ];

<<<<<<< HEAD
    // public function Police_station()
    // {
    //     return $this->hasMany(Police_station::class);
    // }

=======
    public function Police_station()
    {
        return $this->belongsTo(Police_station::class);
    }

    public function Complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
>>>>>>> c0ba14c2791c6c480c645da23d86bf9aff865d81
}
