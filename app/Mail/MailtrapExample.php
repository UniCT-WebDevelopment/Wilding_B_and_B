<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class MailtrapExample extends Mailable
{
    use Queueable, SerializesModels;
   
    public function __construct()
    {
      
    }
    
    public function build()
    {
        return $this->from('esempio@mail.com', 'mail.')
            ->subject('Email generata da laravel')
            ->markdown('mails.exmpl')
            ->with([
                'name' => '',
                'link' => 'http://localhost:8000/login?user=cliente'
            ]);
          ;
    }
}
        
