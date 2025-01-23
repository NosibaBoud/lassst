<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
       'rolr',
        
    ];
public function homeAppointments()
{
    return $this->hasMany(HomeAppointment::class);
}

public function mytests()
{
    return $this->hasManyThrough(
        Investigation::class,
        UserInvestigation::class,
        'user_id',         
        'id',              
        'id',              
        'investigation_id'  
    );
}





const ROLE_PATIENT = 'patient';
    const ROLE_ADMIN = 'admin';
    const ROLE_SUPER_ADMIN = 'super_admin';

    // Check user role
    public function isPatient()
    {
        return $this->role === self::ROLE_PATIENT;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
