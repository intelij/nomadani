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

    public function retrieve(Request $request)
    {
        $guests = [
            ["Mr & Mrs Mkhonza",2,7881682458],
            ["Mr & Mrs Odipo     ",2,7742059562],
            ["Mr & Mrs Ndlovu ",2,7908211308],
            ["Mr & Mrs Mabaisa ",2,7540882973],
            ["Mr & Mrs Lunga",4,7758237423],
            ["Mr & Mrs Sowa ",2,7850243349],
            ["Mr & Mrs  Charumbwidza",4,7411208198],
            ["Mr & Mrs Sibindi ",2,7876467778],
            ["Mr & Moyo ",2,7757072898],
            ["Mr & Mrs Mremi ",2,7948437822],
            ["Mr & Mrs Kaseke",2,7903729197],
            ["Mr & Mrs Roycroft ",2,7799708463],
            ["Mr & Mrs Chiwota  ",2,7878472300],
            ["Mrs S Mtshali ",3,7476214764],
            ["Mr & Mrs Sibindi ",2,7876467778],
            ["Miss Rumbie & Welter ",4,7429396795],
            ["Mr Mabutho ",1,7833556945],
            [" Miss Tumuza & Friend",3,7312278134],
            ["Mrs M Mkwananzi &  Mum",3,7563033645],
            ["Mrs M walker ",1,7791465849],
            ["Mr & Mrs Mlilo",2,7832996294],
            ["Mr & Mrs Nyathi ",2,7411458443]
        ];

        $mobile = (int) $request->get('mobile');
        $data = [
            'name' => "Guest Mobile Not Registered",
            'number_of_guests' => 0,
            'phone' => "0$mobile",
        ];

        foreach ($guests as $guest) {
            if ($mobile == $guest[2]) {
                $data = [
                    'name' => $guest[0],
                    'number_of_guests' => $guest[1],
                    'phone' => "0".$guest[2],
                ];
            }
        }

        return view('welcome', $data);

    }
}
