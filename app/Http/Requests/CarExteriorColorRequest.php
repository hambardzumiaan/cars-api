<?php

namespace App\Http\Requests;

class CarExteriorColorRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
