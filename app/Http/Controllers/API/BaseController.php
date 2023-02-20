<?php

namespace App\Http\Controllers\API;

use App\Http\Transformers\GlobalDataSerializer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as ExtendedBaseController;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;

class BaseController extends ExtendedBaseController
{
    public function collection($data, $transformer)
    {
        $manager = $this->getFractalManager();
        $resource = new Collection($data, $transformer);
        return $manager->createData($resource)->toArray();
    }

    public function item($data, $transformer)
    {
        $manager = $this->getFractalManager();
        $resource = new Item($data, $transformer);
        return $manager->createData($resource)->toArray();
    }

    private function getFractalManager()
    {
        $request = app(Request::class);
        $manager = new Manager();
        $manager->setSerializer(new GlobalDataSerializer());

        if (!empty($request->query('include'))) {
            $manager->parseIncludes($request->query('include'));
        }
        return $manager;
    }
}
