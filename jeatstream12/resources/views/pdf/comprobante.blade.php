<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Solicitud #{{ $solicitud->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
            font-size: 24px;
        }
        .folio {
            background-color: #dbeafe;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #f3f4f6;
            padding: 8px 10px;
            font-weight: bold;
            font-size: 14px;
            color: #1f2937;
            margin-bottom: 10px;
            border-left: 4px solid #2563eb;
        }
        .field {
            margin-bottom: 8px;
            padding-left: 10px;
        }
        .field-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
            color: #4b5563;
        }
        .field-value {
            display: inline-block;
            color: #111827;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #d1d5db;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
        }
        .grid {
            display: table;
            width: 100%;
        }
        .grid-row {
            display: table-row;
        }
        .grid-cell {
            display: table-cell;
            width: 50%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <div class="header">
        <h1>COMPROBANTE DE SOLICITUD DE SERVICIO</h1>
        <p style="margin: 5px 0;">{{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <!-- Folio -->
    <div class="folio">
        FOLIO: #{{ str_pad($solicitud->id, 6, '0', STR_PAD_LEFT) }}
    </div>

    <!-- Sección 1: Información del Usuario -->
    <div class="section">
        <div class="section-title">INFORMACIÓN DEL USUARIO</div>
        <div class="field">
            <span class="field-label">Responsable:</span>
            <span class="field-value">{{ $solicitud->responsable }}</span>
        </div>
        <div class="field">
            <span class="field-label">Solicitante:</span>
            <span class="field-value">{{ $solicitud->solicitante }}</span>
        </div>
        <div class="field">
            <span class="field-label">Departamento:</span>
            <span class="field-value">{{ $solicitud->departamento->nombre ?? 'N/A' }}</span>
        </div>
        <div class="field">
            <span class="field-label">Edificio:</span>
            <span class="field-value">{{ $solicitud->edificio->nombre ?? 'N/A' }}</span>
        </div>
        @if($solicitud->laboratorio)
        <div class="field">
            <span class="field-label">Laboratorio:</span>
            <span class="field-value">{{ $solicitud->laboratorio }}</span>
        </div>
        @endif
        <div class="field">
            <span class="field-label">Con cargo a:</span>
            <span class="field-value">{{ $solicitud->cuenta->tipo ?? 'N/A' }} - {{ $solicitud->cuenta->numero ?? '' }}</span>
        </div>
    </div>

    <!-- Sección 2: Tipo de Servicio -->
    <div class="section">
        <div class="section-title">TIPO DE SERVICIO</div>
        <div class="field">
            <span class="field-value">
                {{ is_array($solicitud->tipo_servicio) ? implode(', ', $solicitud->tipo_servicio) : $solicitud->tipo_servicio }}
            </span>
        </div>
    </div>

    <!-- Sección 3: Descripción del Servicio -->
    <div class="section">
        <div class="section-title">DESCRIPCIÓN DEL TRABAJO/FALLA APARENTE</div>
        <div class="field">
            <span class="field-value">{{ $solicitud->trabajoAFallarAparente }}</span>
        </div>
    </div>

    <!-- Sección 4: Información del Equipo -->
    <div class="section">
        <div class="section-title">INFORMACIÓN DEL EQUIPO</div>
        <div class="grid">
            <div class="grid-row">
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">Tipo de Equipo:</span>
                        <span class="field-value">{{ $solicitud->tipoEquipo ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">Marca:</span>
                        <span class="field-value">{{ $solicitud->marca ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
            <div class="grid-row">
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">Modelo:</span>
                        <span class="field-value">{{ $solicitud->modelo ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">Clasificación:</span>
                        <span class="field-value">{{ $solicitud->clasificacion ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
            <div class="grid-row">
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">No. Serie:</span>
                        <span class="field-value">{{ $solicitud->noSerie ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">No. Inventario:</span>
                        <span class="field-value">{{ $solicitud->noInventario ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
            <div class="grid-row">
                <div class="grid-cell">
                    <div class="field">
                        <span class="field-label">Cantidad:</span>
                        <span class="field-value">{{ $solicitud->cantidad }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Este documento es un comprobante de solicitud de servicio.</p>
        <p>Generado automáticamente el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i') }}</p>
    </div>
</body>
</html>