<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function roleForm()
    {
        return view('admin.role');
    }

    public function addRole(Request $request)
    {
        if($request->photo)
        {
            $name = uniqid()."_".$request->photo->getClientOriginalName();
            $request->photo->storeAs('images',$name);
        }else{
            $name = "default.jpg";
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'type' => $request->type,
            'photo' => $name,
        ]);

        return back();
    }
}
