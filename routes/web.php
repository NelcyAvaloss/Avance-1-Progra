<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\PerfilController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\SoporteController;

// Redirección del inicio ('/') hacia la página de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Vista del formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Procesa el formulario de registro
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Procesa el formulario de login
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// 🔐 Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas de libros
    Route::get('/Mis-libros', [LibroController::class, 'index'])->name('Mis_libros');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
    Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');

    // Panel administrador
    Route::get('/admin', function () {
        return view('Admin');
    })->name('admin');

    // Perfil y otros
   // Mostrar perfil del usuario (crear método 'perfil' si aún no existe)
    Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');

    // Vista para editar perfil
    Route::get('/editar-perfil', function () {
        return view('Editar_perfil');
    })->name('editar_perfil');

    // Vista después de actualizar perfil
    Route::get('/perfil_actualizado', function () {
        return view('Perfil_actualizado');
    })->name('perfil_actualizado');

    // Ruta para procesar la actualización del perfil
    Route::put('/perfil/update', [PerfilController::class, 'update'])->name('perfil_update');

    // Historial y Soporte
    Route::get('/historial', function () {
        return view('Historial');
    })->name('historial');

    Route::get('/soporte', function () {
        return view('Soporte');
    })->name('soporte');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
    Route::delete('/admin/usuario/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.eliminarUsuario');
    Route::post('/admin/usuario/{id}/restringir', [AdminController::class, 'restringirUsuario'])->name('admin.restringirUsuario');
    Route::post('/admin/usuario/{id}/habilitar', [AdminController::class, 'habilitarUsuario'])->name('admin.habilitarUsuario');
    Route::get('/admin/usuario/{id}', [AdminController::class, 'verUsuario'])->name('admin.verUsuario');


    Route::get('/soporte', [SoporteController::class, 'mostrarFormulario'])->name('soporte.form');
    Route::post('/soporte', [SoporteController::class, 'enviar'])->name('soporte.enviar');



});
