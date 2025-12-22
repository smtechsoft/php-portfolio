    <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
    <script src="<?php $asset->frontendAsset('js/vendor/counterup.min.js') ?>">
    </script>
    <script src="<?php $asset->frontendAsset('js/vendor/waypoints.min.js') ?>">
    </script>
    <script src="<?php $asset->frontendAsset('js/custom/counterup.js') ?>">
    </script>