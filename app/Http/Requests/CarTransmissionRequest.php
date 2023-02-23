<?php

namespace App\Http\Requests;

class CarTransmissionRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
