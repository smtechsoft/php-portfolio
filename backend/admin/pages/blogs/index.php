<?php

use App\Features\Admin\AdminBlog;

$blog = new AdminBlog();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$allBlogs = $blog->getAllBlogs(2, $page);
$blogs = $allBlogs['rows'];
$totalPage = $allBlogs['totalPages'];
$currentPage = $allBlogs['currentPage'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php
    include('backend/admin/partials/header.php');
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($blogs)): ?>
            <?php foreach ($blogs as $blog): ?>
            <tr>
                <th scope="row">1</th>
                <td>
                    <?= $blog->thumbnail ?>
                </td>
                <td><?= $blog->title ?></td>
                <td>
                    <a href="/admin/blogs/edit/<?= $blog->slug ?>">edit</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-blog-id="<?= $blog->id ?>" id="deleteBtn">
                        delete
                    </button>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </a>
            </li>
            <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <li class="page-item">
                <a class="page-link <?php if ($i == $currentPage) echo 'active'; ?>" href="/admin/blogs?page=<?= $i ?>">
                    <?= $i ?>
                </a>
            </li>
            <?php endfor; ?>
            <li class=" page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </li>
        </ul>
    </nav>


    <!-- Delete Modal start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>
                        do you want to delete this item?
                    </h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/request/backend/blog" method="post" id="blogDeleteConfirm">
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal end -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>



    <script>
    let blogid = null;
    let deleteBtn = $('#deleteBtn')
    let deleteform = $('#blogDeleteConfirm')
    deleteBtn.on('click', function() {
        blogid = $(this).data('blog-id')
        alert(blogid)
    })
    deleteform.on('submit', function(e) {
        e.preventDefault();
        alert('deleting blog id: ' + blogid)
    })
    </script>
</body>

</html>