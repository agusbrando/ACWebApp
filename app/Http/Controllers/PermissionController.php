<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{

    public function __construct(Request $request)
    {
        $user = Auth::user();
        if($user != null){
            $notifications = $user->unreadNotifications;
            $countNotifications = $user->unreadNotifications->count();
        }else{
            $notifications = [];
            $countNotifications = 0;
        }

        $request->session()->put('notifications', $notifications);
        $request->session()->put('countNotifications', $countNotifications);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all()->load('roles');
        $roles = Role::all();
        foreach ($permissions as $permission) {
            foreach ($roles as $key => $role) {
                if ($permission->roles != null) {
                    if (in_array($role->id, $permission->roles->pluck('id')->toArray())) {
                        $assignPermissions[$permission->id][$role->id]=true;
                    }
                }
            }
        }

        $permissions = Permission::paginate(25);
        return view('permissions.index', compact('permissions', 'roles', 'assignPermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'model' => 'required'


        ]);

        $permissions = Permission::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'model' => $request->get('model')

        ]);
        return redirect('/permissions')->with('success', 'Permission saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($permission_id)
    {
        $permissions = Permission::find($permission_id);
        $roles = Role::all();
        $permissions->role = $permissions->role;

        return view('permissions.show', compact('permissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::find($id);
        $roles = Role::all();
        return view('permissions.edit', compact('permissions', 'roles'));
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

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'model' => 'required'

        ]);
        $permission = Role::find($id);
        $permission->name = $request->get('name');
        $permission->description = $request->get('description');
        $permission->slug = $request->get('slug');
        $permission->model = $request->get('model');


        $permission->save();
        return redirect('/permissions/' . $id)->with('Succes', 'Permission edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect('/permissions/')->with('success', 'Permission deleted!');
    }
    public function assignPermissionRole(Request $request)
    {
        $request->validate([
            'assignPermissions' => ['required'],


        ]);
        $permissions = $request->get('assignPermissions');
        foreach ($permissions as $permission_id => $roles) {
            foreach($roles as $role_id => $role){
                if($role){
                    $permission = Permission::find($permission_id);
                    $permission->roles()->sync($role_id);
                }
            }
        }
        return redirect('/permissions')->with('success', 'Permission saved!');
    }
}
