<?php

namespace App\Http\Requests;

class CarYearRequest extends GeneralRequest
{
    public function rules() {
        return [
            'year' => 'required|integer'
        ];
    }
}
