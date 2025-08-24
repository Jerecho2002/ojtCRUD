<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPageFunction(){
        return view('users.login');
    }

    public function registerPageFunction(){
        return view('users.register');
    }

    public function indexPageFunction(){
        $user = User::all();
        $userTrashed = User::onlyTrashed()->get(); // Display only trashed/deleted
        // $userTrashed = User::withTrashed()->get(); Display with trashed/deleted and all students/data
        return view('users.index', ['users' => $user], ['userTrashed' => $userTrashed]);
    }

    public function updatePageFunction(User $user){
        return view('users.update', ['user' => $user]);
    }

    public function loginSubmitFunction(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect(route('indexPageName'))->with('success', 'Successfully Created User');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function registerSubmitFunction(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($validation);
        return redirect(route('registerPageName'))->with('success', 'Successfully Created User');
    }

    public function updateSubmitFunction(Request $request, User $user){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update($validation);
        return redirect(route('indexPageName'))->with('success', 'Successfully Updated User');
    }

    public function deleteSubmitFunction(User $user){
        $user->delete();
        return redirect(route('indexPageName'))->with('success', 'Successfully Deleted User');
    }

    public function logoutSubmitFunction(){
        Auth::logout();
        return redirect(route('loginPageName'));
    }

   public function restoreSubmitFunction($id)
    {
        // Restore do not belong to route binding model since its already deleted, that's why it needs to manually find the ID
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('indexPageName')->with('success', 'Successfully Restored User');
    }

    public function forceDeleteSubmitFunction($id)
    {
        // Deleted do not belong to route binding model since its already deleted, that's why it needs to manually find the ID
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('indexPageName')->with('success', 'Successfully Forced Delete User');
    }
}
