<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\updateStatusRequest;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\updateAutoRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Auto;

class UpdateController extends Controller
{
    public function updateStatus($id, updateStatusRequest $req)
    {
        $curentId=$id;
        $auto = DB::table('autos')
                        ->where('id', $curentId)
                        ->limit(1)
                        ->update(['status' => htmlspecialchars($req->input('status'))]);

        return redirect()->back();
    }

    public function updateAuto($id)
    {
        //dd($id);
        $currentId = $id;
        $auto = DB::table('autos')
                    ->where('id', $currentId)
                    ->first();

        return view('updateAuto', ['data' => $auto]);
    }

    public function submitUpdateAuto($id, updateAutoRequest $req)
    {
        $currentId = $id;
        $client_id = $req->input('client_id');

        $auto = DB::table('autos')->where('id', $currentId)->limit(1)->update([
            //'client_id' => $req->input('client_id'),
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number' => htmlspecialchars($req->input('number')),
            'status' => $req->input('status'),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('oneClientData', $client_id);
    }

    public function updateClient($id)
    {
        $curentId = $id;
        $client = DB::table('clients')->where('id', $curentId)->first();
        $val = [
            'title' => 'Редактировать клиента №',
            'form' => 'successUpdateClient',

        ];
        return view('updateClient', ['data' => $client], ['val' => $val]);
    }

    public function submitUpdateClient($id, CreateClientRequest $req)
    {
        $page = 1;
        $curentId = $id;

        $client = DB::table('clients')->where('id', $curentId)->limit(1)->update([
        'name' => htmlspecialchars($req->input('name')),
        'gender' => htmlspecialchars($req->input('gender')),
        'phone' => htmlspecialchars($req->input('phone')),
        'address' => htmlspecialchars($req->input('address')),
        'cars' => 1,
        "updated_at" => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('AllData', $page);
    }
}
