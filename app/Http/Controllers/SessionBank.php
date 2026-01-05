<?php

namespace App\Http\Controllers;

use App\Models\Admin\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionBank extends Controller
{
    public function index($bank = null)
    {
        Session::forget('bank');
        if ($bank === null) {
            $bank = auth()->user()->profile->token_profile;
        }
        $profile = Profile::where('token_profile', $bank)->first();
        Session::put('bank', $profile->id_profile);
        return redirect()->back();
    }
}
