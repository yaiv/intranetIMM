<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Solicitud #{{ $solicitud->id }}</title>
    <style>
        @page {
            margin: 15mm;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #000;
            margin: 0;
            padding: 0;
        }
        
        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 3px solid #003d7a;
            padding-bottom: 10px;
        }
        
        .header-left {
            display: table-cell;
            width: 80px;
            vertical-align: middle;
        }
        
        .header-center {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding: 0 15px;
        }
        
        .header-right {
            display: table-cell;
            width: 180px;
            vertical-align: middle;
            text-align: right;
        }
        
        .logo {
            width: 70px;
            height: auto;
        }
        
        .institution-name {
            font-size: 13px;
            font-weight: bold;
            color: #003d7a;
            margin: 0;
            line-height: 1.3;
            text-transform: uppercase;
        }
        
        .department-name {
            font-size: 11px;
            font-weight: bold;
            color: #003d7a;
            margin: 3px 0 0 0;
            text-transform: uppercase;
        }
        
        .info-box {
            background-color: #f5f5f5;
            border: 1px solid #003d7a;
            padding: 8px 12px;
            font-size: 10px;
            line-height: 1.8;
        }
        
        .info-box-row {
            margin-bottom: 3px;
        }
        
        .info-box-label {
            font-weight: bold;
            display: inline;
            margin-right: 5px;
        }
        
        .info-box-value {
            display: inline;
        }
        
        .top-info {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        
        .top-info-left {
            display: table-cell;
            width: 60%;
            vertical-align: top;
            padding-right: 10px;
        }
        
        .top-info-right {
            display: table-cell;
            width: 40%;
            vertical-align: top;
        }
        
        .field-row {
            margin-bottom: 8px;
        }
        
        .field-label {
            font-weight: bold;
            display: inline-block;
            min-width: 140px;
        }
        
        .field-value {
            display: inline;
        }
        
        .section-title {
            background-color: #003d7a;
            color: white;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 11px;
            margin: 15px 0 10px 0;
            text-transform: uppercase;
        }
        
        .equipment-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }
        
        .equipment-row {
            display: table-row;
        }
        
        .equipment-cell {
            display: table-cell;
            width: 50%;
            padding: 5px 10px 5px 0;
        }
        
        .description-box {
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 60px;
            background-color: #fafafa;
        }
        
        .signature-section {
            display: table;
            width: 100%;
            margin-top: 40px;
            page-break-inside: avoid;
        }
        
        .signature-cell {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            vertical-align: bottom;
            padding: 0 10px;
        }
        
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 5px;
            font-size: 10px;
        }
        
        .work-section {
            margin-top: 20px;
            page-break-inside: avoid;
        }
        
        .work-field {
            margin-bottom: 10px;
        }
        
        .work-field-label {
            font-weight: bold;
            display: inline-block;
            min-width: 160px;
        }
        
        .materials-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .materials-table th {
            background-color: #003d7a;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 10px;
            font-weight: bold;
        }
        
        .materials-table td {
            border: 1px solid #ccc;
            padding: 8px;
            min-height: 30px;
        }
        
        .materials-table tr {
            height: 40px;
        }
        
        .total-row {
            font-weight: bold;
            background-color: #f5f5f5;
        }
        
        .stamp-area {
            position: absolute;
            right: 50px;
            bottom: 150px;
            width: 150px;
            height: 150px;
            opacity: 0.3;
        }
    </style>
