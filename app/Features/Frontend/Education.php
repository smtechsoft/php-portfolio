<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class Education
{
    public function getAllEducations()
    {
        $db = new DbQuery();
        $query = $db->all('educations');
        return $query['rows'] ?? [];
    }
}