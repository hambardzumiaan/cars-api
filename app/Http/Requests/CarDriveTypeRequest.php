<?php

namespace App\Http\Requests;

class CarDriveTypeRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
