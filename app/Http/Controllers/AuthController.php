<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // direct login page
    
    public function loginPage(){
        return view('login');
    }

    //direct register Page
    
    public function registerPage(){
        return view('register');
    }
    // direct dashboard
    
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()-> route('category#list');
         }else
            return  redirect()-> route('user#home');
    }    
    // change password Page 
    public function changePasswordPage(){
        return view('admin.password.ChangePsw');
    }   

    // change password 
    public function changePassword(Request $request){
        // $this->passwordValidationCheck($request);
        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHasHValue = $user->password;  // hash value

        // $hashedValue = Hash::make( 'Kyaw Swe' );
        // if( Hash::check(' Swe', $hashedValue) )
        // dd('Password Changed');
        // else 
        // dd(' Incorrect Password '); 


        dd($dbPassword);

        dd('changed Password'); 
    }

    // password validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required | min: 6 ',
            'newPassword' => 'required | min: 6',    
            'confirmPassword' => 'required | min: 6 | same:newPassword      '
        ])->validate();
    }
}
