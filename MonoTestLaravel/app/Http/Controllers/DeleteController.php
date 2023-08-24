<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class DeleteController extends Controller
{
    public function deleteClient($id)
    {
        $curentId=$id;
        DB::table('clients')->where('id', $curentId)->delete();

        return redirect()->back();
    }

    public function deleteAuto($id)
    {
        $curentId = $id;
        DB::table('autos')->where('id', $curentId)->delete();

        return redirect()->back();
    }
}
