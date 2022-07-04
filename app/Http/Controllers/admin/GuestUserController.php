<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\GuestUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestUserController extends Controller
{
    public function addGuestUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'add_guests', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'contact_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to add guest user']);
            }
            if ($validator->errors()->has('contact_name')){
                return redirect()->back()->with(['notify_error' => 'Contact name required to add guest user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to add guest user']);
            }
            if ($validator->errors()->has('phone')){
                return redirect()->back()->with(['notify_error' => 'Mobile number required to add guest user']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_user = GuestUser::where('email', '=', $validated['email'])->first();
            if ($exist_user != null){
                return redirect()->back()->with(['notify_error' => 'This user already registered as guest']);
            }else{
                $guest_user = new GuestUser();
                $guest_user->user_name = $validated['user_name'];
                $guest_user->contact_name = $validated['contact_name'];
                $guest_user->email = $validated['email'];
                $guest_user->phone = $validated['phone'];
                $guest_user->save();
                return redirect()->back()->with(['success' => 'Guest user added successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!'.$exception->getMessage()]);
        }
    }

    public function updateGuestUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_guests', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'contact_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_name')){
                return redirect()->back()->with(['notify_error' => 'User name required to update guest user']);
            }
            if ($validator->errors()->has('contact_name')){
                return redirect()->back()->with(['notify_error' => 'Contact name required to update guest user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email required to update guest user']);
            }
            if ($validator->errors()->has('phone')){
                return redirect()->back()->with(['notify_error' => 'Mobile number required to update guest user']);
            }
        }
        $validated = $validator->validated();
        try{
            $guest_user = GuestUser::where('email', '=', $validated['email'])->first();
            if ($guest_user == null){
                return redirect()->back()->with(['notify_error' => 'Have not guest account with this email address']);
            }else{
                $guest_user->user_name = $validated['user_name'];
                $guest_user->contact_name = $validated['contact_name'];
                $guest_user->email = $validated['email'];
                $guest_user->phone = $validated['phone'];
                $guest_user->save();
                return redirect()->back()->with(['success' => 'Guest user updated successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!'.$exception->getMessage()]);
        }
    }

    public function deleteGuestUser(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'delete_guests', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('user_id')){
                return redirect()->back()->with(['notify_error' => 'User id required to delete guest user']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'User email required to delete guest user']);
            }
        }
        $validated = $validator->validated();
        try{
            GuestUser::where('email', '=', $validated['email'])->where('user_id', '=', $validated['user_id'])->delete();
            return redirect()->back()->with(['success' => 'Guest user deleted successfully...!']);
        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }
}
