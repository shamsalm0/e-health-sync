<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use CreatedBy, HasFactory, HasRoles, Notifiable;

    public static function selectMenu(): Collection
    {
        return static::where('status', 1)->pluck('name', 'id');
    }

    protected $fillable = ['name', 'email', 'username', 'password', 'name_bn', 'department_id', 'section_id', 'designation_id', 'division_id', 'district_id', 'upazila_id', 'nid', 'contact', 'address', 'address_bn', 'status', 'login_status', 'mail_verified', 'contact_verified', 'otp_verified', 'created_by', 'password_changed_at', 'session_id', 'updated_by'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($val): void
    {
        $this->attributes['password'] = bcrypt($val);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
