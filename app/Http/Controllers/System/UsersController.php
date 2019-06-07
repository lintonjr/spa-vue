<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\System\UserService;
use App\Services\System\RoleService;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->service = $userService;
        $this->roleService = $roleService;
    }
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->service->store($request);
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$data = $this->service->show($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$data = $this->service->show($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            $data = $this->service->update($id, $request);
            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($data = $this->service->show($id)) {
            $data = $this->service->delete($id);
            return response()->json(['success' => 'Deletado com sucesso!']);
        } else {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        }
    }

    public function StoreRoles(Request $request, $id)
    {
        $itens = $this->service->show($id);
        $data = $request->all();
        $roles = $this->roleService->find($data['role_id']);
        $itens->addRole($roles);

        return response()->json(['success' => 'Inserido com sucesso!'], 200);
    }


    public function DestroyRole($role_id, $id)
    {
        $itens = $this->service->show($id);
        $role = $this->roleService->find($role_id);
        $itens->removeRole($role);
        return response()->json(['success' => 'Deletado com sucesso!'], 200);
    }
}
