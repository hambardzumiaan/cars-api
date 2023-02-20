<?php

namespace App\Http\Requests;

class CarModelRequest extends GeneralRequest
{
    public function rules() {
        return [
            'name' => 'required',
            'car_mark_id' => 'required|exists:car_marks,id'
        ];
    }
}
