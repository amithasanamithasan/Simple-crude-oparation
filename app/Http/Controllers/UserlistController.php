<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userlist;
class UserlistController extends Controller
{
 

     public function submitlogin(Request $request)
    {
        session_start();
        $email1 = $request->get('email');
        $pass = $request->get('password');
        $c = 0;
        $details = userlist::where('email', $email1)->get();

        foreach ($details as $value) 
             {
            if ($email1 == $value['email'] && $pass == $value['password']) {
                $request->session()->put('user', $email1);
                $request->session()->put('pass', $pass);
                $request->session()->put('id', $value['id']);
                /*$request->session()->put('rule', $value['userroles']);*/
                $_SESSION['ee'] = $email1;
                $_SESSION['id'] = $value['id'];

                return redirect("/");
                $c = 1;
            }
        }
        if ($c == 0) {

            $request->session()->put('user', $email1);
            $request->session()->put('pass', $pass);
            $request->session()->put('id', $c);

            return redirect("/login");


        }


    }
}
