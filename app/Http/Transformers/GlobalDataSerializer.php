<?php

namespace App\Http\Transformers;

use League\Fractal\Serializer\ArraySerializer;

class GlobalDataSerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data) :array
    {
        if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return $data;
    }

    public function item($resourceKey, array $data) :array
    {
        if ($resourceKey) {
            return [$resourceKey => $data];
        }
        return $data;
    }
}
