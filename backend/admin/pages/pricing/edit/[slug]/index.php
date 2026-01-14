<?php

use App\Features\Admin\AdminPricing;

$slug = $_GET['slug'] ?? ''; 

$pricing = new AdminPricing();
$result = $pricing->getPricingPlanWithContents($slug);

if (empty($result['rows'])) {
    die('Pricing plan not found');
}

$rows = $result['rows'];
$plan = $rows[0];
$features = [];

foreach ($rows as $row) {
    if (!empty($row->feature)) {
        $features[] = $row->feature;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pricing Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('backend/admin/partials/header.php'); ?>
    
    <div class="container mt-4">
        <h2>Edit Pricing Plan</h2>
        <form action="/request/backend/pricing/update" method="post">
            <input type="hidden" name="slug" value="<?= htmlspecialchars($plan->slug) ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Plan Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($plan->name) ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($plan->price) ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Features</label>
                <div id="features-container">
                    <?php if (count($features) > 0): ?>
                        <?php foreach ($features as $feature): ?>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="content[]" value="<?= htmlspecialchars($feature) ?>" required>
                                <button type="button" class="btn btn-danger remove-feature">X</button>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="content[]" placeholder="Feature" required>
                            <button type="button" class="btn btn-danger remove-feature">X</button>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="button" class="btn btn-success btn-sm" id="add-feature">+ Add Feature</button>
            </div>

            <button type="submit" class="btn btn-primary">Update Plan</button>
            <a href="/admin/pricing" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-feature').click(function() {
                $('#features-container').append(`
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="content[]" placeholder="Feature" required>
                        <button type="button" class="btn btn-danger remove-feature">X</button>
                    </div>
                `);
            });

            $(document).on('click', '.remove-feature', function() {
                if ($('.input-group').length > 1) {
                    $(this).closest('.input-group').remove();
                } else {
                    alert('At least one feature is required.');
                }
            });
        });
    </script>
    <?php include('backend/admin/partials/toastr.php'); ?>
</body>

</html>
