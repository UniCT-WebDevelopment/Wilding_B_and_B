<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\inserzione;
use App\casa;

class AlbController extends Controller
{

    private $data=array();

    private function get_name(){
        $result = DB::table('albergatore')->where('email',  $this->data['email'])->get();
        $this->data['name']=$result[0]->nome;
    }

    private function get_prenote_inf(){
        $result = DB::select('select casa.citta, casa.indirizzo_civico, locazione.id_cliente , locazione.data_inizio
                                from locazione, casa 
                                where locazione.id_albergatore=? 
                                and locazione.id_casa = casa.id_casa
                                order by locazione.data_inizio DESC', [ $this->data['email']] );           
        if(sizeof($result) == 0){
            $this->data['prenote_inf']= 'Nessuna prenotazione';
            $this->data['prenote_name']='';
            $this->data['prenote_data']='';
        }else{
            echo  $this->data['name'].' '.$result[0]->citta;
            $this->data['prenote_inf']= 'Prenotato da';
            $this->data['prenote_name']=$result[0]->id_cliente;
            $this->data['prenote_data']= substr($result[0]->data_inizio,0,-8);
        }
    }

    public function alb_dashboard(Request $request){
        $this->data['email']=$request->user;
        if( $this->data['email']=='') return redirect()->route('login', ['user' =>'cliente']);
        $this->get_name();
        $this->get_prenote_inf();
        return view('albergatore.alb_dashboard', ['data'=>$this->data]);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function alb_annuncio(Request $request){
        $this->data['email']=$request->user;
        return view('albergatore.alb_annuncio', ['data'=>$this->data]);
    }

    public function ins_annuncio(Request $request){
        
        $data['email']=$request->user;
        $casa= new casa;
        $casa->nome_casa= $request->nome;
        $casa->indirizzo_civico= $request->indirizzo;
        $casa->citta= $request->citta;
        $casa->num_stanze= $request->stanze;
        $casa->foto='';
        $casa->save();
        foreach ($request->file('file') as $file) {
            echo 'public\img'.chr(92).$request->user.chr(92).$casa->id_casa.chr(92);
            $file->store('public\img'.chr(92).$request->user.chr(92).$casa->id_casa.chr(92));
        }
        $casa->foto='/img/'.$request->user.'/'.$casa->id_casa.'/';
        $casa->update();
        $inserzione= new inserzione;
        $inserzione->tipologia_affitto= $request->type;
        if($request->type == 'ore'){
            $inserzione->prezzo_ora= $request->euro;
        }else{
            $inserzione->prezzo_giorno= $request->euro;
        }
        $inserzione->regolamento= $request->descrizione;
        $inserzione->id_casa=$casa->id_casa;
        $inserzione->id_albergatore=$request->user;
        $inserzione->save();
        //return view('albergatore.alb_dashboard',['data'=>$this->data]);
        return redirect()->route('alb_dashboard', ['user'=>$request->user]);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function ins_table(Request $request){
        $this->data['email']=$request->user;
        $result = DB::select('select casa.citta, casa.indirizzo_civico, inserzione.data_inserimento, casa.nome_casa
                            from casa,inserzione
                            where inserzione.id_albergatore=? 
                            and inserzione.id_casa= casa.id_casa', [ $this->data['email']] );

        return view('albergatore.ins_table',['data'=>$this->data,'result'=>$result]);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function pre_table(Request $request){
        $this->data['email']=$request->user;
        $result = DB::select('select casa.citta, casa.indirizzo_civico, locazione.id_cliente , locazione.data_inizio
                                from locazione, casa 
                                where locazione.id_albergatore=? 
                                and locazione.id_casa = casa.id_casa
                                order by locazione.data_inizio DESC', [$this->data['email']] );

        return view('albergatore.pre_table',['data'=>$this->data,'result'=>$result]);
    }
}
