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

    public function getPricingPlanWithContents($slug)
    {
        $db = new DbQuery();
        $where = "pricing_plans.slug = '$slug'";
        return $db->join(
            'pricing_plans',
            'pricing_plans.*, pricing_plan_contents.content as feature',
            [
                ['pricing_plan_contents', 'pricing_plans.id = pricing_plan_contents.pricing_plan_id', 'LEFT']
            ],
            $where
        );
    }
}
