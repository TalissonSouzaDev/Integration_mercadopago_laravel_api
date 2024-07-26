<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MercadoPagoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $payment_json =  [];
        if($this->resource['point_of_interaction']['type'] == "PIX") {
            $payment_json = [
                    "price" => $this->resource["transaction_details"]['total_paid_amount'],
                    "status" => $this->resource['status'],
                    "transaction_data" => [
                            "qr_code_base64" => $this->resource["transaction_data"]['qr_code_base64'],
                             "qr_code" => $this->resource["transaction_data"]['qr_code'],
                    ],
            ];
        }

        return $payment_json;
    }
}