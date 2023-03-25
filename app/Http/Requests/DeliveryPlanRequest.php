<?php

namespace App\Http\Requests;

class DeliveryPlanRequest extends GeneralRequest
{
    public function rules() {
        return [
            'from' => 'required|integer',
            'to' => 'required|integer|gt:from',
            'mile_price' => 'required|integer',
            'services_price' => 'required|integer',
            'additional_expenses' => 'required|integer',
        ];
    }
}
