<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::denies('view-admin')) {
            abort(403,'Permission denies');
        }
        return view('admin.index');
    }
}
