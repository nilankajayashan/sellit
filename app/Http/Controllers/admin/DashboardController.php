<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdminUser;
use App\Models\Category;
use App\Models\Employee;
use App\Models\GuestUser;
use App\Models\Product;
use App\Models\SubFilter;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stateHandler(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
       if (isset($request->state)){
           switch($request->state){
               case('ads'):
                   $ads = Ad::all();
                   $categories = Category::all();
                   $users = User::all();
                   $guests = GuestUser::all();
                   return view('admin/dashboard',[
                       'state' => 'ads',
                       'ads' => $ads,
                       'categories' => $categories,
                       'users' => $users,
                       'guests' => $guests,
                       'permissions' => $permissions
                   ]);
                   break;
               case('post_ad'):
                   $categories = Category::all();
                   return view('admin/dashboard',['state' => 'post_ad', 'categories' => $categories,'permissions' => $permissions]);
                   break;
               case('categories'):
                   $categories = Category::all();
                   return view('admin/dashboard',['state' => 'categories', 'categories' => $categories,'permissions' => $permissions]);
                   break;
               case('users'):
                   $users = User::all();
                   return view('admin/dashboard',['state' => 'users','users' => $users,'permissions' => $permissions]);
                   break;
               case('user_remove'):
                   $users = User::where('remove_state', '=', 1)->get();
                   return view('admin/dashboard',['state' => 'user_remove','users' => $users,'permissions' => $permissions]);
                   break;
               case('guests'):
                   $guests = GuestUser::all();
                   return view('admin/dashboard',['state' => 'guests', 'guests' => $guests,'permissions' => $permissions]);
                   break;
               case('filters'):
                   $filters = SubFilter::all();
                   $categories = Category::where('parent_id', '!=', 0)->get();
                   return view('admin/dashboard',['state' => 'filters', 'filters' => $filters, 'categories' => $categories,'permissions' => $permissions]);
                   break;
               case('admins'):
                       $admins = AdminUser::where('admin_id', '!=', session()->get('auth_admin')->admin_id)->get();
                       return view('admin/dashboard',['state' => 'admins', 'admins' => $admins, 'permissions' => $permissions]);
                   break;

               case 'my_account':
                   $my_details = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
                   return view('admin/dashboard', ['state' => 'my_account', 'permissions' => $permissions, 'my_details' => $my_details]);
                   break;
               default:
                   $ads = Ad::all();
                   $categories = Category::all();
                   $users = User::all();
                   $guests = GuestUser::all();
                   $filters = SubFilter::all();
                   $payments = Ad::sum('price');
                   return view('admin/dashboard',[
                       'state' => 'dashboard',
                       'ads' => $ads,
                       'categories' => $categories,
                       'users' => $users,
                       'guests' => $guests,
                       'filters' => $filters,
                       'payments' => $payments,
                       'permissions' => $permissions
                   ]);

           }
       }else{
           $ads = Ad::all();
           $categories = Category::where('parent_id', '!=', 0)->get();
           $users = User::all();
           $guests = GuestUser::all();
           $filters = SubFilter::all();
           $payments = Ad::sum('price');
           return view('admin/dashboard',[
               'state' => 'dashboard',
               'ads' => $ads,
               'categories' => $categories,
               'users' => $users,
               'guests' => $guests,
               'filters' => $filters,
               'payments' => $payments,
               'permissions' => $permissions
           ]);
       }
    }
}
