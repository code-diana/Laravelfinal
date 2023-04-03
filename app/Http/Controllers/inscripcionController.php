<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Runner;
use Illuminate\Support\Facades\DB;
use PDF;

class inscripcionController extends Controller
{
    //
    function inscribir(Request $request){
        // echo $request->nombre;
        // echo $request->apellido;
        // echo $request->fecha;

        if (isset($_POST['pagar'])){
            if (request('option')=='si'){
                $dorsal=random_int(1,300);
                $aseguradora=$request->aseguradora;
                if ($request->pro==1){
                    $aseguradora=NULL;
                }
                Inscription::create([
                    'runner_id'=>$request->runner,
                    'race_id'=>$request->id,
                    'id_insurances'=>$aseguradora,
                    'dorsal'=> $dorsal,
                    'PayPal_email'=>'',
                    'finish_time'=>NULL
                ]);

                return redirect()->route('paypal');
            }
            else{
                $ins=Inscription::where('runner_id',$request->runner)->delete();
                $runner=Runner::find($request->runner)->delete();
                //se borra tanto de corredor como de inscripcion
                return redirect('/');
            }
        }
        else{

            return view('corredor.pago',[
                'runner' => $request->runner,
                'race' => $request->id,
                'insurance' => $request->aseguradora,
                'pro' => $request->pro
            ]);
        }
    }

    public function facturaCorredor(){
        // $id_runner = $request->id;
        // if(isset($_POST)){
        //     $id_runner = $_POST['id_runner'];
        //     echo $id_runner;
        // }
        // echo $id_runner;
        //Informacion de carrera y corredor
        $results = DB::table('inscriptions')
                ->join('races', 'races.id', '=', 'inscriptions.race_id')
                ->join('runners', 'runners.id', '=', 'inscriptions.runner_id')
                ->select('races.*', 'inscriptions.*', 'runners.*')
                ->where('inscriptions.runner_id', '=', 6)
                ->get();

        view()->share('factura.pdf',$results);

        $pdf = PDF::loadView('corredor.pdfInfoCorredor', ['results' => $results]);

        return $pdf->download('factura.pdf');
    }

    public function showRunners(Request $request){
        $id = $request->id;
        if(isset($_POST['buscador'])){
            $buscador = $request->input('buscador');
            $runners = DB::table('inscriptions')
            ->join('runners', 'inscriptions.runner_id', '=', 'runners.id')
            ->select('inscriptions.*', 'runners.*')
            ->where('inscriptions.race_id', '=', $id)
            ->where(function($query) use ($buscador){
                $query->where('runners.name', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.last_name', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.sex', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.adress', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.points', 'LIKE', '%'.$buscador.'%');
            })
            ->get();
        }
        else{
            //Juntar las tablas runners , carrera y inscription
            $runners = DB::table('inscriptions')
            ->join('runners', 'inscriptions.runner_id', '=', 'runners.id')
            ->select('inscriptions.*', 'runners.*')
            ->where('inscriptions.race_id', '=', $id)
            ->get();
        }
        return view('admin.inscripciones.runnersRace' ,[
            'runners' => $runners , 'id' => $id
        ]);
    }

    public function downloadPdf(){
        if(isset($_POST)){
            echo $_POST['id_runner'];
        }
        $inscription = Inscription::all();

        view()->share('users.pdf',$inscription);

        $pdf = PDF::loadView('admin.inscripciones.generatePDF', ['inscription' => $inscription]);

        return $pdf->download('inscripciones.pdf');
    }
}

?>