<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
    use App\Models\kecamatan;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;



class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $user = User::with('kecamatan')->get();
        
        $kecamatan = kecamatan::where('status_kecamatan',0)->get();
        return view('user.user')->with('user',$user)->with('kecamatan',$kecamatan);
    }
    public function adduser(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id_kecamatan_user' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role'=> 'required',
            'password' => 'required',
            
    
    
         ]);
         if ($validation->fails()) {
            return redirect('/user')->with('warning', 'Email sudah terdaftar pada admin ');
         }
        $user = new User;
        $user->id_kecamatan_user = $request->input('id_kecamatan_user');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('/user')->with('success', 'Berhasil Menambahkan User');
    }
    public function updateuser(Request $request, $id)
    {
   
        $user = User::find($id);
        $user->id_kecamatan_user = $request->input('id_kecamatan_user');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('/user')->with('success', 'Berhasil update User');
    }

    public function updatepassword(Request $request, $id)
    {
   
        $user = User::find($id);
       
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('/user')->with('success', 'Berhasil update User');
    }
    public function deleteuser(Request $request, $id)
    {
   
        $user = User::find($id);
        
        $user->delete();
        
        return redirect('/user')->with('success', 'Berhasil Delete User');
    }
}
