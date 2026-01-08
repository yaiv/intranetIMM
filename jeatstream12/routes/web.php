<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Admin\SolicitudController as AdminSolicitudController;

// Modelos y Facades para la ruta del PDF
use App\Models\SolicitudServicio;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Publico\InvestigadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

// --- RUTAS PROTEGIDAS (Requieren Login) ---
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // 1. Dashboard Principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 2. NUEVA RUTA DE PERFIL (Ahora sí está protegida)
    Route::get('/mi-perfil', function () {
        return view('profile.show-researcher');
    })->name('researcher.profile');

});

// --- OTRAS RUTAS DE USUARIO (También protegidas) ---
// Nota: Podrías unir este grupo con el de arriba, pero separarlos está bien para organizar
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Mis Solicitudes
    Route::get('/solicitudes', function () {
        return view('solicitudes.index');
    })->name('solicitudes.index');

    Route::get('/solicitudes/crear', function () {
        return view('solicitudes.create');
    })->name('solicitudes.create');
    
    // Perfil Académico (Vista legacy o alternativa)
    Route::get('/perfil/academico', function () {
        return view('academicos.index');
    })->name('perfil.academico');

    // Descarga de PDF
    Route::get('/comprobante/{id}', function($id) {
        $solicitud = SolicitudServicio::with(['departamento', 'edificio', 'cuenta'])
            ->where('id', $id)
            ->firstOrFail(); 
        
        $pdf = Pdf::loadView('pdf.comprobante', compact('solicitud'));
        
        return $pdf->download('comprobante-solicitud-' . str_pad($id, 6, '0', STR_PAD_LEFT) . '.pdf');
        
    })->name('comprobante.descargar');
});


// --- RUTAS PARA ADMINISTRADOR ---
Route::middleware(['auth', 'verified', 'role:administrador'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {

    // Dashboard Admin
    Route::get('/solicitudes', [AdminSolicitudController::class, 'index'])
         ->name('solicitudes.index');
         
    // Actualizar estado
    Route::patch('/solicitud/{solicitud}/actualizar-estado', [AdminSolicitudController::class, 'updateStatus'])
         ->name('solicitud.updateStatus');

         // Ruta de Usuarios
Route::get('/usuarios', function () {
    return view('admin.usuarios.index');
})->name('usuarios.index');
});


// --- RUTA PÚBLICA (Accesible sin login) ---
Route::get('/investigador/{id}', [InvestigadorController::class, 'show'])
    ->name('investigador.publico');

// Test de Roles
Route::get('/test-roles', function() {
    $user = Auth::user();
    return [
        'user_id' => $user->id,
        'name' => $user->nombre,
        'email' => $user->email,
        'roles' => $user->getRoleNames(),
        'is_admin' => $user->hasRole('administrador'), // Ojo: verifica si tu rol es 'admin' o 'administrador' en BD
        'permissions' => $user->getAllPermissions()->pluck('name')
    ];
})->middleware('auth');