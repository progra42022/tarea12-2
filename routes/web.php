<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PrimerController;
Route::get('/mi-primer-controller', [PrimerController::class, 'index']);
Route::get('/mi-primer-controller/{texto}', [PrimerController::class, 'printer']);


use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');



use App\Models\Marca;
Route::get('/ejemplo-relaciones', function(){
    echo '<pre>';
    
    echo '############# Marca ########################################'.PHP_EOL;
    $marca = Marca::find(1);
    print_r($marca->toArray());


    echo '############# Modelos a partir de una Marca ################'.PHP_EOL;
    $modelos = $marca->modelos;
    print_r($modelos->toArray());


    echo '############# Un Modelo especifico a partir de una marca ################'.PHP_EOL;
    $corola = $marca->modelos()->where('nombre','Corola')->first(); //get para obtener varios
    print_r($corola->toArray());


    echo '############# La marca a partir de un modelo ###############'.PHP_EOL;
    $marca2 = $modelos[0]->marca; //tambien $corola->marca   funciona
    print_r($marca2->toArray());


    echo '############# Una marca que traiga embebidos los modelos ###############'.PHP_EOL;
    $marca3 = Marca::where('id',1)->with('modelos')->first();
    print_r($marca3->toArray());


    echo '</pre>';
});


Route::get('/ejemplo-api', function(){
    $servidor = 'http://tarea12.localhost/api/';
    $client = new GuzzleHttp\Client(['base_uri' => $servidor]);
    $response = $client->request('GET', 'marcas/1');
    $contents = $response->getBody()->getContents();
    $as_array = json_decode($contents);
    return $as_array;
});
