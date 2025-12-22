   <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
   <script src="<?php $asset->frontendAsset('js/custom/main.js') ?>"></script>