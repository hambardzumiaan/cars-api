<?php

namespace App\Http\Requests;

class CarFuelTypeRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
