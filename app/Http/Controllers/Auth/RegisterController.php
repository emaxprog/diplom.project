<?php

namespace App\Http\Controllers\Auth;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'phone' => 'required|integer',
            'address' => 'required|max:150',
            'postcode' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $userProfile = new Profile([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
        ]);

        $address = new Address([
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'city_id' => $data['city']
        ]);

        $user->profile()->save($userProfile);
        $user->profile->addresses()->save($address);
        $user->roles()->attach(Role::where('name', 'user')->first());

        return $user;
    }
}
