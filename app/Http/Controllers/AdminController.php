<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
 // change password Page
 public function changePasswordPage()
 {
     return view('admin.account.ChangePsw');
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

         // Auth::logout();

         // return redirect()->route('auth#loginPage');
         return back()->with(['changeSuccess'=>'Password Change Success!...']);
     }
     return back()->with(['notMatch' => 'The Old Password does not match.Try Again!']);


     // dd($dbHasHValue);

     // dd('changed Password');
 }
    // direct admin details page
    public function details(){
        return view('admin.account.details');
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
