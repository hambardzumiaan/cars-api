<?php

namespace App\Http\Requests;

class CarBodyStyleRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
