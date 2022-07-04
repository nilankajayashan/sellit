<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\GuestUser;
use App\Models\User;
use Exception;
use Faker\Core\File;
use Illuminate\Support\Facades\Request  as R;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
use function dd;
use function GuzzleHttp\Promise\all;

class AdController extends Controller
{

    public function Ad(){
        $categories = Category::all();
        return view('public_view/post_ad',['categories' => $categories]);
    }
    public function load_specific(){
        if (R::get('name') == 'other_items'){
            return view('public_view/post_forms/other_items');
        }else{
            $sub = Category::select('parent_id','form_name')->where('name','=',R::get('name'))->first();
            $subfolder = Category::select('name')->where('category_id', '=', $sub->parent_id)->first();

            if ($sub->form_name == 'common'){
                return view('public_view/post_forms/'.$subfolder->name.'/common');
            }else{
                return view('public_view/post_forms/'.$subfolder->name.'/'.R::get('name'));
            }
        }

    }
    public function submit_post(Request $request){
        $data = $request->all();
       // dd(Category::select('category_id')->where('name','=',$data['category'])->first());
        $validate = Validator::make($data,[
            'tittle' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            return view('public_view/post_ad',['error' => $validate->errors(),'categories' => Category::all()]);
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
        if (session()->has('auth_user')){
            $post->user_id = session()->get('auth_user')['user_id'];
            $post->user_type = 'registered';
        } elseif (isset($data['guest_first_name']) && isset($data['guest_last_name']) && isset($data['guest_phone']) && isset($data['guest_email'])){
            $guest_temp = GuestUser::select('user_id')->where('email', '=', $data['guest_email'])->first();
            if($guest_temp == null){
                $guest = new GuestUser();
                $guest->user_name = $data['guest_first_name'];
                $guest->email = $data['guest_email'];
                $guest->phone = $data['guest_phone'];
                $guest->contact_name = $data['guest_last_name'];
                $guest->save();
            }
            $guest = GuestUser::select('user_id')->where('email','=',$data['guest_email'])->first();
            $post->user_id = $guest->user_id ;
            $post->user_type = 'guest' ;
            unset($data ['guest_first_name'],$data ['guest_email'],$data ['guest_phone'],$data ['guest_last_name']);
        }
        $images = $data['image_data_url'];
        $post->main_image = $data['main_image'] <= 0? 0: $data['main_image']-1;
        unset($data['main_image'],$data['image_data_url'],$data ['tittle'],$data ['description'],$data ['price'],$data ['city'],$data ['town'],$data['category'],$data['_token'],$data['photos'],);
        $info = json_decode(json_encode($data),true);
        $post->ad_info = $info;
        $post->save();

        if( session()->has('auth_user')){
            $post = Ad::select('ad_id')
                ->where('user_id', '=', session()->get('auth_user')->user_id)
                ->orderby('updated_at', 'desc')
                ->limit(1)
                ->first();
            $user_id = session()->get('auth_user')->user_id;
        }else{
            $post = Ad::select('ad_id')
                ->where('user_id', '=', $guest->user_id)
                ->orderby('updated_at', 'desc')
                ->limit(1)
                ->first();
            $user_id = $guest->user_id;
        }
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
        $post->save();
        if (session()->has('auth_user')){
            return redirect()->route('my_ad',['filter' => 'pending'])->with(['success' => 'Your Advertistment posted successfully...! After admin Approve it will be shown on the web site...!']);
        }else{
            return redirect()->route('index')->with(['success' => 'Your Advertistment posted successfully...! After admin Approve it will be shown on the web site...!']);
        }
    }

    public function deleteAd(Request $request){
        try{
            Ad::where('ad_id', '=', $request->ad_id)
                ->where('user_id', '=', session()->get('auth_user')->user_id)
                ->delete();
            return redirect()->route('my_ad',['filter' => 'all'])->with(['success' => 'ad ID:'.$request->ad_id.' was deleted']);
        }catch (Exception $e){
            return redirect()->route('my_ad',['filter' => 'all'])->with(['error' => 'ad ID:'.$request->ad_id.' can not be delete... please try again or email to web master']);
        }
    }

    public function editAd(Request $request){
        $ad = Ad::where('ad_id', '=', $request->ad_id)->first();
        return view('user.edit_ad', [
            'ad' => $ad,
        ]);
    }
    public function edit_specific_form(){
        $ad = Ad::where('ad_id', '=', R::get('ad_id'))->first();
        $name = Category::select('name')->where('category_id', '=', R::get('category_id'))->first();
        if ($name->name == 'other_items'){
            return view('public_view/edit_forms/other_items',['ad' => $ad]);
        }else{
            $sub = Category::select('parent_id','form_name')->where('name','=',$name->name)->first();
            $subfolder = Category::select('name')->where('category_id', '=', $sub->parent_id)->first();

            if ($sub->form_name == 'common'){
                return view('public_view/edit_forms/'.$subfolder->name.'/common',['ad' => $ad]);
            }else{
                return view('public_view/edit_forms/'.$subfolder->name.'/'.$name->name,['ad' => $ad]);
            }
        }
    }
    public function checkExpires($ad_id){
        $ad = Ad::select('created_at')
            ->where('ad_id', '=', $ad_id)->first();
        $created_date = date_format($ad->created_at, 'y-m-d');
        $tobe_date = date('y-m-d', strtotime('-30days'));
        if($created_date < $tobe_date){
            $ad->status = 0;
            $ad->ad_option = [];
            $ad->save();
        }
    }
    public function viewAd($ad_id){
        $this->checkExpires($ad_id);
        $ad = Ad::select('ad_id', 'category_id', 'tittle', 'user_id', 'user_type','description', 'price', 'city', 'town', 'images', 'main_image', 'ad_info','created_at', 'ad_option')
            ->where('ad_id', '=', $ad_id)
            ->where('status', '=', 1)
            ->first();
        $child = Category::select('category_id', 'name', 'parent_id')
            ->where('category_id', '=', $ad->category_id)
            ->first();
        $parent = Category::select('category_id', 'name')
            ->where('category_id', '=', $child->parent_id)
            ->first();
        $ad['child'] = $child;
        $ad['parent'] = $parent;
        if ($ad->user_type =='guest'){
            $user = GuestUser::select('contact_name', 'email', 'phone', 'created_at')
                ->where('user_id', '=', $ad->user_id)->first();
        }elseif ($ad->user_type == 'registered'){
            $user = User::select('contact_name', 'email', 'phone', 'created_at')
                ->where('user_id', '=', $ad->user_id)->first();
        }
        $ad['user'] = $user;

        //related ad
        $related_ad_ids = [];
        array_push($related_ad_ids, $ad->ad_id);
        $related_ads = Ad::where('category_id', '=', $ad->category_id)
            ->where('city', '=', $ad->city)
            ->whereNotIn('ad_id', $related_ad_ids)
            ->limit(4)
            ->get();
        foreach ($related_ads as $related_ad){
            array_push($related_ad_ids, $related_ad->ad_id);
        }
        if(count($related_ads) < 4){
            $related_ads_by_category = Ad::where('category_id', '=', $ad->category_id)
                ->whereNotIn('ad_id', $related_ad_ids)
                ->limit(4-count($related_ads))
                ->get();

        }
        return view('view_ad', [
            'ad' => $ad,
            'related_ads' => $related_ads,
            'related_ads_by_category' => isset($related_ads_by_category)? $related_ads_by_category : null,
        ]);
    }

    private function getPayment($total)
    {
        return 'success';
    }

    public function editAdSubmit(Request $request){
        $data = $request->all();
        // dd(Category::select('category_id')->where('name','=',$data['category'])->first());
        $validate = Validator::make($data,[
            'tittle' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            return view('public_view/post_ad',['errors' => $validate->errors(),'categories' => Category::all()]);
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
        $post->user_id = session()->get('auth_user')['user_id'];
        $post->user_type = 'registered';

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
        $user_id = session()->get('auth_user')->user_id;
//        //photos uploader
//        $files = [];
//        $images = explode(',',$images);
//        for( $count = 1;$count < count($images); $count++){
//            $name = time().rand(1,100);
//            $image = base64_decode($images[$count]);
//            $file_type = explode('.',$request->file('file')->getClientOriginalName())[1];
//            if( !file_exists(public_path('ad_photos/'.$user_id))){
//                mkdir(public_path('ad_photos/'.$user_id), 0777);
//            }
//            if(!file_exists(public_path('ad_photos/'.$user_id.'/'.$post->ad_id))) {
//                mkdir(public_path('ad_photos/'.$user_id.'/'.$post->ad_id), 0777);
//            }
//            file_put_contents(public_path('ad_photos/'.$user_id.'/'.$post->ad_id.'/'.$name.'.'.$file_type), $image);
//            $files[] = $name.'.'.$file_type;
//        }
//        $post->images = json_encode($files);
        $post->save();

        return redirect()->route('my_ad',['filter' => 'pending'])->with(['success' => 'Your Advertistment edited successfully...! After admin Approve changes it will be shown on the web site...!']);
    }

}
