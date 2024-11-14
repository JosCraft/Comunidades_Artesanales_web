<?php
//Comunidad_Artesanal\app\Mail
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowStockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function build()
    {
        return $this->subject('Alerta de Bajo Stock')
                    ->view('emails.low_stock_alert');
    }
}
