    <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
    <!-- FOR FAVICON -->
    <link rel="icon" href="<?php $asset->frontendAsset('images/favicon.png') ?>">