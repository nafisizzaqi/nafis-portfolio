<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission-view', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
        $this->middleware('permission:permission-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Permission::orderByDesc('created_at');
        $perPage = 10;
        $search = $request->input('search');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Menambahkan paginasi
        $permissions = $query->paginate($perPage);

        return view('pages.resources.permissions.index', compact('permissions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.resources.permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
                "name"          => "required|unique:permissions,name",
                "guard_name"    => "required"
            ]
        );

        $permission = Permission::create($credentials);

        $message = [
            "status" => $permission ? "success" : "failed",
            "message" => $permission ? "Data created successfully" : "Data failed to create!"
        ];

        if ($request->has('save_and_add_other')) {

            return redirect()->route('resources.permissions.create')->with("message", $message);
        } else {
            return redirect()->route('resources.permissions.index')->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        $rolesAttached = Role::join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
            ->where("role_has_permissions.permission_id", $permission->id)
            ->with('users')
            ->get();
        $rolesCount = $rolesAttached->count();

        return view('pages.resources.permissions.show', compact('permission', 'rolesAttached', 'rolesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $data = [
            "permission" => $permission,
        ];

        return view("pages.resources.permissions.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $credentials = $request->validate(
            [
                "name"          => "required|unique:permissions,name," . $permission->id,
                "guard_name"    => "required"
            ]
        );

        $permission = $permission->update($credentials);

        $message = [
            "status" => $permission ? "success" : "failed",
            "message" => $permission ? "Data updated successfully" : "Data failed to update!"
        ];

        if ($request->has('update_and_continue_editing')) {
            return Redirect::back()->with("message", $message);
        } else {
            return Redirect::route("resources.permissions.index")->with("message", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if(!$permission) {
            $message = [
                "status" => "failed",
                "message" => "Permission Not Found"
            ];
            return Redirect::route("resources.permissions.index")->with("message", $message);
        }

        $permission = $permission->delete();

        $message = [
            "status" => $permission ? "success" : "failed",
            "message" => $permission ? "Data deleted successfully" : "Data failed to delete!"
        ];

        return Redirect::route("resources.permissions.index")->with("message", $message);
    }
}
