<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function addUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'add_users', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'contact_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to add user']);
            }
            if ($validator->errors()->has('contact_name')){
                return redirect()->back()->with(['notify_error' => 'Contact name required to add user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to add user']);
            }
            if ($validator->errors()->has('address')){
                return redirect()->back()->with(['notify_error' => 'Address required to add user']);
            }
            if ($validator->errors()->has('phone')){
                return redirect()->back()->with(['notify_error' => 'Mobile number required to add user']);
            }
            if ($validator->errors()->has('password')){
                return redirect()->back()->with(['notify_error' => 'Password required to add user']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_user = User::where('email', '=', $validated['email'])->first();
            if ($exist_user != null){
                return redirect()->back()->with(['notify_error' => 'You entered email already registered, please try login now']);
            }else{
                $user = new User();
                $user->user_name = $validated['user_name'];
                $user->contact_name = $validated['contact_name'];
                $user->email = $validated['email'];
                $user->address = $validated['address'];
                $user->phone = $validated['phone'];
                $user->password = Hash::make($validated['password']);
                $user->save();
                return redirect()->back()->with(['success' => 'User added successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }

    public function updateUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_users', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'contact_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to add user']);
            }
            if ($validator->errors()->has('contact_name')){
                return redirect()->back()->with(['notify_error' => 'Contact name required to add user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to add user']);
            }
            if ($validator->errors()->has('address')){
                return redirect()->back()->with(['notify_error' => 'Address required to add user']);
            }
            if ($validator->errors()->has('phone')){
                return redirect()->back()->with(['notify_error' => 'Mobile number required to add user']);
            }
        }
        $validated = $validator->validated();
        try{
            $user = User::where('email', '=', $validated['email'])->first();
            if ($user == null){
                return redirect()->back()->with(['notify_error' => 'Have not account with this email address']);
            }else{
                $user->user_name = $validated['user_name'];
                $user->contact_name = $validated['contact_name'];
                $user->email = $validated['email'];
                $user->address = $validated['address'];
                $user->phone = $validated['phone'];
                if (isset($request->password)){
                    $user->password = Hash::make($request->password);
                }
                $user->save();
                return redirect()->back()->with(['success' => 'User updated successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }

    public function deleteUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'delete_users', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_id')){
                return redirect()->back()->with(['notify_error' => 'User id required to delete user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'User email required to delete user']);
            }
        }
        $validated = $validator->validated();
        try{
            User::where('email', '=', $validated['email'])->where('user_id', '=', $validated['user_id'])->delete();
            return redirect()->back()->with(['success' => 'User deleted successfully...!']);
        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }
}
