<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MercadoPagoResource;
use App\Http\Services\MercadoPagoService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $mercado_pago;
    public function __construct(MercadoPagoService $MercadoPagoService)
    {
        $this->mercado_pago = $MercadoPagoService;
    }
    

    public function PaymentMercado_Pago(Request $request) {
        $metodo =  $request->method;
        if ($metodo == "PIX") {
            $payment = $this->mercado_pago->createPixPayment(10.0);
            return MercadoPagoResource::collection($payment);
        }

    }
}
