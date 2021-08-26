<?php

namespace App\Models;

use App\Models\Audit;
use App\Models\Template;
use App\Models\UserAudit;
use App\Models\Department;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function audits() {
        return $this->hasMany(UserAudit::class);
    }

    public function availableAudits() {

        return $this->hasManyThrough(
            Audit::class, 
            Department::class,
            'id',
            'department_id'
        );
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'department_users');
    }

    public function userAudits()
    {
        return $this->hasMany(UserAudit::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    
}
