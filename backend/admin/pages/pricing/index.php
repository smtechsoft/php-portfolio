<?php

use App\Features\Admin\AdminPricing;

$pricing = new AdminPricing();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$allPlans = $pricing->getAllPricingPlans(10, $page);
$plans = $allPlans['rows'];
$totalPage = $allPlans['totalPages'];
$currentPage = $allPlans['currentPage'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php
    include('backend/admin/partials/header.php');
    ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Pricing Plans</h2>
            <a href="/admin/pricing/create" class="btn btn-primary">Create New Plan</a>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($plans)): ?>
                    <?php foreach ($plans as $plan): ?>
                        <tr>
                            <th scope="row"><?= $plan->id ?></th>
                            <td><?= htmlspecialchars($plan->name) ?></td>
                            <td><?= htmlspecialchars($plan->price) ?></td>
                            <td>
                                <a href="/admin/pricing/edit/<?= $plan->slug ?>" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger deleteBtn" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="<?= $plan->id ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No pricing plans found.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php if ($totalPage > 1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="/admin/pricing?page=<?= $currentPage - 1 ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="/admin/pricing?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= $currentPage >= $totalPage ? 'disabled' : '' ?>">
                    <a class="page-link" href="/admin/pricing?page=<?= $currentPage + 1 ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this pricing plan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="/request/backend/pricing/delete" method="post">
                        <input type="hidden" name="id" id="deleteId">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.deleteBtn').on('click', function() {
            $('#deleteId').val($(this).data('id'));
        });
    </script>
    <?php include('backend/admin/partials/toastr.php'); ?>
</body>

</html>
