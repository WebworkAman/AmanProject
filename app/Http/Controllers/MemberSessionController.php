<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberSessionController extends Controller
{
    public function create()
    {
        return view('members.login');
    }

    public function store(Request $request)
    {
        return redirect('/');
    }
    public function delete(Request $request)
    {
        return redirect('/');
    }
    
}
