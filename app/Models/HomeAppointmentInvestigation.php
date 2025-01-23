<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAppointmentInvestigation extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_appointment_id', 
        'investigation_id',
    ];
    public function homeAppointment()
    {
        return $this->belongsTo(HomeAppointment::class);
    }
    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }
}
