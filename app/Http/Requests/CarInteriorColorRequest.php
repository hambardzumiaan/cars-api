<?php

namespace App\Http\Requests;

class CarInteriorColorRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
