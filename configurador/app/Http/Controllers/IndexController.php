<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Taxonomia;

use App\Juego;

use App\Caracteristica;

use App\Paciente;

use App\Configuracion;

use App\Relacion;

use App\JConfigurado;



class IndexController extends Controller
{
    public function index()
    {
    	$relaciones=Relacion::All();
        $caracteristicas=Caracteristica::All();
        $taxonomias=Taxonomia::All();
        $juegos=Juego::All();
        $pacientes=Paciente::All();
        return view('welcome',['caracteristicas'=>$caracteristicas,'taxonomias'=>$taxonomias,'juegos'=>$juegos, 'pacientes'=>$pacientes, 'relaciones'=>$relaciones]);
    } 

    public function administrar()
    {
        $pacientes=Paciente::All();
        $juegos=Juego::All();
        $configuraciones=Configuracion::All();
        $configurados=JConfigurado::All();
        return view('admin',['pacientes'=>$pacientes,'juegos'=>$juegos,'configuraciones'=>$configuraciones,'configurados'=>$configurados]);
    }

    public function juegos()
    {
        $juegos=Juego::All();
        $relaciones=Relacion::All();
        $caracteristicas=Caracteristica::All();
        return view('listajuego',['caracteristicas'=>$caracteristicas,'juegos'=>$juegos, 'relaciones'=>$relaciones]);
    }

    public function store(Request $request)
    {
    	
    	$N = count($request['juego']);



    	for($i=0; $i < $N; $i++)
	    {
            $id_jconf=JConfigurado::insertGetId([
                'genero' => $request['genero'],
                'categoria' => $request['categoria'],
                'verbo' => $request['verbo'],
                'adjetivo' => $request['adjetivo'],
                'sonido' => $request[$request['juego'][$i].'sonido'],
                'instruccion' => $request[$request['juego'][$i].'instruccion'],
                'dificultad' => $request[$request['juego'][$i].'dificultad'],
                'distractores' => $request[$request['juego'][$i].'distractores']
                ]);
            
            
            Configuracion::insert([
                'id_paciente' => $request['username'],
                'id_juego' => $request['juego'][$i],
                'id_conf' => $id_jconf,
                'fecha' => date("Y/m/d"),
                'orden' => 1,
                'juegado' => 0,
                'disponible' => 1]);
            	    	
	    }
        return $this->index();

        //return $request['name']." ".$request['email']." ".$request['password'];
    }

    public function update($id)
    {
        $confi=Configuracion::where('id','=',$id)->first();
        if ($confi->disponible==1) {
            Configuracion::where('id','=',$id)->update(['disponible' => 0]);
        }
        else{
            Configuracion::where('id','=',$id)->update(['disponible' => 1]);
        }
        return $this->administrar();
    }

}
