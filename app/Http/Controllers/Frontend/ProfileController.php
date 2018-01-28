<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\Profile;
use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use Auth;

use App\Models\Country;
use App\Models\Address;

class ProfileController extends \App\Http\Controllers\Controller
{
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
            'user' => $user,
        ];

        return view('profile.edit', $data);
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
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($user->password);
        }

        $user->save();

        $user->profile()->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.edit', $user);
    }
}
