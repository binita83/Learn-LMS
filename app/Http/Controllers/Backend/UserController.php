<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
       $data['all_data']= User::all();
       return view('backend.user.user_view',$data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');

    }

    public function UserStore(Request $request)
    {
        $validationData=$request->validate([
                'email'=>'required|unique:users',
                'name'=>'required|min:3',
        ]);

             $data=new User();
            $data->userType=$request->userType;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->password=bcrypt($request->password);
            $data->save();

            $notification=array(
                    'message'=>'User Inserted Successfully',
                    'alert-type'=>'success'
            );
            
            return redirect()->route('user.view')->with($notification);
    }

    public function  UserEdit($id)
    {
        $editData=User::find($id);
        return view('backend.user.edit_user',compact('editData'));

    }

    public function  UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
        $data->userType=$request->userType;
    	$data->save();

    	$notification = array(
    		'message' => 'User Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view')->with($notification);


    }

    public function UserDelete($id)
    {
        $data = User::find($id);
        $data->delete();

        $notification = array(
    		'message' =>'User deleted Successfully',
    		'alert-type' => 'error'
    	);

        return redirect()->route('user.view')->with($notification);
        
    }
    
}
