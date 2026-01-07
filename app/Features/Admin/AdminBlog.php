<?php

namespace App\Features\Admin;

use App\Services\DbQuery;

class AdminBlog
{
    public function getAllBlogs($lemit, $page)
    {
        $db = new DbQuery();
        return $db->all('blogs', $lemit, $page);
    }


    public function getBlogBySlug($slug)
    {
        $db = new DbQuery();
        $blog = $db->findBySlug('blogs', $slug);
        return $blog['row'] ?? null;
    }
}