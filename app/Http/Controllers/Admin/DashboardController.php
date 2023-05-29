<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        /*
        $role1 = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $role2 = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'User',
            'slug' => 'user',
        ]);

        $credentials = [
            'email'    => 'admin@gmail.com',
            'password' => '123',
        ];
        
        $user1 = \Sentinel::create($credentials);
        $activation = \Activation::create($user1);
        $role1->users()->attach($user1);

        $credentials = [
            'email'    => 'user@gmail.com',
            'password' => '123',
        ];
        $user2 = \Sentinel::create($credentials);
        $activation = \Activation::create($user2);
        $role2->users()->attach($user2);
        */

        return view("admin.home");
    }

    public function login()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $email = $request->email;
        $pwd = $request->password;

        $credentials = [
            'email'    => $email,
            'password' => $pwd,
        ];
        
        $user = \Sentinel::authenticate($credentials);
        if ($user != null) {
            return redirect()->route('admin');
        } else {
            $err = 'Invalide username or password';
            return view('admin.login', compact('err'));
        }
    }

    public function logout()
    {
        \Sentinel::logout();
        return redirect()->route('login');
    }
}
