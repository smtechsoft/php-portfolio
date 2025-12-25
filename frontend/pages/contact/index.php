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
    <title>Portlab - Contact</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR FAVICON -->
    <?php include('frontend/partials/utils/fav.php'); ?>
    <?php include('frontend/partials/css/css.php'); ?>

    <!-- FOR CONTACT PAGE -->
    <link rel="stylesheet" href="<?php $asset->frontendAsset('css/custom/contact.css') ?>">
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
                  INNER BANNER PART START
        =======================================-->
    <section class="single-banner">
        <div class="single-oly">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h1>Contact</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                  INNER BANNER PART END
        =======================================-->


    <!--=====================================
                    CONTACT PART START
        =======================================-->
    <section class="section contact-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>contact <span>me</span></p>
                        <h2>I'm always open to discussion time spand</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 col-lg-4">
                    <div class="contact-address">
                        <div class="address-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="address-text">
                            <h4>phone</h4>
                            <p>(+880) 1838288389 <span>(+880) 1941101915</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="contact-address">
                        <div class="address-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="address-text">
                            <h4>email</h4>
                            <p>mironcoder@gmail.com <span>mironbonny1994@gmail.com</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="contact-address">
                        <div class="address-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="address-text">
                            <h4>location</h4>
                            <p>1420 East Delpara <span>Narayanganj, Bangladesh</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-7">
                    <form method="post" action="/request/frontend/contact">
                        <input type="text" hidden name="form_page" value="contaact_page">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    <?php if (isset($_GET['name_error'])): ?>
                                        <p class="text-danger"><?= $_GET['name_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                    <?php if (isset($_GET['email_error'])): ?>
                                        <p class="text-danger"><?= $_GET['email_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                    <?php if (isset($_GET['subject_error'])): ?>
                                        <p class="text-danger"><?= $_GET['subject_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                    <?php if (isset($_GET['message_error'])): ?>
                                        <p class="text-danger"><?= $_GET['message_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button class="btn btn-inline" type="submit">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>send message</span>
                                    </button>
                                    <?php if (isset($_GET['success'])): ?>
                                        <p class="text-success"><?= $_GET['success']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="contact-img">
                        <img src="frontend/assets/images/banner/contact.png" alt="contact">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    CONTACT PART END
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