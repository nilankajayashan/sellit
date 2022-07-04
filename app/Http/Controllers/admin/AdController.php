<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdminUser;
use App\Models\Category;
use App\Models\GuestUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as R;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    public function ChangeAdStatus(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'approve_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('ad_id')){
                return redirect()->back()->with(['notify_error' => 'Ad id required to change ad status']);
            }
            if ($validator->errors()->has('status')){
                return redirect()->back()->with(['notify_error' => 'Ad status required to change ad status']);
            }
        }
        $validated = $validator->validated();
        try{
            if ($validated['status'] == 0){
                Ad::where('ad_id','=',$validated['ad_id'])->update(['status' => 1]);
            }else{
                Ad::where('ad_id','=',$validated['ad_id'])->update(['status' => 0]);
            }
            return redirect()->back()->with(['success' => 'Ad status changed successfully']);
        }catch (Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong']);
        }
    }

    public function AdReject(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'reject_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required',
            'reason' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('ad_id')){
                return redirect()->back()->with(['notify_error' => 'Ad id required to reject ad']);
            }
            if ($validator->errors()->has('reason')){
                return redirect()->back()->with(['notify_error' => 'Ad reject reason required to reject ad']);
            }
        }
        $validated = $validator->validated();
        try{
            Ad::where('ad_id','=',$validated['ad_id'])->update(['reject' => 1, 'status' => 0, 'reject_reason' => $validated['reason']]);
            //must need to send email to client with reject reason
            return redirect()->route('dashboard',['state' => 'ads'])->with(['success' => 'Ad rejected successfully']);
        }catch(Exception $exception){
            return redirect()->back()->with(['notify_error' => 'Something went wrong']);
        }
    }

    public function editAd(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('ad_id')){
                return redirect()->back()->with(['notify_error' => 'Ad id required to view ad']);
            }
        }
        $validated = $validator->validated();
        $ad = Ad::where('ad_id','=',$validated['ad_id'])->first();
        $form_name = Category::select('name')->where('category_id','=', $ad->category_id)->first();
        return view('admin/dashboard', ['state'=>'edit_ad','ad' => $ad, 'form_name' => $form_name->name]);
    }
    public function edit_specific_form(){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        $ad = Ad::where('ad_id', '=', R::get('ad_id'))->first();
        $name = Category::select('name')->where('category_id', '=', R::get('category_id'))->first();
        if ($name->name == 'other_items'){
            return view('admin/views/ads/edit_forms/other_items',['ad' => $ad]);
        }else{
            $sub = Category::select('parent_id','form_name')->where('name','=',$name->name)->first();
            $subfolder = Category::select('name')->where('category_id', '=', $sub->parent_id)->first();

            if ($sub->form_name == 'common'){
                return view('admin/views/ads/edit_forms/'.$subfolder->name.'/common',['ad' => $ad, 'permissions' => $permissions]);
            }else{
                return view('admin/views/ads/edit_forms/'.$subfolder->name.'/'.$name->name,['ad' => $ad,'permissions' => $permissions]);
            }
        }
    }

    private function getPayment($total)
    {
        return 'success';
    }

    public function editAdSubmit(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'edit_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $data = $request->all();
        // dd(Category::select('category_id')->where('name','=',$data['category'])->first());
        $validate = Validator::make($data,[
            'tittle' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            $ad = Ad::where('ad_id','=',$data['ad_id'])->first();
            $form_name = Category::select('name')->where('category_id','=', $ad->category_id)->first();
            return view('admin/dashboard', ['state'=>'edit_ad','ad' => $ad, 'form_name' => $form_name->name])->with(['notify_error' => 'Ad tittle and description required to update ad']);
        }
        $post = Ad::where('ad_id', '=', $data['ad_id'])->first();
        $post->tittle = $data ['tittle'];
        $post->description = $data ['description'];
        $post->price = $data ['price'];
        $post->city = $data['city'];
        $post->town = $data['town'];
        //insert packages
        $total = 0;
        $ad_options = [];
        if(isset($data['highlighted'])){
            if ($data['highlighted'] == 'on'){
                $available_options = json_decode($post->ad_option);
                if (!in_array('highlighted',$available_options)){
                    array_push($ad_options,'highlighted');
                    $total += 500;
                }
            }else{
                $available_options = json_decode($post->ad_option);
                if (in_array('highlighted',$available_options)){
                    unset($ad_options['highlighted']);
                }
            }
            unset($data ['highlighted']);
        }
        if(isset($data['priority'])){
            if ($data['priority'] == 'on'){
                $available_options = json_decode($post->ad_option);
                if (!in_array('priority',$available_options)){
                    array_push($ad_options,'priority');
                    $total += 0;
                }
            }else{
                $available_options = json_decode($post->ad_option);
                if (in_array('priority',$available_options)){
                    unset($ad_options['priority']);
                }
            }
            unset($data ['priority']);
        }
        if(isset($data['urgent'])){
            if ($data['urgent'] == 'on'){
                $available_options = json_decode($post->ad_option);
                if (!in_array('urgent',$available_options)){
                    array_push($ad_options,'urgent');
                    $total += 0;
                }
            }else{
                $available_options = json_decode($post->ad_option);
                if (in_array('urgent',$available_options)){
                    unset($ad_options['urgent']);
                }
            }
            unset($data ['urgent']);
        }
        $post->payment_status = $this->getPayment($total);
        unset($data ['total']);
        $post->ad_option = json_encode($ad_options);
        //insert guest user data
//        $images = $data['image_data_url'];
        $post->main_image = $data['main_image'] <= 0? 0: $data['main_image'];
        unset($data['main_image'],$data ['tittle'],$data ['description'],$data ['price'],$data ['city'],$data ['town'],$data['category'],$data['_token'],$data['photos'],);
        $info = json_decode(json_encode($data),true);
        $post->ad_info = $info;
        $post->save();


        $post = Ad::select('ad_id')
            ->where('user_id', '=', session()->get('auth_user')->user_id)
            ->orderby('updated_at', 'desc')
            ->limit(1)
            ->first();
        $post->save();
        return redirect()->route('dashboard',['state' => 'ads'])->with(['success' => 'Advertistment edited successfully...! After Approve changes it will be shown on the web site...!']);
    }

    public function deleteAd(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'delete_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('ad_id')){
                return redirect()->back()->with(['notify_error' => 'Ad id required to delete ad']);
            }
        }
        $validated = $validator->validated();
        try{
            Ad::where('ad_id', '=', $request->ad_id)->delete();
            return redirect()->route('dashboard',['state' => 'ads'])->with(['success' => 'ad ID:'.$request->ad_id.' was deleted']);
        }catch (Exception $e){
            return redirect()->route('dashboard',['state' => 'ads'])->with(['error' => 'ad ID:'.$request->ad_id.' can not be delete... please try again']);
        }
    }

    public function AdPost(){
        $guests = GuestUser::all();
        $users = User::all();
        return view('admin/views/ads/post_form', ['guests' => $guests, 'users' => $users]);
    }
    public function loadSpecific(){
        if (R::get('name') == 'other_items'){
            return view('admin/views/ads/post_forms/other_items');
        }else{
            $sub = Category::select('parent_id','form_name')->where('name','=',R::get('name'))->first();
            $subfolder = Category::select('name')->where('category_id', '=', $sub->parent_id)->first();

            if ($sub->form_name == 'common'){
                return view('admin/views/ads/post_forms/'.$subfolder->name.'/common');
            }else{
                return view('admin/views/ads/post_forms/'.$subfolder->name.'/'.R::get('name'));
            }
        }
    }


    public function submitPost(Request $request){
        $permissions = AdminUser::where('admin_id', '=', session()->get('auth_admin')->admin_id)->first();
        $permissions = $permissions->role;
        if (!in_array( 'add_ads', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission']);
        }
        $data = $request->all();
        // dd(Category::select('category_id')->where('name','=',$data['category'])->first());
        $validate = Validator::make($data,[
            'tittle' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            return view('admin/views/ads/post_ad',['error' => $validate->errors(),'categories' => Category::all()]);
        }
        $post = new Ad();
        $category =  Category::select('category_id')->where('name','=',$data['category'])->first();
        $post->category_id = $category->category_id;
        $post->tittle = $data ['tittle'];
        $post->description = $data ['description'];
        $post->price = $data ['price'];
        $post->city = $data['city'];
        $post->town = $data['town'];
        //insert packages
        $total = 0;
        $ad_options = [];
        if(isset($data['highlighted'])){
            if ($data['highlighted'] == 'on'){
                array_push($ad_options,'highlighted');
                $total += 500;
                unset($data ['highlighted']);
            }
        }
        if(isset($data['priority'])){
            if ($data['priority'] == 'on'){
                array_push($ad_options,'priority');
                $total += 0;
                unset($data ['priority']);
            }
        }
        if(isset($data['urgent'])){
            if ($data['urgent'] == 'on'){
                array_push($ad_options,'urgent');
                $total += 500;
                unset($data ['urgent']);
            }
        }
        $post->payment_status = $this->getPayment($total);
        unset($data ['total']);
        $post->ad_option = json_encode($ad_options);
        //insert guest user data
        $post->images = '';
        if ($data['user'] == 'user'){
            $post->user_id = $data['registered'];
            $post->user_type = 'registered';
            $user_id = $data['registered'];
        } elseif ($data['user'] == 'guest'){
//            $guest = GuestUser::select('user_id')->where('user_id', '=', $data['guest'])->first();
//            if($guest == null){
//               return redirect()->back()->with(['notify_error' => 'Please add guest user before add Ad']);
//            }
            $post->user_id = $data['guest'] ;
            $post->user_type = 'guest' ;
            $user_id = $data['guest'];
        }else{
            $user_id = $data['registered'];
        }
        $images = $data['image_data_url'];
        $post->main_image = $data['main_image'] <= 0? 0: $data['main_image']-1;
        $post->save();
        //photos uploader
        $files = [];
        $images = explode(',',$images);
        for( $count = 1;$count < count($images); $count++){
            $name = time().rand(1,100);
            $image = base64_decode($images[$count]);
            $file_type = explode('.',$request->file('file')->getClientOriginalName())[1];
            if( !file_exists(public_path('ad_photos/'.$user_id))){
                mkdir(public_path('ad_photos/'.$user_id), 0777);
            }
            if(!file_exists(public_path('ad_photos/'.$user_id.'/'.$post->ad_id))) {
                mkdir(public_path('ad_photos/'.$user_id.'/'.$post->ad_id), 0777);
            }
            file_put_contents(public_path('ad_photos/'.$user_id.'/'.$post->ad_id.'/'.$name.'.'.$file_type), $image);
            $files[] = $name.'.'.$file_type;
        }
        $post->images = json_encode($files);
        unset($data['user'],$data['registered'],$data['guest'],$data['main_image'],$data['image_data_url'],$data ['tittle'],$data ['description'],$data ['price'],$data ['city'],$data ['town'],$data['category'],$data['_token'],$data['photos'],);
        $info = json_decode(json_encode($data),true);
        $post->ad_info = $info;
        $post->save();
        return redirect()->back()->with(['success' => 'Your Advertistment posted successfully...! After Approve it will be shown on the web site...!']);

    }
}
