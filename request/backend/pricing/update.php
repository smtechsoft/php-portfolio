<?php

use App\Services\DbQuery;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];



    $db = new DbQuery();

    $getItem = $db->findBySlug('pricing_plans', $slug);
    if (!$getItem) {
        header('Location: /admin/pricing?error=Pricing plan not found');
        exit;
    }
    $result = $db->update(
        'pricing_plans',
        $getItem['row']->id,
        [
            'name' => $name,
            'price' => $price,
        ]
    );

    if ($result === 'data updated') {
        $planId = $getItem['row']->id;

        // Delete existing contents
        $existingContents = $db->where('pricing_plan_contents', 'pricing_plan_id', $planId);
        if ($existingContents['rowCount'] > 0) {
            foreach ($existingContents['rows'] as $row) {
                $db->delete('pricing_plan_contents', $row->id);
            }
        }

        // Insert new contents
        if (is_array($content)) {
            foreach ($content as $feature) {
                if (!empty($feature)) {
                    $db->insert('pricing_plan_contents', [
                        'pricing_plan_id' => $planId,
                        'content' => $feature,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }

        header('Location: /admin/pricing?success=Pricing plan updated successfully');
        exit;
    } else {
        header('Location: /admin/pricing/edit/' . $slug . '?error=Failed to update pricing plan');
        exit;
    }
}
