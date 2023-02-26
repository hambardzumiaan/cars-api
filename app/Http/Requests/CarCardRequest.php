<?php

namespace App\Http\Requests;

class CarCardRequest extends GeneralRequest
{
    public function rules() {
        return [
            'car_mark_id' => 'required|exists:car_marks,id',
            'car_model_id' => 'required|exists:car_models,id',
            'car_year_id' => 'required|exists:car_years,id',
            'vin' => 'nullable|unique:car_cards,vin',
            'car_body_style_id' => 'nullable|exists:car_body_styles,id',
            'car_sticker_id' => 'nullable|exists:car_stickers,id',
            'car_engine_id' => 'nullable|exists:car_engines,id',
            'car_fuel_type_id' => 'nullable|exists:car_fuel_types,id',
            'car_drive_type_id' => 'nullable|exists:car_drive_types,id',
            'car_transmission_id' => 'nullable|exists:car_transmissions,id',
            'car_interior_color_id' => 'nullable|exists:car_interior_colors,id',
            'car_exterior_color_id' => 'nullable|exists:car_exterior_colors,id',
            'car_seat_id' => 'nullable|exists:car_seats,id',
            'description' => 'nullable|max:150'
        ];
    }
}
