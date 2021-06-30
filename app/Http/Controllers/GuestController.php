<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index() {
        return view('welcome', ['rsvp' => false, 'confirmation' => false]);
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
            ["Miss Tumuza & Friend",3,7312278134],
            ["Mrs M Mkwananzi &  Mum",3,7563033645],
            ["Mrs M walker ",1,7791465849],
            ["Mr & Mrs Mlilo",2,7832996294],
            ["Mr & Mrs Nyathi ",2,7411458443]
        ];

        $mobile = (int) $request->get('mobile');

        $data = [
            'name' => null,
            'number_of_guests' => 0,
            'phone' => "0$mobile",
            'confirmation' => $request->get('attending'),
            'invited' => false
        ];

        foreach ($guests as $guest) {
            if ($mobile == $guest[2]) {
                $data = [
                    'name' => $guest[0],
                    'number_of_guests' => $guest[1],
                    'phone' => "0".$guest[2],
                    'confirmation' => $request->get('attending'),
                    'invited' => true
                ];
            }
        }

        return view('welcome', $data);

    }

    public function process(Request $request)
    {

        $input = $request->all();

        $data = [
            'name' => $input['name'],
            'number_of_guests' => $input['number_of_guests'],
            'phone' => $input['phone'],
            'confirmation' => $request->get('attending'),
        ];

        $file = fopen('guests_rsvp.csv','a');  // 'a' for append to file - created if doesn't exit

        fputcsv($file,$data);

        fclose($file);

        return view('process', $data);

    }
}


