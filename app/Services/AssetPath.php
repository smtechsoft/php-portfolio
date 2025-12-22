<?php

namespace App\Services;

class AssetPath
{
    public function adminAsset($path): void
    {
        echo  '../backend/admin/assets/' . $path;
    }

    public function frontendAsset($path): void
    {
        echo  'frontend/assets/' . $path;
    }
}
