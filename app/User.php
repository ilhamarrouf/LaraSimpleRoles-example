<?php

namespace App;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMINISTRATOR = 'Administrator';
    const ROLE_WRITER = 'Writer';
    const ROLE_GENERAL = 'General';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdministrator(): bool
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == self::ROLE_ADMINISTRATOR) {
                return true;
            }
        }

        return false;
    }

    public function hasRole(string $role = null): bool
    {
        return $this->roles->contains('name', $role);
    }
}
