<?php

namespace App\Http\Requests;

class CarSeatRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
