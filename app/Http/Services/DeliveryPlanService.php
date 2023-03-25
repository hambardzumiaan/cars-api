<?php

namespace App\Http\Services;

use App\Models\DeliveryPlan;

class DeliveryPlanService
{
    public function getAll()
    {
        return DeliveryPlan::all();
    }

    public function store($data)
    {
        return DeliveryPlan::create($data);
    }

    public function update($data, $id)
    {
        $plan = DeliveryPlan::find($id);

        if ($plan) {
            $plan->update($data);

            return $plan;
        } else {
            throw new \Exception('Delivery plan not found');
        }
    }

    public function destroy($id)
    {
        $plan = DeliveryPlan::find($id);

        if ($plan) {
            $plan->delete();
        } else {
            throw new \Exception('Delivery plan not found');
        }
    }
}