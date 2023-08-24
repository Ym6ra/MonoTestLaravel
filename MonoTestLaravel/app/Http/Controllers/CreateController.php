<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\updateStatusRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class CreateController extends Controller
{
    //public function index(){
    //    $clients = DB::table('clients')->paginate(3);
    //    return view('home', ['data' => $clients]);
    //}




    public function submitClient(CreateClientRequest $req)
    {
        //$client = new Client();
        //$client->name = $req->input('name');
        //$client->gender = $req->input('gender');
        //$client->phone = $req->input('phone');
        //$client->address = $req->input('address');
        //$client->cars = 1;
        //$client->save();
        $client =  DB::table('clients')->insertGetId([
            'name' => htmlspecialchars($req->input('name')),
            'gender' => htmlspecialchars($req->input('gender')),
            'phone' => htmlspecialchars($req->input('phone')),
            'address' => htmlspecialchars($req->input('address')),
            'cars' => 1,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('oneClientData', $client);
    }

    public function submitAuto(CreateAutoRequest $req)
    {
        $auto = DB::table('autos')->insert([
            'client_id' => $req->input('client_id'),
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number'=> htmlspecialchars($req->input('number')),
            'status' => htmlspecialchars($req->input('status')),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('oneClientData', $req->input('client_id'));
    }

    public function ClientData($id)
    {
        $client = DB::table('clients')->where('id', $id)->get();
        $autos = DB::table('autos')->where('client_id', $id)->get();
        dd($autos);
        return view('createAuto',['client' => $client]);
    }
    public function ClientAllData($currentPage)
    {
        if($currentPage){
            $page= $currentPage;
        }else{
            $page = 1;
        }
        $take = 3;
        $skip = ($page - 1) * $take;

        $clients = DB::table('clients')
                        ->skip($skip)
                        ->take($take)
                        ->get();

        $clientsId = DB::table('clients')
                        ->skip($skip)
                        ->take($take)
                        ->select('id')
                        ->orderBy('id')
                        ->get();

        $clientsPerPage = $clients->count();

        for ($i = 0; $i < $clientsPerPage; $i++) {
            $auto = DB::table('autos')
                ->orderBy('client_id')
                ->where('client_id', $clientsId[$i]->id)
                ->get();
            $autos[$i] = $auto;
            $autosPerClient[$i] = $auto->count();
        }

        $pages = ceil(DB::table('clients')->count()/ $take);
        $val =[
            'pages'=> $pages,
            'page'=>$page,
            'clientsPerPage'=> $clientsPerPage,
            'autosPerClient'=> $autosPerClient,
            'autos'=>$autos
        ];
        return view('home', ['data' => $clients], ['val'=>$val]);
    }
    public function oneClient($id){
        $client = DB::table('clients')
                        ->leftJoin('autos', 'clients.id','=','autos.client_id')
                        ->where('clients.id', $id)
                        ->get();

        $paginateId = DB::table('clients')
                        ->select('id')
                        ->orderBy('id')
                        ->get();
        $val = [
            'val' => ($client)->count(),
            'last' => ($paginateId)->count(),
            'clientId' => $id,
            'pid' => $paginateId,
        ];
        return view('createAuto', ['client' => $client],['data'=> $val],['pid'=>$paginateId]);

    }
    public function statistic(){
        $autos = DB::table('autos')
                        ->get();

        $aCount = $autos ->count(); //где a = autos, count

        $aMark = DB::table('autos') // где a = autos, mark
                        ->select('mark')
                        ->groupBy('mark')
                        ->orderBy('mark')
                        ->get();
        $amCount = $aMark->count(); //где a = autos, m = mark, count

        for ($i = 0; $i < $amCount; $i++){
            $val = $autos->where('mark', $aMark[$i]->mark)->count();
            $amVal[$i] = $val; //где a = autos, m = mark, val
        };

        $status = 'Присутствует';

        $aStatus = DB::table('autos')->where('status', $status)->get();  //где a = autos, status

        $asCount = $aStatus->count(); //где a = autos, s = status, count

        for ($i = 0; $i < $amCount; $i++) {
            $val = $aStatus->where('mark', $aMark[$i]->mark)->count();
            $amsVal[$i] = $val; //где a = autos, s = status, m = mark, val
        };

        $data = [
            'aCount' => $aCount, //всего машин
            'asCount' => $asCount, //всего машин на стоянке
            'aMark' => $aMark, // марки автомобилей
            'amCount' => $amCount, //всего марок автомобилей
            'amVal' => $amVal, //количество машин одной марки на стоянке и вне
            'amsVal' => $amsVal, // количество машин одной марки на стоянке
        ];


        return view('statistic', ['data' => $data]);
    }
}
