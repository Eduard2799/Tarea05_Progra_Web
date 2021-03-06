<?php

  // file: controllers/LoginController.php
  require_once('models/user/UserModel.php');

  class LoginController extends Controller {

    public function showLoginForm() {
        // echo "Hola";
        return view('auth/login', ['error'=>false,'login'=>Auth::check()]);
    }

    public function login() {
      $email = Input::get('email');   
      $password = Input::get('password');
      if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        return redirect('/');
      }
      return redirect('/loginFails');
    }

    public function loginFails() {
      return view('Auth/login',
        ['error'=>true,'login'=>Auth::check()]);
    }

    public function logout() {
      Auth::logout();
      return redirect('/');
    }
  }
?>