<?php
//Comunidad_Artesanal\app\Console\Commands\SendLowStockAlerts.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Mail\LowStockAlert;
use Illuminate\Support\Facades\Mail;

class SendLowStockAlerts extends Command
{
    protected $signature = 'stock:low-alerts';
    protected $description = 'Enviar alertas de bajo stock a los vendedores';

    public function handle()
    {
        // Obtener productos con stock bajo
        $lowStockProducts = Product::where('stock', '<', 5)->get();
        $vendedoresEmails = [];

        foreach ($lowStockProducts as $product) {
            $vendedor = $product->vendor;

            if ($vendedor) {
                $vendedoresEmails[$vendedor->email][] = $product;
            } else {
                // Enviar correo al administrador si no hay vendedor
                $adminEmail = 'admin@admin.com';
                $vendedoresEmails[$adminEmail][] = $product;
            }
        }

        // Enviar correos a cada vendedor o al administrador
        foreach ($vendedoresEmails as $email => $products) {
            try {
                Mail::to($email)->send(new LowStockAlert($products));
                $this->info("Alerta de bajo stock enviada a: {$email}");
            } catch (\Exception $e) {
                $this->error("Error al enviar alerta de bajo stock a {$email}: {$e->getMessage()}");
            }
        }

        $this->info('Todas las alertas de bajo stock han sido enviadas.');
    }
}
