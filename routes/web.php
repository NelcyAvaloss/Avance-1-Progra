    <?php



   use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Libros (usuario normal)
    Route::get('/Mis-libros', [LibroController::class, 'index'])->name('Mis_libros');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
    Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');

    // Panel administrador
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Funciones de usuario
    Route::delete('/admin/usuario/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.eliminarUsuario');
    Route::post('/admin/usuario/{id}/restringir', [AdminController::class, 'restringirUsuario'])->name('admin.restringirUsuario');
    Route::post('/admin/usuario/{id}/habilitar', [AdminController::class, 'habilitarUsuario'])->name('admin.habilitarUsuario');
    Route::get('/admin/usuario/{id}', [AdminController::class, 'verUsuario'])->name('admin.verUsuario');

    // Funciones de libros
    Route::delete('/admin/libro/{id}', [AdminController::class, 'eliminarLibro'])->name('admin.eliminarLibro');
    Route::post('/admin/libro/{id}/restringir', [AdminController::class, 'restringirLibro'])->name('admin.restringirLibro');
    Route::post('/admin/libro/{id}/aprobar', [AdminController::class, 'aprobarLibro'])->name('admin.aprobarLibro');

    // Perfil
    Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
    Route::get('/editar-perfil', function () {
        return view('Editar_perfil');
    })->name('editar_perfil');
    Route::get('/perfil_actualizado', function () {
        return view('Perfil_actualizado');
    })->name('perfil_actualizado');
    Route::put('/perfil/update', [PerfilController::class, 'update'])->name('perfil_update');

    // Soporte
    Route::get('/soporte', [SoporteController::class, 'mostrarFormulario'])->name('soporte.form');
    Route::post('/soporte', [SoporteController::class, 'enviar'])->name('soporte.enviar');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/historial', function () {
    return view('Historial');
})->name('historial');

});
