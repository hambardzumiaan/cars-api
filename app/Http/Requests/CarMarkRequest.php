<?php

namespace App\Http\Requests;

class CarMarkRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
