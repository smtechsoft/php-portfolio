<?php

namespace App\Features\Frontend;

use App\Services\DbQuery;

class About
{
    public function info()
    {
        $db = new DbQuery();
        $query = $db->latest('abouts', 'id');
        return $query['row'] ?? null;
    }
}
