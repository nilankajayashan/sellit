<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_validate(Request $request){
        $validator = validator::make($request->all(),[
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            if($validator->errors()->has('email')){
                return view('register')->withErrors( ['email' => 'Please Check you entered Email again']);
            }elseif($validator->errors()->has('password')){
                return view('register')->withErrors( ['password' => 'Please Check you entered password again']);
            }
        }
        $validated = $validator->validated();
        try{
            $user = User::where('email','=',$validated['email'])->first();
            if(Hash::check(request('password'), $user->password)){
                //make session
                $user_token = random_bytes(64);
                session()->put('user_token', $user_token);
                session()->put('auth_user', $user);
                return redirect()->route('my_account');
            }else{
                return view('login',[
                        'error' => 'Dear '. $request->email .' you entered password is invalid.',
                    ]);
            }
        }catch (Exception $e){
            if($e->getMessage() == 'Attempt to read property "password" on null'){
                return view('login')
                    ->withErrors([
                        'error' => 'Dear user you entered e-mail is unavailable.',
                    ]);
            }else{
                return view('login', ['error' => 'Some thing went wrong please try again...!']);
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget(['user_token', 'auth_user']);
        $request->session()->flush();
        return redirect()->route('login')->with(['success', 'You are logged out successfully...!']);
    }
}
