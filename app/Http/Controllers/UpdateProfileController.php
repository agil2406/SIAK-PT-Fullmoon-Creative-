<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;


class UpdateProfileController extends Controller
{
    public function edit (){
        return view('pages.profile');
    }

    public function update (Request $request){
        
        $request ->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        
        auth()->user()->update([
            'name' => $request ->name,
            'email' => $request ->email,
            'level' => $request ->level,
        ]);
        return redirect('/profile')->with('message', 'Data berhasil di ubah');
    }
    
}

