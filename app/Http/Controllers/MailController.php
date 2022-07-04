<?php

namespace App\Http\Controllers;

use App\Mail\MailToCustomer;
use App\Models\Ad;
use App\Models\GuestUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function MailToCustomer(Request $request){
        $validator = validator::make($request->all(),[
            'ad_id' => 'required',
            'visitor_name' => 'required',
            'visitor_email' => 'required',
            'visitor_mobile' => 'required',
            'visitor_message' => 'required',
        ]);
        if ($validator->fails()){
            if($validator->errors()->has('visitor_name')){
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->withErrors( ['visitor_name' => 'Your name is required']);
            }elseif($validator->errors()->has('visitor_email')){
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->withErrors( ['visitor_email' => 'Your email is required']);
            }elseif($validator->errors()->has('visitor_mobile')){
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->withErrors( ['visitor_mobile' => 'Your mobile number is required']);
            }elseif($validator->errors()->has('visitor_message')){
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->withErrors( ['visitor_name' => 'Your message is required']);
            }
        }
        $validated = $validator->validated();
        $ad_details = Ad::select('ad_id', 'user_id', 'user_type')->where('ad_id', '=', $validated['ad_id'])->first();
        if ($ad_details->ad_id == $validated['ad_id']){
            $ad = Ad::select('ad_id', 'tittle')->where('ad_id', '=', $validated['ad_id'])->first();
            if($ad_details->user_type == 'registered'){
                $user = User::select('email', 'contact_name')->where('user_id', '=', $ad_details->user_id)->first();
            }elseif($ad_details->user_type == 'guest'){
                $user = GuestUser::select('email', 'contact_name')->where('user_id', '=', $ad_details->user_id)->first();
            }else{
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->with( ['error' => 'Can not access advert user details please try again']);
            }
            if ($user == null){
                return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->with( ['error' => 'Can not access advert user details please try again']);
            }
        }
        $data = [
            'visitor_name' => $validated['visitor_name'],
            'visitor_email' => $validated['visitor_email'],
            'visitor_mobile' => $validated['visitor_mobile'],
            'visitor_message' => $validated['visitor_message'],
            'tittle' => $ad->tittle,
            'ad_id' => $ad->ad_id,
            'contact_name' => $user->contact_name,
        ];
        Mail::send('mail.mail_to_customer',  ['data' => $data], function($message) use ($user) { $message->to($user->email)->subject('SELLIT.LK');});
        if (Mail::failures()) {
            return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->with( ['error' => 'Your message sent failed to advert']);
        }else{
            return redirect()->route('view-ad',['ad_id' => $request->ad_id]) ->with( ['success' => 'Your message sent successfully to advert, he will be contact you...']);
        }
    }
}
