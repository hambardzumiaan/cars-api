<?php

namespace App\Http\Requests;

class CarEngineRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
