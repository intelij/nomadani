<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index() {
        return view('welcome', ['rsvp' => false]);
    }

    public function confirm(Request $request) {
        return $request->all();
    }

    public function edit($phone)
    {
        $payload = [
//            'name' => 'Khululekani Mkhonza',
//            'phone' => '07983951875',
//            'confirmation' => false,
        ];

        return view('welcome', $payload);

    }
}