</head>
<body>
    <!-- Encabezado Institucional -->
    <div class="header">
        <div class="header-left">
            <!-- Logo UNAM - Puedes usar una imagen real o un placeholder -->
            <svg class="logo" viewBox="0 0 100 120" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="#003d7a"/>
                <text x="50" y="60" font-size="40" font-weight="bold" fill="white" text-anchor="middle">UNAM</text>
            </svg>
        </div>
        <div class="header-center">
            <p class="institution-name">
                Instituto de Investigaciones en Materiales<br>
                Secretaría Técnica
            </p>
            <p class="department-name">Área de Taller y Servicios</p>
        </div>
        <div class="header-right">
            <div class="info-box">
                <div class="info-box-row">
                    <span class="info-box-label">No. de Solicitud:</span>
                    <span class="info-box-value">{{ str_pad($solicitud->id, 3, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="info-box-row">
                    <span class="info-box-label">Tipo de Servicio:</span>
                    <span class="info-box-value">{{ is_array($solicitud->tipo_servicio) ? implode(', ', $solicitud->tipo_servicio) : $solicitud->tipo_servicio }}</span>
                </div>
                <div class="info-box-row">
                    <span class="info-box-label">Fecha:</span>
                    <span class="info-box-value">{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Información Principal -->
    <div class="top-info">
        <div class="top-info-left">
            <div class="field-row">
                <span class="field-label">Solicitante:</span>
                <span class="field-value">{{ $solicitud->solicitante }}</span>
            </div>
        </div>
        <div class="top-info-right">
            <div class="field-row">
                <span class="field-label">Responsable:</span>
                <span class="field-value">
                    @if(isset($solicitud->responsable))
                        {{ $solicitud->responsable->nombre ?? '' }} {{ $solicitud->responsable->apellido_paterno ?? '' }} {{ $solicitud->responsable->apellido_materno ?? '' }}
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="field-row">
                <span class="field-label">Departamento:</span>
                <span class="field-value">{{ $solicitud->departamento->nombre ?? 'N/A' }}</span>
            </div>
        </div></span>
            </div>
        </div>
    </div>

    <!-- Trabajo a Realizar -->
    <div class="section-title">Trabajo a Realizar / Falla Aparente</div>
    <div class="description-box" style="min-height: 80px;">
        {{ $solicitud->trabajoAFallarAparente }}
    </div>

    <!-- Información del Equipo -->
    @php
        $hasEquipmentInfo = $solicitud->tipoEquipo || $solicitud->marca || $solicitud->modelo || 
                           $solicitud->noSerie || $solicitud->noInventario || $solicitud->clasificacion;
    @endphp
    
    @if($hasEquipmentInfo)
    <div class="section-title">Información del Equipo</div>
    <div class="equipment-grid">
        @if($solicitud->tipoEquipo || $solicitud->modelo)
        <div class="equipment-row">
            @if($solicitud->tipoEquipo)
            <div class="equipment-cell">
                <span class="field-label">Tipo de Equipo:</span>
                <span class="field-value">{{ $solicitud->tipoEquipo }}</span>
            </div>
            @endif
            @if($solicitud->modelo)
            <div class="equipment-cell">
                <span class="field-label">Modelo:</span>
                <span class="field-value">{{ $solicitud->modelo }}</span>
            </div>
            @endif
        </div>
        @endif
        
        @if($solicitud->marca || $solicitud->noInventario)
        <div class="equipment-row">
            @if($solicitud->marca)
            <div class="equipment-cell">
                <span class="field-label">Marca:</span>
                <span class="field-value">{{ $solicitud->marca }}</span>
            </div>
            @endif
            @if($solicitud->noInventario)
            <div class="equipment-cell">
                <span class="field-label">No. Inventario:</span>
                <span class="field-value">{{ $solicitud->noInventario }}</span>
            </div>
            @endif
        </div>
        @endif
        
        @if($solicitud->noSerie || $solicitud->clasificacion)
        <div class="equipment-row">
            @if($solicitud->noSerie)
            <div class="equipment-cell">
                <span class="field-label">No. Serie:</span>
                <span class="field-value">{{ $solicitud->noSerie }}</span>
            </div>
            @endif
            @if($solicitud->clasificacion)
            <div class="equipment-cell">
                <span class="field-label">Clasificación:</span>
                <span class="field-value">{{ $solicitud->clasificacion }}</span>
            </div>
            @endif
        </div>
        @endif
        
        <div class="equipment-row">
            <div class="equipment-cell">
                <span class="field-label">Ubicación:</span>
                <span class="field-value">
                    {{ $solicitud->edificio->nombre ?? 'N/A' }}
                    @if($solicitud->laboratorio)
                     - {{ $solicitud->laboratorio }}
                    @endif
                </span>
            </div>
            <div class="equipment-cell">
                <span class="field-label">Cantidad:</span>
                <span class="field-value">{{ $solicitud->cantidad }}</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Firmas -->
    <div class="signature-section">
        <div class="signature-cell">
            <div class="signature-line">Firma del Solicitante</div>
        </div>
        <div class="signature-cell">
            <div class="signature-line">Firma de Supervisión</div>
        </div>
        <div class="signature-cell">
            <div class="signature-line">Firma de servicio concluido</div>
        </div>
    </div>

    <!-- Sección de Trabajo Realizado -->
    <div class="work-section">
        <div class="work-field">
            <span class="work-field-label">Trabajo realizado por:</span>
            <span style="border-bottom: 1px solid #000; display: inline-block; width: 400px;"></span>
        </div>
        <div class="work-field">
            <span class="work-field-label">Fecha de Conclusión:</span>
            <span style="border-bottom: 1px solid #000; display: inline-block; width: 200px;"></span>
        </div>
        <div class="work-field">
            <span class="work-field-label">Con Cargo a:</span>
            <span class="field-value">{{ $solicitud->cuenta->tipo ?? 'N/A' }} - {{ $solicitud->cuenta->numero ?? '' }}</span>
        </div>
        <div class="work-field">
            <span class="work-field-label">Observaciones:</span>
        </div>
        <div class="description-box" style="min-height: 40px;"></div>
    </div>

    <!-- Tabla de Materiales -->
    <div class="section-title">Material Utilizado</div>
    <table class="materials-table">
        <thead>
            <tr>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 60%;">Descripción del material</th>
                <th style="width: 25%;">Costo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total-row">
                <td colspan="2" style="text-align: right; padding-right: 10px;">Total:</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>