<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DateTime;
use App\locazione;
use App\Jobs\SendNotification;

class CercaController extends Controller
{
    private $data= array();

    public function cerca(Request $request){
        $data= array();
        $path= array();
        if($request->isMethod('post')){
            $data['email']= $request->user;
        }else{
            $data['email']='non_login';
        }
        $data['citta']=$request->cit_value;
        
        $result = DB::select('select casa.id_casa, casa.indirizzo_civico, casa.foto, inserzione.tipologia_affitto , 
                                inserzione.prezzo_giorno , inserzione.prezzo_ora
                                from inserzione, casa 
                                where lower(casa.citta) = lower(?) 
                                and casa.id_casa = inserzione.id_casa', [$data['citta']] );
        foreach($result as $key=>$item){
            $img_file[$key] = File::files(storage_path().'\app\public'.$item->foto);
            $path[$key]= '/storage'.$item->foto.basename($img_file[$key][0]);
            $key++;
        }
        $data['citta']= $request->cit_value;
        return view('cerca',['data'=>$data,'result'=>$result,'path'=>$path, 'utente'=>$request->utente]);
    }

    public function prenota(Request $request){
        $data['email'] = $request->user;
        $data['id_casa']= $request->id;
        $result = DB::select('select inserzione.tipologia_affitto, inserzione.prezzo_ora, 
                                inserzione.prezzo_giorno, inserzione.regolamento,
                                inserzione.id_albergatore, casa.nome_casa, casa.indirizzo_civico ,
                                casa.citta , casa.num_stanze, casa.foto
                                from inserzione, casa
                                where casa.id_casa=? and casa.id_casa=inserzione.id_casa',[$request->id]);
        $img_file=File::files(storage_path().'\app\public'.$result[0]->foto);
        foreach($img_file as $key=>$item){
            $path[$key]= '/storage'.$result[0]->foto.basename($img_file[$key]);
        }
        if($result[0]->tipologia_affitto == 'giorno'){
            $data['giorno']='check';
            $data['ore']='close';
        }else{
            $data['giorno']='close';
            $data['ore']='check';
        }
        ////date disponibili//////////////////////////////////////////////////////////////
        $prenotazioni = DB::select('select locazione.data_inizio, locazione.data_fine
                                from locazione where locazione.id_casa = ? and locazione.data_fine>= ?',[$data['id_casa'],date("Y-m-d")]);
        
        //////////////////////////////////////////////////////////////////////////////////
        return view('prenota', ['data'=>$data, 'result'=>$result[0], 'path'=>$path, 'date_pik'=>$prenotazioni, 'utente'=>$request->utente]);
    }

    private function secsBetween($dateOne, $dateTwo, $abs = true) {
        $func = $abs ? 'abs' : 'intval';
        return $func(strtotime($dateOne) - strtotime($dateTwo));
    }

    public function ins_prenotazione(Request $request){
        $pre= new locazione;
        if($request->type == 'giorno'){
            $pre->data_inizio= $request->checkIn;
            $pre->data_fine= $request->checkOut;
        }else{
            $pre->data_inizio= $request->checkIn .' '.date('H:i:s', strtotime($request->in_time));
            $pre->data_fine= $request->checkIn .' '.date('H:i:s', strtotime($request->ou_time));
            $now = new DateTime();
            $data_in= new DateTime($pre->data_inizio);
            $data_fin= new DateTime($pre->data_fine);
            $sec= ($data_in->getTimestamp() - $now->getTimestamp()) + ($data_fin->getTimestamp() - $data_in->getTimestamp()); 
            //echo $this->secsBetween($date->format('Y-m-d H:i:s'), $pre->data_fine);
            //echo $data_fin->format('Y-m-d H:i').'     '.$data_in->format('Y-m-d H:i').' ';
            echo $request->user.'  '.$request->id_casa.'   '.$pre->data_fine;
            $notJob = new SendNotification($request->user,$request->id_casa,$pre->data_fine);//->delay($sec);//- 30*60 per farlo 30 minuti prima
            dispatch($notJob);
        }
        $pre->tipologia_affitto= $request->type;
        $pre->id_casa=$request->id_casa;
        $pre->id_cliente= $request->user;
        $pre->id_pagamento=1;
        $pre->id_albergatore= $request->id_albergatore;
        $pre->save();

        return redirect()->route('cli_dashboard', ['user'=>$request->user]);
    }

}
