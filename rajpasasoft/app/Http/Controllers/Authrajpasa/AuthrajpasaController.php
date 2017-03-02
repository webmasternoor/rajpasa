<?php

namespace App\Http\Controllers\Authrajpasa;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Authrajpasa\Guard;
use Illuminate\Contracts\Authrajpasa\Registrar;
use Illuminate\Foundation\Authrajpasa\AuthrajpasaenticatesAndRegistersUsers;
use App\Userrajpasa;
use Validator;

class AuthrajpasaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authrajpasaentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthrajpasaenticatesAndRegistersUserrajpasas;

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Userrajpasa
     */
    protected function create(array $data)
    {
        return Userrajpasa::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
