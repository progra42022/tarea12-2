<?php


namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class PrimerController extends BaseController
{
    function index(){
        return view('mis-views.primer-view', [
            'texto' => 'Hola Mundo'
        ]);
    }
    function printer(Request $request, $texto){
        $count = $request->session()->get('count', 0);
        $count++;
        $request->session()->put('count', $count);

        $contadorCache = cache('contador',0);
        $contadorCache++;
        cache(['contador'=>$contadorCache]);
        $exitCode = Artisan::call('app:send-emails', [
            '--opcion' => 'default'
        ]);
        return view('mis-views.primer-view', [
            'texto' => $texto,
            'count' => $count,
            'contadorCache' => $contadorCache
        ]);
    }
}