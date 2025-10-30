<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/solicitudes', function () {
    return view('solicitudes');
})->middleware(['auth'])->name('solicitudes');



Route::get('/comprobante/{id}', function($id) {
    // Cargar la solicitud con sus relaciones
    $solicitud = \App\Models\SolicitudServicio::with(['departamento', 'edificio', 'cuenta'])
        ->findOrFail($id);
    
    // Generar el PDF
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.comprobante', compact('solicitud'));
    
    // Descargar el PDF
    return $pdf->download('comprobante-solicitud-' . str_pad($id, 6, '0', STR_PAD_LEFT) . '.pdf');
    
})->name('comprobante.descargar');