<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;

class SessionsController extends Controller
{    
     use AuthenticatesUsers;
     public function create()
    {
        return view('sessions.create');
    }
    public function thisuser()
    {
        return view('pages.myaccount');
    }
    
    
    
   public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth()->attempt($credentials)) {

            auth()->login($this);
            if (auth()->user()->isadmin==1){
            
            return redirect('/admin');}
            else {
                return redirect('/home');
            }
        }
        else{
           return redirect()->back();
        }
        
    }
    
    public function submit(Request $request )
    {
        $data = $request->validate([
        'name' => '',
        'email' => '',
        'adresse' => '',
        'codePostal' => '',
        'phone' => '',
    ]);
        
      auth()->user()->fill($data);
      auth()->user()->save();

        return redirect()->to('/myaccount');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/home');
    }
}
