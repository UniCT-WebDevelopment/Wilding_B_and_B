<?php

namespace App\Http\Controllers;

use App\Reg_albergatore;
use App\Reg_cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class RegController extends Controller
{
    public function alb() {
        return view('reg_alb');
    }

    public function ins_alb(Request $request){
        //name=nuccio&surname=artino&email=email%40er.it&username=n&pass=1234&repeat-pass= //request
        //email,nome,cognome,password,cod_fiscale,contatto,estremi_pagamento database
        $albergatore= new Reg_albergatore;
        $albergatore->email=$request->email;
        $albergatore->nome=$request->name;
        $albergatore->cognome=$request->surname;
        $albergatore->password=$request->pass;
        $albergatore->cod_fiscale=$request->cf;
        $albergatore->contatto=$request->contatto;
        $albergatore->estremi_pagamento=$request->pagamento;
        $albergatore->save();

        return view('/login_success', ['user'=>'albergatore']);
    }
    public function cliente() {
        return view('reg_cli');
    }

    public function ins_cliente(Request $request){
        $cliente= new Reg_cliente;
        $cliente->email=$request->email;
        $cliente->nome=$request->name;
        $cliente->cognome=$request->surname;
        $cliente->password=$request->pass;
        $cliente->cod_fiscale=$request->cf;
        $cliente->contatto=$request->contatto;
        $cliente->ranking=0;
        $cliente->save();
        return view('/login_success', ['user'=>'cliente']);   
    }

    public function login(Request $request){
       // echo "<script>console.log('bella fratello ".$request->user."'  );</script>";
      
        return view('login', ['user' => $request->user]);
    }

    public function login_dashboard(Request $request){
        echo "<script type='text/javascript'>alert(ciao '".$request->user."');</script>";
        if($request->user == 'cliente' || $request->user == 'albergatore'){
            $result = DB::select('Select email, password from '. $request->user .' where email=? and password=?', [$request->email, $request->pass]);
        }else{
            return view('/');
            echo('erroro get '. $request->user);
        }
        if(sizeof($result) == 0){
            return redirect()->route('login', ['user' => $request->user]);
        }else{
            if($request->user == 'cliente'){
                return redirect()->route('cli_dashboard', ['user' =>$result[0]->email]);
            }else if($request->user == 'albergatore'){
                return redirect()->route('alb_dashboard', ['user' =>$result[0]->email]);
            }else{
                echo('error table');
                //return view('albergatore.al_dashboard');
            }
            //echo ($user[0]->email .' '.$user[0]->password );
        }
    }
}

