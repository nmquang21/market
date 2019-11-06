<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as RoleOrigin;
use Spatie\Permission\Models\Permission;
use App\Role;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index(){
        //Lay tat ca roles
        $roles = RoleOrigin::all();
        //Lay tat ca user co roles
        $allModelHasRoleCOllection = DB::table('model_has_roles')->get();
        $allUserHasRoleGroupByRoles = $allModelHasRoleCOllection->groupBy('role_id');
//        dd($allUserHasRoleGroupByRoles[15]->count());
        return view('admin.role.index')->with(['allRole'=>$roles,'allUserHasRoleGroupByRoles'=>$allUserHasRoleGroupByRoles]);
    }

    public function create(){
        $per = Permission::all();
        return view('admin.role.create-role')->withPermissions($per);
    }

    public function store(Request $request){

        $nameGeted = $request->name;
        $rName =[];
        $roles = DB::table('roles')->select('name')->get();
        foreach ($roles as $r){
            $rName[] = $r->name;
        }
        if (in_array($nameGeted,$rName)){
            return Redirect::back()->withErrors(['Role đã tồn tại']);
        } else{
            $roles = RoleOrigin::create(['name'=>$nameGeted]);
            $roles->syncPermissions($request->permission);
            $request->session()->flash('message-success', 'Thêm mới role thành công!');
            return redirect(route('admin.role.index'));
        }
    }

    public function edit($id, Request $request){

        try {
            $role = RoleOrigin::findById($id);
            if ($role->name == config('access.roles.admin')) {
                $request->session()->flash('message-err', 'Không được sửa quyền của administrator!');
                return redirect(route('admin.role.index'));
            }
            if($role !== null) {
                $permissions = $role->permissions;
                $allPermit = Permission::all();

                $allNamePermit = [];
                foreach ($permissions as $p) {
                    $allNamePermit[] = $p->name;
                }

                return view('admin.role.edit-role')->with(['allNamePermit' => $allNamePermit, 'allPermit' => $allPermit, 'role' => $role]);
            }
        } catch (\Spatie\Permission\Exceptions\RoleDoesNotExist $e) {
            $request->session()->flash('message-err', 'Không tìm thấy Role cần sửa!');
            return redirect(route('admin.role.index'));
        }

    }

    public function update(Request $request,$id, Role $role){
        //Lay ra role dang sua
        $role = RoleOrigin::findById($id);
        if($role !== null){

            //Lay name hien tai cua role
            $orgName = $role->name;

            //Lay name submit vao form
            $nameGeted = $request->name;
            $rName =[];
            $roles = DB::table('roles')->select('name')->get();
            foreach ($roles as $r){
                $rName[] = $r->name;
            }
            if (($key = array_search($orgName, $rName)) !== false) {
                unset($rName[$key]);
            }
            if (in_array($nameGeted,$rName)){
                return Redirect::back()->withErrors(['Role đã tồn tại']);
            } else{
                $role->name = $nameGeted;
                $role->save();
                $role->syncPermissions($request->permission);
                $request->session()->flash('message-success', 'Cập nhật role thành công!');
                return redirect(route('admin.role.index'));
            }
        } else{
            $request->session()->flash('message-err', 'Không tìm thấy Role cần sửa!');
            return redirect(route('admin.role.index'));
        }


    }

    public function destroy(Request $request, $id){
//        dd($id);
        $role = RoleOrigin::findById($id);
        if($role !== null) {
            $permissions = $role->permissions;
            $role->revokePermissionTo($permissions);
            $role->delete();
            $request->session()->flash('message-success', 'Xóa role thành công!');
            return redirect(route('admin.role.index'));
        }else{
            $request->session()->flash('message-err', 'Không tìm thấy Role cần xóa!');
            return redirect(route('admin.role.index'));
        }
    }
}
