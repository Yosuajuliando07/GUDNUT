<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }
        else if (Auth::check() && Auth::user()->role->id == 2){
            $this->redirectTo = route('penjual.dashboard');
        }
        else if (Auth::check() && Auth::user()->role->id == 3){
            $this->redirectTo = route('home');
        }
        else
        {
            $this->redirectTo = route('register');
        }

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required','unique:users','min:12','max:15'],
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'role_id' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tgl_lahir' => $data['tgl_lahir'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
