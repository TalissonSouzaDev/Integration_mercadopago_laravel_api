<?
namespace App\Http\Services\Interfaces;

interface MercadoPagoInterface {
    public function createBoletoPayment(float $amount, string $description);
    public function createPixPayment(float $amount);
}