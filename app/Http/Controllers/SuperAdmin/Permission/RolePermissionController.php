<?php

namespace App\Http\Controllers\SuperAdmin\Permission;
use App\Http\Controllers\Controller;
use App\Models\superAdmin\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Redirect;
use DB;

class RolePermissionController extends Controller
{

    public function index()
    {
        $data['roles'] = Roles::get();
        return view('superAdmin.role.index',$data);
    }

    public function create(Request $request)
    {
        if(request()->isMethod("post"))
        {
            $this->validate($request, [
                'role_type' => 'required|unique:roles,name',
             ]);

            $alphas = range('A', 'Z');
            shuffle($alphas);
            $alphas = array_slice($alphas, 0, 2);
            shuffle($alphas);
            $code= implode($alphas);
            $myuid = rand(000,999);
            $customer_id    =$code.$myuid;

             $create = Roles::insertGetId([
                                 'role_id'         => '#'.$customer_id,
                                 'name'            => $request->role_type,
                                 'description'     => $request->description,
                                 'added_date'      => date('j,F,Y'),
                                //  'status'          => $request->status,
                                 ]);

            foreach($request->input('permission') as $value)
            {
                $permission = DB::table('role_has_permissions')->insert([
                'role_id'       => $create,
                'permission_id' => $value,
                ]);
            }

             return redirect()->route('permissions.index')->with('message', 'Role created successfully!');


        }
        $data['permission']=DB::table('permissions')->get();
        return view('superAdmin.role.create',$data);

    }

    public function edit(Request $request,$id)
    {
        $data['roleDetail']=Roles::whereId($id)->first();
        $data['id']  = $id;
        $data['permission']=DB::table('permissions')->get();
        $set_permission = DB::table('role_has_permissions')->where('role_id', $id)->get('permission_id');
        $d = json_decode(json_encode($set_permission),true);
        $data['array'] = array_column($d, 'permission_id');
        if(request()->isMethod("post"))
        {
           // return $request->all();

            $alphas = range('A', 'Z');
            shuffle($alphas);
            $alphas = array_slice($alphas, 0, 2);
            shuffle($alphas);
            $code= implode($alphas);
            $myuid = rand(000,999);
            $customer_id    =$code.$myuid;
            $role_id=$request->input('role_id');

            DB::table('role_has_permissions')->whereIn('role_id',[$role_id])->delete();
            if($request->input('permission'))
            {
                foreach($request->input('permission') as $value)
                {
                    $permission = DB::table('role_has_permissions')->insert([
                    'role_id'       => $role_id,
                    'permission_id' => $value,
                    ]);
                }
            }

            $coupon = [
                    "name" => $request->input('name'),
                    "status" => $request->input('status')
                    ];
            Roles::whereId($id)->update($coupon);
            return Redirect::route('permissions.index')->with('message', 'Permission updated successfully!');

        }
        return view('superAdmin.role.edit',$data);
    }


    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }

}
