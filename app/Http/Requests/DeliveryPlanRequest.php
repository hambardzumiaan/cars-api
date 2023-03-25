<?php

namespace App\Http\Requests;

class DeliveryPlanRequest extends GeneralRequest
{
    public function rules() {
        return [
            'from' => 'required|numeric',
            'to' => 'required|numeric|gt:from',
            'mile_price' => 'required|numeric',
            'services_price' => 'required|numeric',
            'additional_expenses' => 'required|numeric',
        ];
    }
}
