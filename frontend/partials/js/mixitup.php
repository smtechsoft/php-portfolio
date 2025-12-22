    <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
    <script src="<?php $asset->frontendAsset('js/vendor/mixitup.min.js') ?>">
    </script>
    <script src="<?php $asset->frontendAsset('js/custom/mixitup.js') ?>s"></script>