<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class Experience
{
    public function getAllExperiences()
    {
        $db = new DbQuery();
        $query = $db->all('experiences');
        return $query['rows'] ?? [];
    }
}
