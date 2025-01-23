<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'details',
        'price',
        'expected_time_for_test',
        'instructions',
        'status',
        'can_taken',
        
    ];
    public function userInvestigations()
    {
        return $this->hasMany(UserInvestigation::class);
    }
    public function homeAppointments()
{
    return $this->belongsToMany(HomeAppointment::class, 'home_appointment_investigations');
}
}
