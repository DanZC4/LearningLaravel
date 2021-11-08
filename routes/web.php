<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', function(){
    return 'hello';
});

Route::put('post/{id}', function($id){

})->middleware('role:editor');

/** 
// abrebiacion para la vista de una ruta tambien le pasamos valores al parametro name :)
Route::view('/welcome', 'welcome', ['name' => 'Daniel']);

// una ruta normal para dar vistazo a una ruta cualquiera
Route::get('/hello', function () {
    return 'Hello every body';
});
// ejemplo de una ruta con un controlador
Route::get('/user', [UserController::class, 'index']);

//otra ruta normal de ejemplo
Route::get('/there', function () {
    return 'fuck off walmart!!!!';
});

// este metodo se usa para redirigir una ruta a otra como por ejemplo cada que pongan la ruta "/user" se cambiara por la ruta '/hello' devolviendo una respuesta http 301
Route::redirect('/user', '/hello', 301);

//este metodo hara lo mismo pero sin devolverte la respuesta 301
Route::permanentRedirect('/here', '/there');

//aqui colocamos un parametro en la url, en el cual le podemos dar un valor a nuestra url
Route::get('/hello/{id}', function ($id) {
    return 'USER:' . $id;
});

//aqui igual
Route::get('/there/{id_user}', function ($id_user) {
    return 'hello Mr: ' . $id_user;
});

// aqui le podemos dar dos valores a la url
Route::get('/there/{id_user}/buies/{id_buy}', function ($id_user, $id_buy) {
    return 'Hello Mr: ' . $id_user . 'you buy: ' . $id_buy;
});

//el metodo Where() se usa para poder usar otros caracteres en nuestra url
Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

//tambien se puede usar para dar instrucciones a las url como un maximo de caracteres o valores
Route::get('/user/{id}', function($id){
    return $id;
})->where('id', '[1-9]+');

Route::get('/user/{name}', function($name){
    return $name;
})->where('name', '[A-Za-z]+');

//aunque un atajo que podemos tomar son los metodos whereNumber() y whereAlphaNumeric
Route::get('/user/{id}/{name}', function ($id, $name) {
    return "hello user " . $id . ' your name is ' . $name;
})->whereNumber('id')->whereAlphaNumeric('name');


// el metodo name() le pude dar nombre a una ruta
Route::get('/user/profile', function () {
    return 'fuck you';
})->name('profile');

// aqui podemos hacer urls con el metodo route() 
 $url = route('profile');

// se usan como un grupo de rutas donde se ejecutara un middleware en el mismo orden del array [aun no se bien que es un middleware ;-;]
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        
    });

    Route::get('/user/profile', function () {
     
    });
});

// el metodo domain()se usa para agregar un subdominio a tu ruta
Route::domain('{account}.example.com')->group(function () {
    Route::get('/user/{id}', function ($id) {
        return 'littel bitch' . $id;
    });
});

// metodo prefix uno de mis favoritos, se usa para aggregar una ruta antes de la ruta que va dentro del metodo group() es muy util si tus rotas va a tener la misma ruta, por ejemplo un usuario;
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'dflfdfhfhaafjh';
    });
    Route::get('/users/{id}', function ($id) {
        return 'littel bitch ' . $id;
    });
});
// este se usa para agregar una "valor anterior cuando les ponemos nombres a las ruta por ejemplo esta seria "admin.users"
Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        return 'I Willm Make It';
    })->name('users');
});

// se usa para agregar una variable de un modelo a tu url, 
Route::get('/users/{user}', function (User $user) {
    return $user->email;
});

// aqui podemos espesificarlo de otra forma
Route::get('/posts/{post:slug}', function(Post $post){
    return $post;
});

Route::get('/users/{user}/posts/{post}', function( User $user, Post $post){
    return $post;
});
 
// el metodo fallback() dara como respuesta todo lo que no sea una ruta encontrada
Route::fallback(function () {
    return 'dont care me';
});

*/
