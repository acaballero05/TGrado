<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Filesystem\Filesystem;

use App\Http\Requests;

use App\Paciente;

use App\Configuracion;

use App\Juego;

use App\Jconfigurado;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=Paciente::All();
        $juegos=Juego::All();
        $configuraciones=Configuracion::All();
        return view('welcome',['pacientes'=>$pacientes,'juegos'=>$juegos,'configuraciones'=>$configuraciones]);
        //
    }

    
    public function login()
    {
        //
        return view('login');
    }

    public function store(Request $request,Filesystem $filesystem)
    {
        $user=$request['username'];
        $pacientes=Paciente::All();
        $juegos=Juego::All();
        $configuraciones=Configuracion::All();
        $juegosAsig = array();
        foreach ($pacientes as $paciente) {
            if ($paciente->username==$user) {
                $filesystem->deleteDirectory("users/".$user);
                mkdir("users/".$user);
                foreach ($configuraciones as $configuracion) {
                    foreach ($juegos as $juego) {
                        if ($juego->id==$configuracion->id_juego and $configuracion->id_paciente==$paciente->id and $configuracion->disponible==1) {
                            array_push($juegosAsig,$configuracion);
                            if (!file_exists("users/".$user."/".$configuracion->id_conf)) {
                                
                                mkdir("users/".$user."/".$configuracion->id_conf);
                                mkdir("users/".$user."/".$configuracion->id_conf."/".$juego->id);
                            }
                            
                            $filesystem->copyDirectory("Juegos/".$configuracion->id_juego,"users/".$user."/".$configuracion->id_conf."/".$configuracion->id_juego);
                            $confi=Jconfigurado::where('id','=',$configuracion->id_conf)->first();
                            $myfile = fopen("users/".$user."/".$configuracion->id_conf."/".$juego->id."/datos.txt", "w");
                            if ($confi->instruccion=="texto") {
                                $instruccion="0;";
                            }
                            elseif ($confi->instruccion=="ideografica") {
                                $instruccion="1;";
                            }
                            elseif ($confi->instruccion=="audio") {
                                $instruccion="2;";
                            }

                            if ($confi->dificultad==35) {
                                $instruccion="0;";
                            }
                            elseif ($confi->dificultad==36) {
                                $instruccion="1;";
                            }
                            elseif ($confi->dificultad==37) {
                                $instruccion="2;";
                            }

                            if ($confi->dificultad==35) {
                                $dificultad="0;";
                            }
                            elseif ($confi->dificultad==36) {
                                $dificultad="1;";
                            }
                            elseif ($confi->dificultad==37) {
                                $dificultad="2;";
                            }

                            if ($confi->distractores==38) {
                                $distractores="0;";
                            }
                            elseif ($confi->distractores==39) {
                                $distractores="1;";
                            }
                            elseif ($confi->distractores==40) {
                                $distractores="2;";
                            }
                            elseif ($confi->distractores==41) {
                                $distractores="3;";
                            }

                            if ($confi->categoria==16) {
                                $categoria="0;";
                            }
                            elseif ($confi->categoria==17) {
                                $categoria="1;";
                            }
                            elseif ($confi->categoria==18) {
                                $categoria="2;";
                            }
                            elseif ($confi->categoria==19) {
                                $categoria="3;";
                            }
                            elseif ($confi->categoria==20) {
                                $categoria="4;";
                            }

                            $data=$categoria.PHP_EOL.$instruccion.PHP_EOL.$dificultad.PHP_EOL.$confi->sonido.";".PHP_EOL .$distractores;
                            fwrite($myfile,$data);
                            fclose($myfile);
                            Configuracion::where('id','=',$configuracion->id)->update(['juegado' => 1]);
                        }
                    }
                }            
            }
        }

        return view('welcome',['pacientes'=>$pacientes,'juegos'=>$juegosAsig,'juegosNom'=>$juegos,'user'=>$user]);

        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
