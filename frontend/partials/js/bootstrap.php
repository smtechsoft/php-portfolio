    <?php

    use App\Services\AssetPath;

    $asset = new AssetPath();
    ?>
    <script src="<?php $asset->frontendAsset('js/vendor/jquery-1.12.4.min.js') ?>">
    </script>
    <script src="<?php $asset->frontendAsset('js/vendor/popper.min.js') ?>"></script>
    <script src="<?php $asset->frontendAsset('js/vendor/bootstrap.min.js') ?>">
    </script>