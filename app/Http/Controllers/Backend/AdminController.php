<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Gate;

class AdminController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (Gate::denies('view-admin')) {
            abort(403,'Permission denies');
        }
        return view('admin.index');
    }
}
