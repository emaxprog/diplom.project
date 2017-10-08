<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Country;
use App\Region;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::has('profile')->get();
        $data = [
            'users' => $users
        ];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array_merge(User::rules(), Profile::rules()));

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $userProfile = new Profile([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city_id' => $request->city
        ]);

        $user->profile()->save($userProfile);
        $user->roles()->attach(Role::where('name', 'User')->first());

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array_merge(User::rules($id), Profile::rules()));

        $user = User::find($id);
        $user->username = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($user->password);
        }

        $user->save();

        $role = Role::where('name', $request->role)->first();

        $user->roles()->sync([$role->id]);

        $user->profile()->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'city_id' => $request->city,
            'postcode' => $request->postcode,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return "Пользователь успешно удален!";
    }

    public function uploadRegions($id)
    {
        $regions = Country::find($id)->regions;

        $data = [
            'regions' => $regions
        ];

        return view('upload.regions', $data);
    }

    public function uploadCities($id)
    {
        $cities = Region::find($id)->cities;

        $data = [
            'cities' => $cities
        ];

        return view('upload.cities', $data);
    }
}