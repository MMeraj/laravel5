<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use DB;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }
    
   public function index() {
        if (Auth::check()) {
            return redirect('/view');
        } else {
            return view('auth/login');
        }
    }

    public function Login() {
        $email = \Input::get('email');
        $password = \Input::get('password');
        $remember = \Input::get('remember');



        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect('/view');
        } else {
            Session::flash('message', 'Login Details Incorrect....');
            return redirect('auth/login');
        }
    }

    public function postRegister() {
        return "Hello";
        die;
        $data = \Input::all();
        
        $validator = Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
         
        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect('auth/register')->withErrors($validator)->withInput(\Input::except('password', 'password_confirm'));
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

//                Mail::send('mail.welcome', array('name'=>\Input::get('name')), function($message){
//        $message->to(\Input::get('email'), \Input::get('name') )->subject('Welcome to the Laravel 5 Auth App!');
//    });
            //Session::flash('success', 'Detail Uploaded Successfully');
            //return redirect('auth/login');
            $credentials = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password')
            );

            if (Auth::attempt($credentials)) {
                return redirect('/view');
            }
        }
    }
    
    public function logout() {
  Auth::logout(); // logout user
  return redirect('user/login'); //redirect back to login
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
