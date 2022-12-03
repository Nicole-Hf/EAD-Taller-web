<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Edad;
use App\Models\Evaluacion;
use App\Models\Pregunta;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluacionController extends Controller
{
    public function createTest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fecha' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'edadMeses' => 'required',
            'total' => 'required',
            'personalId' => 'required',
            'infanteId' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        //$userId = auth()->user()->id;
        //$personalId = Personal::where('userId', $userId)->first();
        $evaluacion = new Evaluacion();
        $evaluacion->fecha = $request->fecha;
        $evaluacion->peso = $request->peso;
        $evaluacion->altura = $request->altura;
        $evaluacion->edadMeses = $request->edadMeses;
        //$evaluacion->personalId = $personalId;
        $evaluacion->personalId = $request->personalId;
        $evaluacion->infanteId = $request->infanteId;
        $evaluacion->save();

        return response([
            'evaluacion' => $evaluacion,
            'message' => "Evaluación creada exitosamente"
        ], 200);
    }

    public function getItems($evaluacionId, $areaId)
    {
        $evaluacion = Evaluacion::findOrFail($evaluacionId);
        $area = Area::findOrFail($areaId);
        $edades = Edad::all();

        foreach ($edades as $edad) {
            if ($edad->rangoInicial >= $evaluacion->edadMeses && $edad->rangoFinal <= $evaluacion->edadMeses)
                $edadId = $edad->id;
        }

        //$preguntas = Pregunta::where(['areaId' => $area->id, 'edadId' => $edadId])->get();
        $preguntas = Pregunta::where(['areaId' => $area->id])->get();

        return response([
            'preguntas' => $preguntas,
        ], 200);
    }

    public function getResultado(Request $request, $preguntaId, $areaId, $testId)
    {
        $pregunta = Pregunta::where('id', $preguntaId)->first();

        $resultado = new Resultado();
        $resultado->total = $pregunta->item;
        $resultado->evaluacionId = $request->evaluacionId;
        $resultado->areaId = $request->areaId;
        $resultado->save();

        return response([
            'resultado' => $resultado,
        ], 200);
    }
}
