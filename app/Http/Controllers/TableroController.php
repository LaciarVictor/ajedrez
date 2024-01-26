<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableroRequest;
use App\Services\Casillero;
use Illuminate\Http\JsonResponse;

/**
 * Crea una matriz de casilleros para el tablero de ajedrez con los colores correspondientes.
 * Devuelve el tablero de ajedrez en formato json.
 */
class TableroController extends Controller
{
    public function generarTablero(TableroRequest $request): JsonResponse
    {

        $totalFilas = $request->totalFilas;
        

        return response()->json($this->crearTablero($totalFilas));
    }





    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 1,1 | 1,2 | 1,3 | 1,4 | 1,5 | 1,6 | 1,7 | 1,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 2,1 | 2,2 | 2,3 | 2,4 | 2,5 | 2,6 | 2,7 | 2,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 3,1 | 3,2 | 3,3 | 3,4 | 3,5 | 3,6 | 3,7 | 3,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 4,1 | 4,2 | 4,3 | 4,4 | 4,5 | 4,6 | 4,7 | 4,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 5,1 | 5,2 | 5,3 | 5,4 | 5,5 | 5,6 | 5,7 | 5,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 6,1 | 6,2 | 6,3 | 6,4 | 6,5 | 6,6 | 6,7 | 6,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 7,1 | 7,2 | 7,3 | 7,4 | 7,5 | 7,6 | 7,7 | 7,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+
    // | 8,1 | 8,2 | 8,3 | 8,4 | 8,5 | 8,6 | 8,7 | 8,8 |
    // +-----+-----+-----+-----+-----+-----+-----+-----+

    private function crearTablero($totalFilas): array
    {
        $respuesta = [];

        //iterar en cada fila
        for ($fila = 1; $fila <= $totalFilas; $fila++) {
            //es un cuadrado, totalFilas = totalColumnas, iterar en cada columna.
            for ($columna = 1; $columna <= $totalFilas; $columna++) {

                //Sumando x+y obtenemos un número que puede ser par o impar.
                //Si es par, el casillero es oscuro, si es impar, el casillero es claro.
                $color = ($fila + $columna) % 2 === 0 ? 'oscuro' : 'claro';
                $respuesta[] = [
                    'x' => $fila,
                    'y' => $columna,
                    'color' => $color,
                ];
            }
        }

        return $respuesta;
    }
}
