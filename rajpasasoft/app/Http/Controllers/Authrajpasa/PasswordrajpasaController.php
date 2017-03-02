<?php

namespace App\Http\Controllers\Authrajpasa;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Authrajpasa\Guard;
use Illuminate\Contracts\Authrajpasa\PasswordrajpasaBroker;
use Illuminate\Foundation\Authrajpasa\ResetsPasswordrajpasas;

class PasswordrajpasaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Passwordrajpasa Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling passwordrajpasa reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswordrajpasas;

    /**
     * Create a new passwordrajpasa controller instance.
     *
     * @param  \Illuminate\Contracts\Authrajpasa\Guard  $authrajpasa
     * @param  \Illuminate\Contracts\Authrajpasa\PasswordrajpasaBroker  $passwordrajpasas
     * @return void
     */
    public function __construct(Guard $authrajpasa, PasswordrajpasaBroker $passwordrajpasas)
    {
        $this->authrajpasa      = $authrajpasa;
        $this->passwordrajpasas = $passwordrajpasas;

        $this->middleware('guest');
    }
}
