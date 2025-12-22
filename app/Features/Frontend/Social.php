<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class Social
{
    public function getAllSocialLinks()
    {
        $db = new DbQuery();
        $query = $db->all('socials');
        return $query['rows'] ?? [];
    }
}