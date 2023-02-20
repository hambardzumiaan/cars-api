<?php

namespace App\Http\Requests;

class CarTypeRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
