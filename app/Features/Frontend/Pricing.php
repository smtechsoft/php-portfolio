<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class Pricing
{

    public function getAllPricingPlans()
    {
        $db = new DbQuery();
        $query = $db->join(
            'pricing_plans',
            'pricing_plans.*, pricing_plan_contents.content',
            [
                ['pricing_plan_contents', 'pricing_plans.id = pricing_plan_contents.pricing_plan_id', 'LEFT']
            ]
        );

        $plans = [];
        if ($query['rowCount'] > 0) {
            foreach ($query['rows'] as $row) {
                $id = $row->id;
                if (!isset($plans[$id])) {
                    $plans[$id] = $row;
                    $plans[$id]->features = [];
                }
                if (!empty($row->content)) {
                    $plans[$id]->features[] = $row->content;
                }
            }
        }

        return array_values($plans);
    }
}
