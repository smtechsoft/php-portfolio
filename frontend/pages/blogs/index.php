<?php

use App\Features\Frontend\Blog;

$blog = new Blog();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$allBlogs = $blog->getAllBlogs(2, $page);
$blogs = $allBlogs['rows'];
$totalPage = $allBlogs['totalPages'];
$currentPage = $allBlogs['currentPage'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <?php include('frontend/partials/utils/meta.php'); ?>

    <!-- TEMPLATE META -->
    <meta name="title" content="Portlab - Personal Portfolio Bootstrap HTML Template">
    <meta name="keywords"
        content="portlab, portfolio, personal, html, template, bootstrap, bussiness, clean, creative, resume, cv, designer, responsive, minimal, freelancer">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Portlab - Blogs</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR FAVICON -->
    <?php include('frontend/partials/utils/fav.php'); ?>
    <?php include('frontend/partials/css/css.php'); ?>

    <!-- FOR BLOG LIST PAGE -->
    <link rel="stylesheet" href="<?php $asset->frontendAsset('css/custom/blog-list.css') ?>">
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <!--=====================================
                BACK2TOP BUTTON PART START
        =======================================-->
    <?php include('frontend/partials/layout/backToTop.php'); ?>
    <!--=====================================
                BACK2TOP BUTTON PART END
        =======================================-->


    <!--=====================================
                    NAVBAR PART START
        =======================================-->
    <?php include('frontend/partials/layout/header.php'); ?>
    <!--=====================================
                    NAVBAR PART END
        =======================================-->


    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner">
        <div class="single-oly">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h1>Blog List</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog-list</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


    <!--=====================================
                    BLOG LIST PART START
        =======================================-->
    <section class="blog-list-part">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <?php if (!empty($blogs)):  ?>
                        <?php foreach ($blogs as $blog): ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="frontend/assets/images/blog/01.jpg" alt="blog-1">
                                    <div class="blog-oly">
                                        <p>html, css</p>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="fas fa-clock"></i>
                                            <p>02 feb 2020</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-share-alt"></i>
                                            <p>5 share</p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="/blogs/<?= $blog->slug ?>"><?= $blog->title ?></a></h4>
                                    </div>
                                    <ul class="blog-link">
                                        <li>
                                            <a class="btn btn-inline" href="/blogs/<?= $blog->slug ?>">read more</a>
                                        </li>
                                        <li>
                                            <i class="fas fa-comments"></i>
                                            <p>13 comments</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                                <li class="page-item">
                                    <a class="page-link <?php if ($i == $currentPage) echo 'active'; ?>"
                                        href="/blogs?page=<?= $i ?>">
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="blog-src">
                                <input type="text" placeholder="Search...">
                                <button><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-md-7 col-lg-12">
                            <div class="blog-filter">
                                <h4>popular post</h4>
                                <div class="blog-suggest">
                                    <div class="suggest-img">
                                        <a href="#"><img src="frontend/assets/images/blog-suggest/01.jpg"
                                                alt="suggest-1"></a>
                                    </div>
                                    <div class="suggest-content">
                                        <div class="suggest-title">
                                            <h6><a href="#">Business contents insurance is a type of business.</a>
                                            </h6>
                                        </div>
                                        <div class="suggest-date">
                                            <i class="fas fa-clock"></i>
                                            <p>02 feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-suggest">
                                    <div class="suggest-img">
                                        <a href="#"><img src="frontend/assets/images/blog-suggest/02.jpg"
                                                alt="suggest-2"></a>
                                    </div>
                                    <div class="suggest-content">
                                        <div class="suggest-title">
                                            <h6><a href="#">Business contents insurance is a type of business.</a>
                                            </h6>
                                        </div>
                                        <div class="suggest-date">
                                            <i class="fas fa-clock"></i>
                                            <p>02 feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-suggest">
                                    <div class="suggest-img">
                                        <a href="#"><img src="frontend/assets/images/blog-suggest/03.jpg"
                                                alt="suggest-3"></a>
                                    </div>
                                    <div class="suggest-content">
                                        <div class="suggest-title">
                                            <h6><a href="#">Business contents insurance is a type of business.</a>
                                            </h6>
                                        </div>
                                        <div class="suggest-date">
                                            <i class="fas fa-clock"></i>
                                            <p>02 feb 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-12">
                            <div class="blog-filter">
                                <h4>Top categories</h4>
                                <ul class="blog-cate">
                                    <li>
                                        <h5><a href="#">Technology</a></h5>
                                        <p>23</p>
                                    </li>
                                    <li>
                                        <h5><a href="#">Education</a></h5>
                                        <p>17</p>
                                    </li>
                                    <li>
                                        <h5><a href="#">Business</a></h5>
                                        <p>09</p>
                                    </li>
                                    <li>
                                        <h5><a href="#">Freelancing</a></h5>
                                        <p>12</p>
                                    </li>
                                    <li>
                                        <h5><a href="#">Programing</a></h5>
                                        <p>42</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="blog-filter">
                                <h4>Best tags</h4>
                                <ul class="blog-tag">
                                    <li><a href="#">domain</a></li>
                                    <li><a href="#">cloud</a></li>
                                    <li><a href="#">web</a></li>
                                    <li><a href="#">payment</a></li>
                                    <li><a href="#">E-commerce</a></li>
                                    <li><a href="#">Sequerity</a></li>
                                    <li><a href="#">solution</a></li>
                                    <li><a href="#">offer</a></li>
                                    <li><a href="#">support</a></li>
                                    <li><a href="#">knowladge</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="blog-filter">
                                <h4>follow us</h4>
                                <ul class="blog-icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog-ad">
                                <a href="#"><img src="frontend/assets/images/banner/ads.jpg" alt="ad-banner"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    BLOG LIST PART END
        =======================================-->


    <!--=====================================
                    FOOTER PART START
        =======================================-->
    <?php include('frontend/partials/layout/footer.php'); ?>
    <!--=====================================
                    FOOTER PART END
        =======================================-->


    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- FOR BOOTSTRAP -->
    <?php include('frontend/partials/js/bootstrap.php'); ?>

    <!-- FOR INTERACTION -->
    <?php include('frontend/partials/js/main.php'); ?>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>