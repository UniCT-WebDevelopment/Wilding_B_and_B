<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class DashController extends Controller
{
    private $data=array();

    /////////////////////////////////////////////////////////cli_dashboard//////////////////////////////////////////////
    
    private function get_name(){
        $result = DB::table('cliente')->where('email',  $this->data['email'])->get();
        $this->data['name']=$result[0]->nome;
    }

    private function get_prenote_inf(){
        $result = DB::select('select casa.citta, casa.indirizzo_civico, casa.nome_casa , locazione.data_inizio
                                from cliente ,locazione, casa 
                                where email=? and cliente.email = locazione.id_cliente and locazione.id_casa = casa.id_casa
                                order by locazione.data_inizio DESC', [ $this->data['email']] );           
        if(sizeof($result) == 0){
            $this->data['prenote_inf']= 'Nessuna prenotazione';
            $this->data['prenote_name']='';
            $this->data['prenote_data']='';
        }else{
            $this->data['prenote_inf']= $result[0]->citta.' '.$result[0]->indirizzo_civico;
            $this->data['prenote_name']=$result[0]->nome_casa;
            $this->data['prenote_data']= substr($result[0]->data_inizio,0,-8);
        }
    }
    
 
    public function cli_dashboard(Request $request){
        echo "<script>console.log('bella fratello' );</script>";
        $this->data['email']=$request->user;
        echo "<script>console.log('".$this->data['email']."' );</script>";
        if( $this->data['email']=='') return redirect()->route('login', ['user' =>'cliente']);
        //$this->data['email']=$request->user;
        $this->get_name();
        $this->get_prenote_inf();
        ///////////////////////////notifiche////////////////////////////////////////////////
        $result = DB::select('select notifiche.id_cliente, notifiche.id_casa, notifiche.data_fine,casa.citta, casa.indirizzo_civico
                                from notifiche, casa
                                where notifiche.id_cliente=? and notifiche.id_casa = casa.id_casa
                                order by notifiche.created_at DESC', [ $this->data['email']] );
        if(sizeof($result) == 0){                      
            return view('cliente.cli_dashboard', ['data'=>$this->data]);
        }else{
            return view('cliente.cli_dashboard', ['data'=>$this->data, 'not'=>$result[0]]);
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function user(Request $request){
        /*$data['email']=$request->user;
        return view('cliente.user',['data'=>$data]);*/
    }
    
    //////////////////////////////////////////////////////////tables////////////////////////////////////////////////////
    public function tables(Request $request){
        $this->data['email']=$request->user;
        echo "<script>console.log('". $this->data['email']."' );</script>";
        if( $this->data['email']=='') return redirect()->route('login', ['user' =>'cliente']);

        $result = DB::select('select casa.citta, casa.nome_casa , locazione.data_inizio, locazione.data_fine
                        from cliente ,locazione, casa 
                        where email=? and cliente.email = locazione.id_cliente and locazione.id_casa = casa.id_casa
                        order by locazione.data_inizio DESC', [ $this->data['email']] );           
        return view('cliente.tables',['data'=>$this->data,'result'=>$result]);
    }
    
    public function notifications(Request $request){
        //return view('cliente.notifications',['data'=>$data]);
    }

    public static function log_out(){
        
    }

}
