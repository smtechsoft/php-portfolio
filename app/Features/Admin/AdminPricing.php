<?php

namespace App\Features\Admin;

use App\Services\DbQuery;

class AdminPricing
{
    public function getAllPricingPlans($limit, $page)
    {
        $db = new DbQuery();
        return $db->all('pricing_plans', $limit, $page);
    }

    public function getPricingPlanBySlug($slug)
    {
        $db = new DbQuery();
        $pricing = $db->findBySlug('pricing_plans', $slug);
        return $pricing['row'] ?? null;
    }
}
