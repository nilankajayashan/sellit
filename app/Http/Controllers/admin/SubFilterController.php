<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Category;
use App\Models\SubFilter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubFilterController extends Controller
{
    public function addFilter(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'add_filters', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'filter' => 'required',
            'filter_list' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('category_id')){
                return redirect()->back()->with(['notify_error' => 'Category required to add filter']);
            }
            if ($validator->errors()->has('filter')){
                return redirect()->back()->with(['notify_error' => 'Filter name required to add filter']);
            }
            if ($validator->errors()->has('filter_list')){
                return redirect()->back()->with(['notify_error' => 'filter list required to add filter']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_filter = SubFilter::where('category_id', '=', $validated['category_id'])->where('filter', '=', $validated['filter'])->first();
            if ($exist_filter != null){
                return redirect()->back()->with(['notify_error' => 'You entered filter already available']);
            }else{
                $filter = new SubFilter();
                $filter->category_id = $validated['category_id'];
                $category_name = Category::where('category_id', '=', $validated['category_id'])->first();
                $filter->category_name = $category_name->name;
                $filter->filter = $validated['filter'];
                $filter_list = explode(',', $validated['filter_list']);
                $filter_list_holder = [];
                foreach ($filter_list as $filter_list_item){
                    array_push($filter_list_holder, $filter_list_item);
                }
                $filter->filter_list = json_encode($filter_list_holder);
                $filter->save();
                return redirect()->back()->with(['success' => 'Filter added successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }

    public function updateFilter(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_filters', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'filter' => 'required',
            'filter_list' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('category_id')){
                return redirect()->back()->with(['notify_error' => 'Category required to update filter']);
            }
            if ($validator->errors()->has('filter')){
                return redirect()->back()->with(['notify_error' => 'Filter name required to update filter']);
            }
            if ($validator->errors()->has('filter_list')){
                return redirect()->back()->with(['notify_error' => 'filter list required to update filter']);
            }
        }
        $validated = $validator->validated();
        try{
            $exist_filter = SubFilter::where('category_id', '=', $validated['category_id'])->where('filter', '=', $validated['filter'])->first();
            if ($exist_filter == null){
                return redirect()->back()->with(['notify_error' => 'This filter not available']);
            }else{
                $exist_filter->category_id = $validated['category_id'];
                $category_name = Category::where('category_id', '=', $validated['category_id'])->first();
                $exist_filter->category_name = $category_name->name;
                $exist_filter->filter = $validated['filter'];
                $filter_list = explode(',', $validated['filter_list']);
                $filter_list_holder = [];
                foreach ($filter_list as $filter_list_item){
                    array_push($filter_list_holder, $filter_list_item);
                }
                $exist_filter->filter_list = json_encode($filter_list_holder);
                $exist_filter->save();
                return redirect()->back()->with(['success' => 'Filter updated successfully...!']);
            }

        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }

    public function deleteFilter(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'delete_filters', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'filter' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('category_id')){
                return redirect()->back()->with(['notify_error' => 'Category required to delete filter']);
            }
            if ($validator->errors()->has('filter')){
                return redirect()->back()->with(['notify_error' => 'Filter name required to delete filter']);
            }
        }
        $validated = $validator->validated();
        try{
            SubFilter::where('category_id', '=', $validated['category_id'])->where('filter', '=', $validated['filter'])->delete();
            return redirect()->back()->with(['success' => 'Filter deleted successfully...!']);
        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong...!']);
        }
    }
}
