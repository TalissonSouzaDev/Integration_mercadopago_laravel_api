<?
namespace App\Http\Services;

use App\Http\Services\Interfaces\MercadoPagoInterface;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;

class MercadoPagoService implements MercadoPagoInterface
{

    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
    }

    public function createBoletoPayment(float $amount, string $description)
    {
        
    }

    public function createPixPayment(float $amount) 
    {
        $client = new PaymentClient();
        $payment = $client->create([
            "transaction_amount" => $amount,
            "payment_method_id" => "PIX",
            "payer" => [ 
                "email" => "talissonmdsouza@gmail.com"
            ]
        ]);

        return $payment;
    }
}