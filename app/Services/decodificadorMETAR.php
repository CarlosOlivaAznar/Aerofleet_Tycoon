<?php

namespace App\Services;

/**
 * Servicio que se emplea para decodificar el METAR y obtener los datos formateados
 * Es importante porque los reportes METAR suelen tener diferentes formatos segun la informacion que presenta
 * en este servicio se maneja ese tipo de datos y se formatea para que sea mas facil de manejar los datos
 */

class decodificadorMETAR
{
    private $patterns = [
        'station' => '/^METAR\s([A-Z]{4})\s/',
        'date' => '/(\d{2})(\d{2})(\d{2})Z/',
        'wind' => '/(VRB|\d{3})(\d{2})G?(\d{2})?KT/',
        'visibility' => '/\s(\d{4})\s?SM|\s(\d{4})\s?M?\s/',
        'weather' => '/(RA|SN|FG|HZ|TS|SH|BR|DR|GR|GS|UP|BL|CAVOK)/',
        'temperature' => '/(\d{2})\/(\d{2})/',
        'pressure' => '/Q(\d{4})/',
        'clouds' => '/(BKN|OVC|SCT|FEW)(\d{3})(TCU|CB|AC)?/',
    ];

    public function decode($metar)
    {
        $decoded = [];

        // CODIGO ICAO
        if (preg_match($this->patterns['station'], $metar, $matches)) {
            $decoded['station'] = $matches[1];
        }

        // FECHA Y HORA
        if (preg_match($this->patterns['date'], $metar, $matches)) {
            $decoded['date'] = [
                'day' => $matches[1],
                'hour' => $matches[2],
                'minute' => $matches[3]
            ];
        }

        // VIENTOS
        if (preg_match($this->patterns['wind'], $metar, $matches)) {
            if ($matches[1] === 'VRB') {
                $decoded['wind'] = [
                    'direction' => 'Variable',
                    'speed' => $matches[2],
                    'gusts' => isset($matches[3]) ? $matches[3] : null
                ];
            } else {
                $decoded['wind'] = [
                    'direction' => $matches[1],
                    'speed' => $matches[2],
                    'gusts' => isset($matches[3]) ? $matches[3] : null
                ];
            }
        }

        // VISIBILIDAD
        if (preg_match($this->patterns['visibility'], $metar, $matches)) {
            if (isset($matches[1]) && $matches[1] == "9999") {
                $decoded['visibility'] = "9999";
            } else {
                $decoded['visibility'] = $matches[2] ?? $matches[1];
            }
        }

        // METEREOLOGIA
        if (preg_match($this->patterns['weather'], $metar, $matches)) {
            $decoded['weather'] = $matches[1];
        }

        // TEMPERATURA Y PUNTO DE ROCIO
        if (preg_match($this->patterns['temperature'], $metar, $matches)) {
            $decoded['temperature'] = $matches[1];
            $decoded['dewpoint'] = $matches[2];
        }

        // PRESION ATMOSFERICA
        if (preg_match($this->patterns['pressure'], $metar, $matches)) {
            $decoded['pressure'] = $matches[1];
        }

        // CAPAS DE NUBES
        if (preg_match_all($this->patterns['clouds'], $metar, $matches)) {
            $clouds = [];
            for ($i = 0; $i < count($matches[0]); $i++) {
                $clouds[] = [
                    'coverage' => $matches[1][$i],
                    'height' => $matches[2][$i],
                    'type' => isset($matches[3][$i]) ? $matches[3][$i] : null
                ];
            }
            $decoded['clouds'] = $clouds;
        }

        return $decoded;
    }
}
