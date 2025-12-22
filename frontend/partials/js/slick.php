    <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
    <script src="<?php $asset->frontendAsset('js/vendor/slick.min.js') ?>">
    </script>
    <script src="<?php $asset->frontendAsset('js/custom/slick.js') ?>"></script>