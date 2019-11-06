<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        $roles = DB::table('roles')->where('name','<>',config('access.roles.admin'))->get();
        return view('admin.user.listUsers')->with(['datas'=>$users,'roles'=>$roles]);
    }

    public function create(){
        $roles = DB::table('roles')->where('name','<>',config('access.roles.admin'))->get();
        return view('admin.user.create-user')->with(['roles'=>$roles]);
    }

    public function store(Request $request){

        $this->validate($request,
            [
                'name'=>'bail|required|max:100|min:3',
                'email' => 'bail|required|email|max:50|unique:users',
                'roles' => 'bail|required',
                'password' => 'required|confirmed|min:6|max:32',
                'password_confirmation' => 'required|min:6|max:32'
            ],
            [
                'required' => ':attribute là bắt buộc',
                'min' => ':attribute không được nhỏ hơn :min ký tự',
                'max' => ':attribute không được lớn hơn :max ký tự',
                'email' => ':attribute phải đúng định dạng',
                'confirmed' => ':attribute phải nhập khớp',
                'unique' => ':attribute đã tồn tại'
            ],
            [
                'name' => 'Họ tên',
                'email' => 'Email',
                'roles' => 'Role (vai trò)',
                'password' => 'Password'
            ]
        );

        $roleID = $request->roles;

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->avatar = config('access.default.avatar','avatars/default-user.png');
        $user->password = Hash::make($request->password);
        $user->assignRole($roleID);

        foreach ($roleID as $rid){
            $roleGeted = Role::findById($rid);
            $user->givePermissionTo($roleGeted->permissions);
        }
//        dd($user);

        $user->save();
        $request->session()->flash('message-success', 'Thêm mới user thành công!');
        return redirect(route('admin.user.index'));
    }


    public function edit($id){
        $user = User::find($id);
        if ($user->name == config('access.roles.admin')) {
            return redirect(route('admin.user.index'))->withErrors(['Từ chối truy cập!']);
        }
        $roles = DB::table('roles')->where('name','<>',config('access.roles.admin'))->get();
        //Lay role cua user co id nay
        $roleOfUser = DB::table('model_has_roles')->where('model_id',$id)->get();
        $idRoleSelected = [];
        foreach ($roleOfUser as $i){
            $idRoleSelected[]= $i->role_id;
        }
//        dd($idRoleSelected);
//        dd($roles[0]->name);
        return view('admin.user.edit-user')->with(['user'=>$user,'roles'=>$roles,'idRoleSelected'=>$idRoleSelected]);
    }


    public function update(Request $request,$id){
        $user = User::find($id);

        if ($user->email === $request->email){
            $this->validate($request,
                [
                    'email' => 'bail|required|email|max:50',
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'min' => ':attribute không được nhỏ hơn :min ký tự',
                    'max' => ':attribute không được lớn hơn :max ký tự',
                    'email' => ':attribute phải đúng định dạng',
                ],
                [
                    'email' => 'Email',
                ]
            );
        } else {
            $this->validate($request,
                [
                    'email' => 'bail|required|email|max:50|unique:users',
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'min' => ':attribute không được nhỏ hơn :min ký tự',
                    'max' => ':attribute không được lớn hơn :max ký tự',
                    'email' => ':attribute phải đúng định dạng',
                    'unique' => ':attribute đã tồn tại'
                ],
                [
                    'email' => 'Email',
                ]
            );
        }

        $this->validate($request,
            [
                'name'=>'bail|required|max:100|min:3',
                'roles' => 'bail|required',
            ],
            [
                'required' => ':attribute là bắt buộc',
                'min' => ':attribute không được nhỏ hơn :min ký tự',
                'max' => ':attribute không được lớn hơn :max ký tự',
            ],
            [
                'name' => 'Họ tên',
                'roles' => 'Role (vai trò)',
            ]
        );
        if (isset($request->password)) {
            $this->validate($request,
                [
                    'password' => 'confirmed|min:6|max:32',
                    'password_confirmation' => 'min:6|max:32'
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'min' => ':attribute không được nhỏ hơn :min ký tự',
                    'max' => ':attribute không được lớn hơn :max ký tự',
                    'confirmed' => ':attribute phải nhập khớp',
                ],
                [
                    'password' => 'Password'
                ]
            );
        }


        if (isset($user)){

            $roleID = $request->roles;

            $user->email = $request->email;
            $user->name = $request->name;
            if (isset($request->password)){
                $user->password = Hash::make($request->password);
            }
            $user->syncRoles($roleID);

            foreach ($roleID as $rid){
                $roleGeted = Role::findById($rid);
                $user->givePermissionTo($roleGeted->permissions);
            }
//        dd($user);

            $user->save();
            $request->session()->flash('message-success', 'Cập nhật user thành công!');
            return redirect(route('admin.user.index'));
        }

        return Redirect::back()->withErrors(['Cập nhật user thất bại']);
    }

    public function destroy($id,Request $request){
//        dd($id);
        $userDelete = User::find($id);
        $userDelete->syncRoles([]);
        $userDelete->givePermissionTo([]);
        $userDelete->delete();
        $request->session()->flash('message-success', 'Xóa user thành công!');
        return redirect(route('admin.user.index'));
    }

    public function profile(Request $request){
        //lay user dang dang nhap
        $userLoging = Auth::user();
        //Lay tap hop role ma user ay dang so huu
        $collectRoleOfUser = DB::table('model_has_roles')->where('model_id',$userLoging->id)->get();
        //lay tat ca role
        $allRole = Role::all();
        //lay tat ca id role cua user ay
        $idRoleOfUser = [];
        foreach ($collectRoleOfUser as $r){
            $idRoleOfUser[] = $r->role_id;
        }
        //lay tat ca name cua role ma co id o tren
        $nameRoleOfUser = [];
        foreach ($allRole as $i){
            foreach ($idRoleOfUser as $j){
                if ($i->id == $j){
                    $nameRoleOfUser[] = $i->name;
                }
            }
        }

        return view('admin.user.profile')->with(['user'=>$userLoging,'nameOfRoles'=>$nameRoleOfUser]);
    }

    public function updateInfor(Request $request){
        //Lay user dang dang nhap
        $userLoging = auth()->user();
        $timeNow = Carbon::now();
//        $arrRequest = [];

        //Lay avatar va Name tu request ve
        $avatarReceiver = $request->avatar;
        $nameReceiver = $request->name;
        $uploadAvatar = false;

        DB::beginTransaction();
        try {
            //Neu co file upload len thi xu ly file ay
            //Check load thanh cong va dung la file anh thi moi xu ly, khong thi bao loi
            if (isset($avatarReceiver)){
    //            if (in_array($avatarReceiver->getClientMimeType(),config('access.format-image'))){
                if ( ($avatarReceiver->getClientMimeType() ==   'image/jpeg' ||
                    $avatarReceiver->getClientMimeType() ==   'image/png') && $avatarReceiver->isValid()){
                    $uploadAvatar = true;
                    $newNameAvatar = $userLoging->id.'-_-'.$avatarReceiver->getClientOriginalName();
                    $avatarReceiver->move('avatars',$newNameAvatar);
                    $pathAvatar = 'avatars/'.$newNameAvatar;
    //                $arrRequest['avatar'] = $pathAvatar;
                } else{
                    return Redirect::back()->withErrors(['Ảnh tải lên không hợp lệ!']);
                }
            }
            // Nếu tên đang đăng nhập là administrator mà avatar giữ nguyên thì từ chối update
            if($userLoging->name == config('access.roles.admin') && $uploadAvatar == false){
                return Redirect::back()->withErrors(['Chỉ được phép đổi avatar hoặc password!']);
            }

            if (isset($avatarReceiver)) {
                //Neu avatar co up thi cap nhat avatar
                $userLoging->avatar = $pathAvatar;
                //DOan nay lay ve mang cac file avatar cu cua user nay
                $dirAllAvatar = new \DirectoryIterator(public_path().'/avatars');
                $allAvatarFilePath = [];
                foreach ($dirAllAvatar as $fileInfo) {
                    if($fileInfo->isDot()) continue;
                    if ($fileInfo->isFile() && $this->startsWith($fileInfo->getFilename(),$userLoging->id.'-_-')
                        && $timeNow->diffInSeconds(date("Y-m-d H:i:s",$fileInfo->getCTime()))){
                        $allAvatarFilePath[] = $fileInfo->getPath().'/'.$fileInfo->getFilename();
                    }
                }
                //Xoa cac avatar cu da lay duoc path o doan tren
                foreach ($allAvatarFilePath as $olderAvatar){
                    unlink($olderAvatar);
                }
            }
            if (isset($nameReceiver)){
                //Neu ten co up thi cap nhat ten
                $userLoging->name = $nameReceiver;
            } else {
                //Neu ten ko up thi lay ten cu
                $currentName = $userLoging->name;
                $userLoging->name = $currentName;
            }
            $userLoging->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return Redirect::back()->withErrors(['Có lỗi xảy ra, hãy thử lại!']);
        }
        return redirect()->back()->with('message-success', 'Update profile success!');
    }

    public function updatePassword(Request $request){
//        dd(Auth::user()->name);
        $userLoging = Auth::user();

        $currentPassReceiver = $request->currentPass;
        if (Hash::check($currentPassReceiver, $userLoging->password)) {
            $this->validate($request,
                [
                    'password' => 'required|confirmed|min:6|max:32',
                    'password_confirmation' => 'required|min:6|max:32'
                ],
                [
                    'required' => ':attribute là bắt buộc',
                    'min' => ':attribute không được nhỏ hơn :min ký tự',
                    'max' => ':attribute không được lớn hơn :max ký tự',
                    'confirmed' => ':attribute phải nhập khớp',
                ],
                [
                    'password' => 'Password mới'
                ]
            );
            $userLoging->password = Hash::make($request->password);
            $userLoging->save();
            return redirect()->back()->with('message-success', 'Update password success!');
        }
        return Redirect::back()->withErrors(['Password cũ không hợp lệ!']);
    }

    function startsWith ($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

}
