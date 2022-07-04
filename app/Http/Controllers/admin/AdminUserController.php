<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\GuestUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function add(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'add_admins', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to add admin user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to add admin user']);
            }
            if ($validator->errors()->has('password')){
                return redirect()->back()->with(['notify_error' => 'Password required to add admin user']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_admin = AdminUser::where('email', '=', $validated['email'])->first();
            if ($exist_admin != null){
                return redirect()->back()->with(['notify_error' => 'This email already registered as admin user']);
            }else{
                $admin_user = new AdminUser();
                $admin_user->user_name = $validated['user_name'];
                $admin_user->email = $validated['email'];
                $admin_user->password = Hash::make($validated['password']);
                $permission_list = [];
                //ads permissions
                isset($request->view_ads) ? array_push($permission_list, 'view_ads') : '';
                isset($request->add_ads) ? array_push($permission_list, 'add_ads') : '';
                isset($request->edit_ads) ? array_push($permission_list, 'edit_ads') : '';
                isset($request->delete_ads) ? array_push($permission_list, 'delete_ads') : '';
                isset($request->reject_ads) ? array_push($permission_list, 'reject_ads') : '';
                isset($request->approve_ads) ? array_push($permission_list, 'approve_ads') : '';
                (isset($request->add_ads) || isset($request->edit_ads) || isset($request->delete_ads) || isset($request->approve_ads)|| isset($request->reject_ads)) ? (!in_array('view_ads', $permission_list)) ? array_push($permission_list, 'view_ads') : '' : '';


//filters permissions
                isset($request->view_filters) ? array_push($permission_list, 'view_filters') : '';
                isset($request->add_filters) ? array_push($permission_list, 'add_filters') : '';
                isset($request->edit_filters) ? array_push($permission_list, 'edit_filters') : '';
                isset($request->delete_filters) ? array_push($permission_list, 'delete_filters') : '';
                (isset($request->add_filters) || isset($request->edit_filters) || isset($request->delete_filters)) ? (!in_array('view_filters', $permission_list)) ? array_push($permission_list, 'view_filters') : '' : '';


//users permissions
                isset($request->view_users) ? array_push($permission_list, 'view_users') : '';
                isset($request->add_users) ? array_push($permission_list, 'add_users') : '';
                isset($request->edit_users) ? array_push($permission_list, 'edit_users') : '';
                isset($request->delete_users) ? array_push($permission_list, 'delete_users') : '';
                (isset($request->add_users) || isset($request->edit_users) || isset($request->delete_users)) ? (!in_array('view_users', $permission_list)) ? array_push($permission_list, 'view_users') : '' : '';

//guests permissions
                isset($request->view_guests) ? array_push($permission_list, 'view_guests') : '';
                isset($request->add_guests) ? array_push($permission_list, 'add_guests') : '';
                isset($request->edit_guests) ? array_push($permission_list, 'edit_guests') : '';
                isset($request->delete_guests) ? array_push($permission_list, 'delete_guests') : '';
                (isset($request->add_guests) || isset($request->edit_guests) || isset($request->delete_guests)) ? (!in_array('view_guests', $permission_list)) ? array_push($permission_list, 'view_guests') : '' : '';

//admins permissions
                isset($request->view_admins) ? array_push($permission_list, 'view_admins') : '';
                isset($request->add_admins) ? array_push($permission_list, 'add_admins') : '';
                isset($request->edit_admins) ? array_push($permission_list, 'edit_admins') : '';
                isset($request->delete_admins) ? array_push($permission_list, 'delete_admins') : '';
                (isset($request->add_admins) || isset($request->edit_admins) || isset($request->delete_admins)) ? (!in_array('view_admins', $permission_list)) ? array_push($permission_list, 'view_admins') : '' : '';

                $admin_user->role = json_encode($permission_list);
                $admin_user->save();
                return redirect()->back()->with(['success' => 'Admin user added successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'Something went wrong...!'.$exception->getMessage()]);
        }
    }

    public function delete(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'delete_admins', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'admin_id' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('admin_id')){
                return redirect()->back()->with(['notify_error' => 'Admin id required to delete admin user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Admin email required to delete admin user']);
            }
        }
        $validated = $validator->validated();
        try{
            AdminUser::where('email', '=', $validated['email'])->where('admin_id', '=', $validated['admin_id'])->delete();
            return redirect()->back()->with(['success' => 'Admin user deleted successfully...!']);
        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }

    public function edit(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_admins', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to edit admin user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to edit admin user']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_admin = AdminUser::where('email', '=', $validated['email'])->first();
            if ($exist_admin == null){
                return redirect()->back()->with(['notify_error' => 'Can not find admin user account']);
            }else{
                $exist_admin->user_name = $validated['user_name'];
                $exist_admin->email = $validated['email'];
                if (isset($request->password) && $request->password != null){
                    $exist_admin->password = Hash::make($request->password);
                }
                $permission_list = [];
                //ads permissions
                isset($request->view_ads) ? array_push($permission_list, 'view_ads') : '';
                isset($request->add_ads) ? array_push($permission_list, 'add_ads') : '';
                isset($request->edit_ads) ? array_push($permission_list, 'edit_ads') : '';
                isset($request->delete_ads) ? array_push($permission_list, 'delete_ads') : '';
                isset($request->reject_ads) ? array_push($permission_list, 'reject_ads') : '';
                isset($request->approve_ads) ? array_push($permission_list, 'approve_ads') : '';
                (isset($request->add_ads) || isset($request->edit_ads) || isset($request->delete_ads) || isset($request->approve_ads)|| isset($request->reject_ads)) ? (!in_array('view_ads', $permission_list)) ? array_push($permission_list, 'view_ads') : '' : '';


//filters permissions
                isset($request->view_filters) ? array_push($permission_list, 'view_filters') : '';
                isset($request->add_filters) ? array_push($permission_list, 'add_filters') : '';
                isset($request->edit_filters) ? array_push($permission_list, 'edit_filters') : '';
                isset($request->delete_filters) ? array_push($permission_list, 'delete_filters') : '';
                (isset($request->add_filters) || isset($request->edit_filters) || isset($request->delete_filters)) ? (!in_array('view_filters', $permission_list)) ? array_push($permission_list, 'view_filters') : '' : '';


//users permissions
                isset($request->view_users) ? array_push($permission_list, 'view_users') : '';
                isset($request->add_users) ? array_push($permission_list, 'add_users') : '';
                isset($request->edit_users) ? array_push($permission_list, 'edit_users') : '';
                isset($request->delete_users) ? array_push($permission_list, 'delete_users') : '';
                (isset($request->add_users) || isset($request->edit_users) || isset($request->delete_users)) ? (!in_array('view_users', $permission_list)) ? array_push($permission_list, 'view_users') : '' : '';

//guests permissions
                isset($request->view_guests) ? array_push($permission_list, 'view_guests') : '';
                isset($request->add_guests) ? array_push($permission_list, 'add_guests') : '';
                isset($request->edit_guests) ? array_push($permission_list, 'edit_guests') : '';
                isset($request->delete_guests) ? array_push($permission_list, 'delete_guests') : '';
                (isset($request->add_guests) || isset($request->edit_guests) || isset($request->delete_guests)) ? (!in_array('view_guests', $permission_list)) ? array_push($permission_list, 'view_guests') : '' : '';

//admins permissions
                isset($request->view_admins) ? array_push($permission_list, 'view_admins') : '';
                isset($request->add_admins) ? array_push($permission_list, 'add_admins') : '';
                isset($request->edit_admins) ? array_push($permission_list, 'edit_admins') : '';
                isset($request->delete_admins) ? array_push($permission_list, 'delete_admins') : '';
                (isset($request->add_admins) || isset($request->edit_admins) || isset($request->delete_admins)) ? (!in_array('view_admins', $permission_list)) ? array_push($permission_list, 'view_admins') : '' : '';

                $exist_admin->role = json_encode($permission_list);
                $exist_admin->save();
                return redirect()->back()->with(['success' => 'Admin user edited successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'Something went wrong...!'.$exception->getMessage()]);
        }
    }

    public function accountUpdate(Request $request)
    {
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_admins', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return redirect()->back()->with(['notify_error' => 'Admin Name is Required'])->withErrors(['name' => 'Admin Name Required']);
            }
        }
        $validated = $validator->validated();
        try {
            $admin = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
            if ($admin == null) {
                return redirect()->back()->with(['notify_error' => 'Can not identify your account']);
            }
            $admin->user_name = $validated['name'];
            if (isset($request->password)) {
                $admin->password = Hash::make($request->password);
            }
            $admin->save();
            return redirect()->back()->with(['success' => 'Account Updated Successfully']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => 'Something Went Wrong' . $exception->getMessage()]);
        }
    }
}
