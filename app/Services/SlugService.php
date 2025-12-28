<?php

namespace App\Services;

use App\Services\DbQuery;

class SlugService
{
    protected $db;

    public function __construct()
    {
        $this->db = new DbQuery();
    }

    /**
     * Generate a unique slug for a given table.
     *
     * @param string $tableName The table to check for uniqueness.
     * @param string $string The string to convert into a slug.
     * @return string The unique slug.
     */
    public function generate($tableName, $string)
    {
        // 1. Generate initial slug
        $slug = $this->slugify($string);
        $originalSlug = $slug;
        $count = 1;

        // 2. Check for existence and append counter if needed
        while ($this->slugExists($tableName, $slug)) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Convert a string to a slug.
     *
     * @param string $text
     * @return string
     */
    protected function slugify($text)
    {
        // Replace non-letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // Transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Trim
        $text = trim($text, '-');

        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // Lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Check if a slug exists in the database.
     *
     * @param string $tableName
     * @param string $slug
     * @return bool
     */
    protected function slugExists($tableName, $slug)
    {
        $result = $this->db->findBySlug($tableName, $slug);
        return $result['rowCount'] > 0;
    }
}
