<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if ($request->user()->cannot('viewAny', Role::class)) {
        //     abort(403);
        // }

        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // if ($request->user()->cannot('create', Role::class)) {
        //     abort(403);
        // }

        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        // if ($request->user()->cannot('create', Role::class)) {
        //     abort(403);
        // }

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Role $role)
    {
        // if ($request->user()->cannot('view', $role)) {
        //     abort(403);
        // }

        echo "show role data - " . $role->name;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        // if ($request->user()->cannot('update',$role)) {
        //     abort(403);
        // }

        echo "edit role data - " . $role->name;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // if ($request->user()->cannot('update', $role)) {
        //     abort(403);
        // }

        echo "update role data - " . $role->name;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Role $role)
    {
        // if ($request->user()->cannot('delete', $role)) {
        //     abort(403);
        // }

        echo "delete role data - " . $role->name;

    }
}
