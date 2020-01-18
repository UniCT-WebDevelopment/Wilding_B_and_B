<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reg_albergatore;
use App\Reg_cliente;
use App\locazione;
use App\inserzione;
use App\casa;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login_ad(Request $request){
        return view('login_ad.admin');
    }

    public function login_su(Request $request){
        if( $request->id !='' &&  $request->pass !=''){
            $result = DB::select('Select email, password from admin where email=? and password=?', [$request->id, $request->pass]);
            if(sizeof($result) == 0){
                return redirect()->route('admin');
            }else{
                
                return view('login_ad.ad_dashboard', ['ad' =>$request->id]);
            }
        }else{
            return redirect()->route('admin');
        }
    }

    public function ad_dashboard(Request $request){
        if($request->ad == 'root@root.it' || $request->back == 'back'){
            return view('login_ad.ad_dashboard');
        }else{
            //return redirect()->route('admin');
        }
    }

    public function lista_user(Request $request){
        if($request->utente == 'albergatore' || $request->utente == 'cliente'){
            $result = DB::select('Select email, nome, cognome, contatto from '. $request->utente);
            if($request->exists('error')){
                return view('login_ad.lista_user', ['error'=>'er','utente'=>$request->utente, 'op'=>$request->operazione, 'list'=>$result]);
            }else{
                return view('login_ad.lista_user', ['utente'=>$request->utente, 'op'=>$request->operazione, 'list'=>$result]);
            }
        }
        return view('welcome');
    }

    public function mod_dati(Request $request){
        if($request->utente == 'albergatore' || $request->utente == 'cliente'){
            if($request->user != ''){
                $result = DB::select('Select email, nome, cognome, contatto, cod_fiscale from '.$request->utente.' where email= ?', [$request->user]);
                if(sizeof($result) == 0){
                    return redirect()->route('admin');
                }else{
                    return view('login_ad.mod_dati', ['dati'=>$result[0], 'utente'=>$request->utente, 'operazione'=>$request->operazione]);
                }
            }
        }
        return view('welcome');
    }

    public function ins_data(Request $request){
        if($request->utente == 'cliente'){
            $utente= new Reg_cliente();
            $utente=Reg_cliente::find($request->old_email);
        }else if($request->utente == 'albergatore'){
            $utente= new Reg_albergatore();
            $utente=Reg_albergatore::find($request->old_email);
        }
        if($utente){
            $utente->nome=$request->nome;
            $utente->cognome=$request->cognome;
            $utente->cod_fiscale=$request->cod_fiscale;
            $utente->contatto=$request->contatto;
            $utente->update();
        }
        return redirect()->route('lista_user', ['utente'=>$request->utente, 'operazione'=>$request->operazione]);
    }

    public function delete_user(Request $request){
        if($request->utente == 'cliente'){
            $utente= new Reg_cliente();
            $utente=Reg_cliente::find($request->email)->delete();
            return redirect()->route('lista_user', ['utente'=>$request->utente, 'operazione'=>$request->operazione]);
        }else if($request->utente == 'albergatore'){
            $utente= new Reg_albergatore();
            $result = DB::select('select inserzione.id_casa from inserzione where inserzione.id_albergatore=?',[$request->email]);
            foreach($result as $key=>$item){
                DB::delete('delete from casa where casa.id_casa=?', [$key]);
            }
            DB::delete('delete from inserzione where inserzione.id_albergatore=?', [$request->email]);
            $utente=Reg_albergatore::find($request->email)->delete();
            return redirect()->route('lista_user', ['utente'=>$request->utente, 'operazione'=>$request->operazione]);
        }
        return redirect()->route('admin');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function lista_inserzione(Request $request){
        if($request->utente == 'albergatore'){
            $query='SELECT inserzione.id_inserzione, inserzione.id_casa, inserzione.tipologia_affitto, inserzione.prezzo_giorno, inserzione.prezzo_ora, inserzione.regolamento, casa.nome_casa, casa.indirizzo_civico, casa.citta, casa.num_stanze
                            from casa, inserzione
                            where inserzione.id_albergatore =? and inserzione.id_casa = casa.id_casa';
        }elseif($request->utente == 'cliente'){
            $query='SELECT casa.nome_casa , casa.citta, casa.indirizzo_civico, locazione.id_casa, locazione.id_locazione, locazione.tipologia_affitto, locazione.data_inizio, locazione.data_fine
                        from locazione, casa
                        where locazione.id_cliente =? and locazione.id_casa=casa.id_casa';
        }
        if($request->user != ''){
            $result = DB::select($query, [$request->user]);
            if(sizeof($result) == 0){
                return redirect()->route('lista_user', ['error'=>'er','utente'=>$request->utente, 'operazione'=>$request->operazione]);
               
            }else{
                return view('login_ad.lista_inserzione', ['list'=>$result, 'utente'=>$request->utente,'user'=>$request->user, 'operazione'=>$request->operazione]);
            }
        }else{
            return view('welcome');
        }
    }

    public function mod_inserzione(Request $request){
        $record= unserialize($request->record);
        if($request->utente == 'albergatore'){
            return view('login_ad.mod_inserzione', ['record'=>$record, 'utente'=>$request->utente, 'date_pik'=>'',
                                                    'user'=>$request->user, 'operazione'=>$request->operazione]);
        }elseif($request->utente == 'cliente'){
            $prenotazioni = DB::select('select locazione.data_inizio, locazione.data_fine
                                from locazione where locazione.id_casa = ? and locazione.data_fine>= ?',[$record->id_casa,date("Y-m-d")]);

            return view('login_ad.mod_inserzione', ['record'=>$record, 'utente'=>$request->utente, 'date_pik'=>$prenotazioni,
                                                    'user'=>$request->user, 'operazione'=>$request->operazione]);
        }
        return view('welcome');
    }

    public function new_data (Request $request){
        $record= unserialize($request->record);
        if($request->utente == 'cliente'){
            $locazione= new locazione();
            $locazione= locazione::find($record->id_locazione);
            if($record->tipologia_affitto == 'giorno'){
                $locazione->data_inizio= $request->checkIn;
                $locazione->data_fine= $request->checkOut;
            }else{
                $locazione->data_inizio= $request->checkIn .' '.date('H:i:s', strtotime($request->in_time));
                $locazione->data_fine= $request->checkIn .' '.date('H:i:s', strtotime($request->ou_time));
            }
            $locazione->update();
        }elseif($request->utente == 'albergatore'){
           $inserzione= new inserzione();
           $inserzione= inserzione::find($record->id_inserzione);
           $casa= new casa();
           $casa= casa::find($record->id_casa);
           $inserzione->tipologia_affitto= $request->tipologia_affitto;
           $inserzione->prezzo_giorno= $request->prezzo_giorno;
           $inserzione->prezzo_ora= $request->prezzo_ora;
           $inserzione->regolamento= $request->regolamento;
           $casa->nome_casa= $request->nome_casa;
           $casa->indirizzo_civico= $request->indirizzo;
           $casa->citta= $request->citta;
           $casa->num_stanze= $request->num_stanze;
           $inserzione->update();
           $casa->update();
        }
        return  redirect()->route('lista_inserzione', ['utente'=>$request->utente,'user'=>$request->user, 'operazione'=>$request->operazione]);
    }
    
    public function delete_inserzione(Request $request){
        $record= unserialize($request->record);
        if($request->utente == 'cliente'){
            $locazione= new locazione();
            $locazione= locazione::find($record->id_locazione)->delete();
           
        }elseif($request->utente == 'albergatore'){
            $inserzione= new inserzione();
            $inserzione= inserzione::find($record->id_inserzione)->delete();
            $casa= new casa();
            $casa= casa::find($record->id_casa);
        }
        return redirect()->route('lista_inserzione', ['utente'=>$request->utente,'user'=>$request->user, 'operazione'=>$request->operazione]);
    }
}
