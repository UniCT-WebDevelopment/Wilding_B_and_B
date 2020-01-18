<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailtrapExample;
use App\Notifiche;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $cliente, $id_casa, $data_fine;
    
    public function __construct($_cliente, $_id_casa, $_data_fine)
    {
        $this->cliente= $_cliente;
        $this->id_casa= $_id_casa;
        $this->data_fine= $_data_fine;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /*Mail::send(new MailtrapExample(),function($m) use ($this->cliente) {
            $m->to($this->cliente);
        });*/
        $not= new Notifiche;
        $not->id_cliente= $this->cliente;
        $not->data_fine= $this->data_fine;
        $not->id_casa= $this->id_casa;
        $not->save();
        Mail::to($this->cliente)->send(new MailtrapExample()); 
    }
}
