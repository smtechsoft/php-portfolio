<?php

use App\Services\AssetPath;

$asset = new AssetPath();
?>
<!-- FOR FLATICON -->
<link rel="stylesheet" href="<?php $asset->frontendAsset('fonts/flaticon/flaticon.css') ?>">

<!-- FOR FONT AWESOME -->
<link rel="stylesheet" href="<?php $asset->frontendAsset('fonts/font-awesome/fontawesome.css') ?>">

<!-- FOR SLICK SLIDER -->
<link rel="stylesheet" href="<?php $asset->frontendAsset('css/vendor/slick.min.css') ?>">

<!-- FOR BOOTSTRAP -->
<link rel="stylesheet" href="<?php $asset->frontendAsset('css/vendor/bootstrap.min.css') ?>">

<!-- FOR GLOBAL STYLE -->
<link rel="stylesheet" href="<?php $asset->frontendAsset('css/custom/main.css') ?>">