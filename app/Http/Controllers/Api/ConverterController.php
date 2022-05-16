<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConverterController extends Controller
{
    public function index(){
    return view('converter.index');
    }

    public function convert(Request $request){

        $initial = $request->get('initial');
        $final = $request->get('final');
        $amount = $request->get('amount');

        if($initial == 'BYN'){
            $initialCurrency = 1;
        }else{
            $initialCurrency = Http::withOptions(['verify' => false])
                ->get("https://www.nbrb.by/api/exrates/rates/$initial?parammode=2")
                ->json()['Cur_OfficialRate'];
        }
        if($final == 'BYN'){
            $finalCurrency = 1;
        }else{
            $finalCurrency = Http::withOptions(['verify' => false])
                ->get("https://www.nbrb.by/api/exrates/rates/$final?parammode=2")
                ->json()['Cur_OfficialRate'];
        }

        $result = $amount * $initialCurrency / $finalCurrency;

        return view('converter.result', compact('result'));
    }
}
