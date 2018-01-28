<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rules($id = null)
    {
        return $id ? [
            'username' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
//            'password' => 'string|min:6|confirmed',
        ] : [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasRole($roleName, $require = false)
    {
        if (is_array($roleName)) {
            foreach ($roleName as $name) {
                $hasRole = $this->hasRole($name);

                if ($hasRole && !$require) {
                    return true;
                } elseif (!$hasRole && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->roles as $role) {
                if (str_is($role->name, $roleName)) {
                    return true;
                }
            }
        }
    }

    public function hasPermission($permissionName, $require = false)
    {
        if (is_array($permissionName)) {
            foreach ($permissionName as $permName) {
                $hasPermission = $this->hasPermission($permName);
                if ($hasPermission && !$require) {
                    return true;
                } elseif (!$hasPermission && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->roles as $role) {
                foreach ($role->permissions as $permission) {
                    if (str_is($permission->name, $permissionName)) {
                        return true;
                    }
                }
            }
        }
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
