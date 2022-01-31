<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials_email_password=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($credentials_email_password)) {
            // Authentication passed...
            $kyc=new Kyc();
            $kyc_detail=$kyc->where('user_id','=',Auth::user()->id)->get();
            return redirect()->intended('dashboard')->with(['kyc'=>$kyc_detail]);
        }
        else
        {
            return redirect('/login')->withErrors("login failed, try again");
        }
    }

    public function register(Request $request)
    {
            $validated_data= $this->validate($request,
                array(
                    'name'=>['required','min:2','max:255'],
                    'email'=>['required','email','unique:users,email','max:225','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
                    'password'=>['required','min:6','confirmed'],
                )
            );
            $user=new User();
            $user->name=$validated_data['name'];
            $user->email=$validated_data['email'];
            $user->password=bcrypt($validated_data['password']);
            $user->user_type_id=2;
//            print_r($user->save());
            if($user->save() == 1)
            {
                return redirect('/login');
            }
            else{
                return back()->withInput();
            }

    }

    public function dashboard()
    {
        $kyc=new Kyc();
        $user_kyc=$kyc->where('user_id',Auth::user()->id);
        $kycs=$kyc->get();
        return view('dashboard.user_dashboard',compact('user_kyc','kycs'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }


}
