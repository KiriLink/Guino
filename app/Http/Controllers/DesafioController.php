<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;
use App\Models\Registro_pregunta;
use Illuminate\Support\Facades\Auth;

class DesafioController extends Controller
{
    public function desafio()
    {
        $preguntas = preguntas::join('categoria_preguntas', 'preguntas.fk_categoria', '=', 'categoria_preguntas.id_categoria_preguntas')
            ->where('preguntas.estado', 1)
            ->get(['preguntas.*', 'categoria_preguntas.categoria']);

        $preguntasChunks = $preguntas->chunk(3);

        $id_usuario = Auth::id();

        $preguntasCount = preguntas::join('categoria_preguntas', 'preguntas.fk_categoria', '=', 'categoria_preguntas.id_categoria_preguntas')
            ->join('registro_preguntas', function ($join) use ($id_usuario) {
                $join->on('preguntas.id_preguntas', '=', 'registro_preguntas.fk_pregunta')
                    ->where('registro_preguntas.fk_usuario', '=', $id_usuario)
                    ->where('registro_preguntas.desafio', '=', 1)
                    ->where('preguntas.estado', '=', 1);
            })
            ->get(['preguntas.*', 'categoria_preguntas.area', 'categoria_preguntas.categoria'])
            ->count();

        // Calcula el nivel actual basándote en cada 3 preguntas contestadas
        $nivelActual = (ceil($preguntasCount / 3)) + 1;

        return view('desafio', compact('preguntas', 'preguntasChunks', 'preguntasCount', 'nivelActual'));
    }


    public function entrar_desafio()
    {
        return view('quiz_desafio');
    }

    public function obtener_pregunta_desafio()
    {

        $id_usuario = Auth::id();

        $preguntas = preguntas::join('categoria_preguntas', 'preguntas.fk_categoria', '=', 'categoria_preguntas.id_categoria_preguntas')
            ->leftJoin('registro_preguntas', function ($join) use ($id_usuario) {
                $join->on('preguntas.id_preguntas', '=', 'registro_preguntas.fk_pregunta')
                    ->where('registro_preguntas.fk_usuario', '=', $id_usuario)
                    ->where('registro_preguntas.desafio', '=', 1);
            })
            ->where('preguntas.estado', 1)
            ->whereNull('registro_preguntas.id_registro_preguntas')
            ->inRandomOrder()
            ->limit(3)
            ->get(['preguntas.*', 'categoria_preguntas.area', 'categoria_preguntas.categoria']);

        return response()->json($preguntas);
    }

    public function registrar_respuesta_desafio(Request $request)
    {
        $respuestas = $request->input('respuestas');
        $desafio = 1; // Valor predeterminado

        foreach ($respuestas as $respuesta) {
            $preguntaId = $respuesta['preguntaId'];
            $opcionSeleccionada = $respuesta['respuesta'];

            $registro = new registro_pregunta;
            $registro->fk_usuario = auth()->user()->id;
            $registro->fk_pregunta = $preguntaId;
            $registro->respuesta = $opcionSeleccionada;
            $registro->estado = 1;


            // Verificar si la respuesta es diferente de 1
            if ($opcionSeleccionada != 1) {
                // Cambiar el valor de desafio a 2
                $desafio = 2;
            }
            $registro->desafio = $desafio;
            $registro->save();
        }

        return response()->json(['mensaje' => 'Respuestas guardadas con éxito']);
    }
}
