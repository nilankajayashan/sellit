<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register_validate(Request $request){
        $validator = validator::make($request->all(),[
            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'contact_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',

        ]);
        if ($validator->fails()){
            if($validator->errors()->has('username')){
                return view('register')->withErrors( ['username' => 'Please Check your name again']);
            }elseif($validator->errors()->has('email')){
                return view('register')->withErrors( ['email' => 'Please Check you entered Email again']);
            }elseif($validator->errors()->has('password')){
                return view('register')->withErrors( ['password' => 'Please Check you entered password again']);
            }elseif($validator->errors()->has('contact_name')){
                return view('register')->withErrors( ['contact_name' => 'Please Check you entered contact name again']);
            }elseif($validator->errors()->has('address')){
                return view('register')->withErrors( ['address' => 'Please Check you entered address again']);
            }elseif($validator->errors()->has('mobile')){
                return view('register')->withErrors( ['mobile' => 'Please Check you entered mobile number again']);
            }
        }
        $validated = $validator->validated();
        try{
            $user = new User();
            $user->user_name = $validated['username'];
            $user->contact_name = $validated['contact_name'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->address = $validated['address'];
            $user->phone = $validated['mobile'];
            $user->save();
            return view('login', [ 'success' => 'Dear '.$validated['username'].', you are registered successfully...! try to login now']);



        }catch (Exception $e){
            if($e->getCode() == 23000){
                $message = "You entered email already Registered Please try to login or try with another email...!";
            }else{
                $message = "Some thing went wrong...! please try again";
            }
            return view('register',['error'=>$message]);
        }
    }
}
