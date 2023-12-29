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

    public function loginPage()
    {
        return view('login');
    }

    //direct register Page

    public function registerPage()
    {
        return view('register');
    }
    // direct dashboard

    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#list');
        } else
            return  redirect()->route('user#home');
    }
    // change password Page
    public function changePasswordPage()
    {
        return view('admin.password.ChangePsw');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id', $currentUserId)->first();
        $dbHasHValue = $user->password;  // hash value
        if (Hash::check($request->oldPassword, $dbHasHValue)) {
            $data = ['password' => Hash::make($request->newPassword)];
            User::where('id', Auth::user()->id)->update($data);

            Auth::logout();

            return redirect()->route('auth#loginPage');
            // return $this->loggedOut($request) ?: redirect('auth#loginPage');

        }
        return back()->with(['notMatch' => 'The Old Password does not match.Try Again!']);


        // dd($dbHasHValue);

        // dd('changed Password');
    }

    // password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required | min: 6 | max:10 ',
            'newPassword' => 'required | min: 6 | max:10 ',
            'confirmPassword' => 'required | min: 6 | max:10  | same:newPassword'
        ])->validate();
    }
}
