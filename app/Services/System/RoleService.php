<?php

namespace App\Services\System;

use Carbon\Carbon;
use App\Models\System\Role;

class RoleService
{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model::all();
    }

    public function find($value)
    {
        return $this->model::find($value);
    }

    public function store($request)
    {
        return $this->model::createCustom($request->all());
    }

    public function show($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function update($id, $request)
    {
        return $this->model::updateCustom($id, $request->all());
    }

    public function delete($id)
    {
        return $this->model::updateCustom($id, ['deleted_at' => Carbon::now()]);
    }
}
