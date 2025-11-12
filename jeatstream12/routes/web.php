<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Admin\SolicitudController as AdminSolicitudController;

// Modelos y Facades para la ruta del PDF
use App\Models\SolicitudServicio;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

// --- RUTAS DE JETSTREAM/AUTH (Dashboard principal) ---
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// --- RUTAS PARA USUARIO COMÚN (Logueado y Verificado) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. MUESTRA la vista de "Mis Solicitudes" y el formulario para crear
    // Esta vista (solicitudes.blade.php) debe tener <@livewire('solicitud-form') />
    Route::get('/solicitudes', function () {
        return view('solicitudes');
    })->name('solicitudes.index');
    

    // 3. DESCARGA el PDF (Movido aquí por seguridad)
    Route::get('/comprobante/{id}', function($id) {
        // Validar que el usuario es dueño de la solicitud
        $solicitud = SolicitudServicio::with(['departamento', 'edificio', 'cuenta'])
            ->where('id', $id)
            // ->where('responsable_id', auth()->id()) // Descomenta esto para MÁXIMA seguridad
            ->firstOrFail(); // Error 404 si no la encuentra
        
        $pdf = Pdf::loadView('pdf.comprobante', compact('solicitud'));
        
        return $pdf->download('comprobante-solicitud-' . str_pad($id, 6, '0', STR_PAD_LEFT) . '.pdf');
        
    })->name('comprobante.descargar');
});


// --- RUTAS PARA ADMINISTRADOR ---
Route::middleware(['auth', 'verified', 'role:admin']) // <-- ¡LA MAGIA DE SPATIE!
     ->prefix('admin') // <-- Todas las URLs inician con /admin/...
     ->name('admin.')   // <-- Todos los nombres de ruta inician con admin....
     ->group(function () {

    // 1. MUESTRA el dashboard de Admin con TODAS las solicitudes
    // URL: /admin/solicitudes
    // Nombre de Ruta: admin.solicitudes.index
    Route::get('/solicitudes', [AdminSolicitudController::class, 'index'])
         ->name('solicitudes.index');
         
    // 2. ACTUALIZA el estado de una solicitud
    // URL: /admin/solicitud/5/actualizar-estado
    // Nombre de Ruta: admin.solicitud.updateStatus
    Route::patch('/solicitud/{solicitud}/actualizar-estado', [AdminSolicitudController::class, 'updateStatus'])
         ->name('solicitud.updateStatus');
         
    // (Aquí puedes agregar más rutas de admin, ej: gestión de usuarios)
    // Route::resource('/usuarios', AdminUsuarioController::class);
});


// En routes/web.php
Route::get('/test-roles', function() {
    $user = Auth::user();
    return [
        'user_id' => $user->id,
        'name' => $user->nombre,
        'email' => $user->email,
        'roles' => $user->getRoleNames(),
        'is_admin' => $user->hasRole('admin'),
        'permissions' => $user->getAllPermissions()->pluck('name')
    ];
})->middleware('auth');