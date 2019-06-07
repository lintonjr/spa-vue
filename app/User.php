<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Models\System\Role;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public static function createCustom($data)
    {
        if (isset($data['password'])) {
            $data['password'] = \bcrypt($data['password']);
        }
        return self::create($data);
    }

    public static function updateCustom($id, $data)
    {
        // if ($data['password'] != null) {
        //     $data['password'] = \bcrypt($data['password']);
        // } else {
        //     unset($data['password']);
        // }
        return self::find($id)->update($data);
    }

    public function addRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }
        if ($this->existsRole($role)) {
            return;
        }

        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }

        return $this->roles()->detach($role);
    }

    public function existsRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }

        return (boolean)$this->roles()->find($role->id);
    }
}
