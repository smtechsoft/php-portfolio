<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class Pricing
{

    public function getAllPricingPlans()
    {
        $db = new DbQuery();
        $query = $db->all('pricing_plans');
        return $query['rows'] ?? [];
    }
}
