<?php

namespace App\Http\Transformers\Delivery;

use App\Models\DeliveryPlan;
use League\Fractal\TransformerAbstract;

class DeliveryCalculatePlanTransformer extends TransformerAbstract
{
    public function transform(DeliveryPlan $deliveryPlan)
    {
        return [
            'from' => $deliveryPlan->from,
            'to' => $deliveryPlan->to,
            'mile_price' => $deliveryPlan->mile_price,
            'services_price' => $deliveryPlan->services_price,
            'additional_expenses' => $deliveryPlan->additional_expenses,
            'total' => $deliveryPlan->total
        ];
    }
}
