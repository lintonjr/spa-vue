<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\System\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'deleted_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public static function createCustom($data)
    {
        return self::create($data);
    }

    public static function updateCustom($id, $data)
    {
        return self::find($id)->update($data);
    }
}
