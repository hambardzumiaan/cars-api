<?php

namespace App\Http\Requests;

class CarStickerRequest extends GeneralRequest
{
    public function rules() {
        return [
            'text' => 'required|string',
            'color' => 'required|string',
        ];
    }
}
