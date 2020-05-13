<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Percentage;
use App\Models\Type;
use App\Models\Task;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;

class PorcentajesController extends Controller
{
    public function index($id = null)
    {
        if ($id != null) {
            $percentages = Percentage::all()->where('evaluation_id', $id);
        } else {
            $percentages = Percentage::all();
        }

        $users = User::all()->where('role_id', '=', 4);
        $subjects = Subject::all();

        return view('Notas.porcentajes', compact('users', 'subjects', 'percentages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $subject = Subject::find($id);
        $evaluaciones = $subject->evaluations()->orderBy('name', 'asc')->get();

        $types = Type::all()->where('model', Task::class);

        return view('Notas.crearPorcentaje', compact('evaluaciones', 'types', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'porcentaje' => 'required',
            'evaluaciones' => 'required',
            'type' => 'required',
            'nota_min_tarea' => 'required',
            'nota_media_tarea' => 'required',
            'nota_media_minima' => 'required',
            'subject' => 'required'
        ]);

        $evaluaciones = $request->get('evaluaciones');

        foreach ($evaluaciones as $eval) {
            $evaluacion = Evaluation::find($eval);
            $evaluacion->types()->attach(intval($request->get('type')), [
                'percentage' => $request->get('porcentaje'),
                'nota_min_tarea' => $request->get('nota_min_tarea'),
                'nota_media_tarea' => $request->get('nota_media_tarea'),
                'nota_media_minima' => $request->get('nota_media_minima'),
            ]);
        }

        return redirect('asignaturas/' . $request->get('subject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subject_id, $evaluation_id, $type_id)
    {
        $subject = Subject::find($subject_id);
        $evaluaciones = $subject->evaluations()->orderBy('name', 'asc')->get();
        $eval = Evaluation::find($evaluation_id);
        $porcentaje = Percentage::where('evaluation_id', $evaluation_id)->where('type_id', $type_id)->first();
        $porcentajes = $eval->types;
        $types = Type::all()->where('model', Task::class);

        $sumaPorcentajes = 0;
        $resto = 0;


        foreach ($porcentajes as $por) {
            if ($por->name != 'Recuperacion') {
                $sumaPorcentajes += $por->pivot->percentage;
            }
        }

        if ($sumaPorcentajes < 100) {
            $resto =  (100 - $sumaPorcentajes) + $porcentaje->percentage;
        }

        return view('Notas.editPorcentaje', compact('porcentaje', 'evaluaciones', 'types', 'subject', 'resto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'porcentajes' => 'required',
            'subject' => 'required'
        ]);

        $porcentajes = $request->get('porcentajes');
        $comprobacionPorcentajes = $this->comprobacion($porcentajes);

        if ($comprobacionPorcentajes == true) {
            foreach ($porcentajes as $eval_id => $types) {
                foreach ($types as $type_id => $values) {
                    $evaluacion = Evaluation::find($eval_id);
                    if ($type_id == 4) {
                        $evaluacion->types()->updateExistingPivot(intval($type_id), [
                            'nota_min_tarea' => $values['nota_min_tarea'],
                            'nota_media_tarea' => $values['nota_media_tarea'],
                            'nota_media_minima' => $values['nota_media_minima']
                        ]);
                    } else {
                        $evaluacion->types()->updateExistingPivot(intval($type_id), [
                            'percentage' => $values['porcentaje'],
                            'nota_min_tarea' => $values['nota_min_tarea'],
                            'nota_media_tarea' => $values['nota_media_tarea'],
                            'nota_media_minima' => $values['nota_media_minima']
                        ]);
                    }
                }
            }

            return redirect('asignaturas/' . $request->get('subject'));
        } else {
            return redirect('asignaturas/' . $request->get('subject'))->with('error', 'Los porcentajes han superado el 100%');
        }
    }

    public function comprobacion($porcentajes)
    {
        $sumaEval1 = 0;
        $sumaEval2 = 0;
        $sumaEval3 = 0;

        foreach ($porcentajes as $eval_id => $types) {
            foreach ($types as $type_id => $values) {
                if ($type_id == 4) {
                    break;
                }
                if ($type_id != 4 && $eval_id == 1) {
                    $sumaEval1 += $values['porcentaje'];
                } else if ($type_id != 4 && $eval_id == 2) {
                    $sumaEval2 += $values['porcentaje'];
                } else {
                    $sumaEval3 += $values['porcentaje'];
                }
            }
        }

        if ($sumaEval1 <= 100 && $sumaEval2 <= 100 && $sumaEval3 <= 100) {
            $comprobacion = true;
        } else {
            $comprobacion = false;
        }

        return $comprobacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject_id, $evaluation_id, $type_id)
    {

        $evaluacion = Evaluation::find($evaluation_id);
        $evaluacion->types()->detach(intval($type_id));

        return redirect('asignaturas/' . $subject_id);
    }
}
