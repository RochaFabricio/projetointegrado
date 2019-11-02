<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Sinergi\BrowserDetector\Browser;
use Sinergi\BrowserDetector\Os;
use Sinergi\BrowserDetector\Device;
use Sinergi\BrowserDetector\Language;



class VersaoController extends Controller
{
    public function index(Request $request){

        $versao_db = DB::select('show variables like "%version%"');
        $data_hora_db = DB::select('select now() as data');
        // $hora =
        // dd($request);
        $browser = new Browser();
        $os = new Os();
        $language = new Language();
        $ip = $request->ip();
        $device = new Device();

        return view('versao.info')->with([
            'versao_db' => $versao_db,
            'data_hora_db' => $data_hora_db,
            'browser' => $browser,
            'os' => $os,
            'language' => $language,
            'ip' => $ip,
            'device' => $device
            ]);
    }
}
