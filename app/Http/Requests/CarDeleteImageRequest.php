<?php

namespace App\Http\Requests;

class CarDeleteImageRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required'
        ];
    }
}
