<?php

use App\Features\Frontend\Social;
use App\Features\Frontend\About;
use App\Features\Frontend\Experience;
use App\Features\Frontend\Education;
use App\Features\Frontend\Pricing;

$social = new Social();
$about = new About();
$experience = new Experience();
$education = new Education();
$pricing = new Pricing();
$socialResults = $social->getAllSocialLinks();
$aboutResult = $about->info();
$experienceResults = $experience->getAllExperiences();
$educationResults = $education->getAllEducations();
$pricingResults = $pricing->getAllPricingPlans();

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
    <title>Portlab - Home</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR FAVICON -->
    <?php include('frontend/partials/utils/fav.php'); ?>
    <?php include('frontend/partials/css/css.php'); ?>

    <!-- FOR INDEX PAGE -->
    <link rel="stylesheet" href="frontend/assets/css/custom/index.css">
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
                    BANNER PART START
        =======================================-->
    <section class="banner-part">
        <div class="banner-bg">
            <div class="container">
                <img class="circle-shape" src="frontend/assets/images/assets/circle.png" alt="circle">
                <img class="star-shape" src="frontend/assets/images/assets/star.png" alt="star">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-img">
                            <img src="frontend/assets/images/banner/hero.png" alt="hero">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-content">
                            <ul class="banner-icon">
                                <?php if (!empty($socialResults)):  ?>
                                <?php foreach ($socialResults as $social): ?>
                                <li><a class="icon icon-inline" href="<?= $social->social_link ?>"><i
                                            class="<?= $social->icon ?> "></i></a>
                                </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="banner-text">
                                <span>Welcome dear!</span>
                                <?php if ($aboutResult): ?>
                                <h2><?= $aboutResult->short_about ?></h2>
                                <?php endif; ?>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->about ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="banner-btn duel-btn">
                                <a class='btn btn-inline' href='/resume'>
                                    <i class="fas fa-arrows-alt"></i>
                                    <span>know more</span>
                                </a>
                                <a class='btn btn-inline' href='/portfolio'>
                                    <i class="fas fa-boxes"></i>
                                    <span>demo work</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    BANNER PART END
        =======================================-->


    <!--=====================================
                    RESUME PART START
        =======================================-->
    <section class="section resume-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>resume</span></p>
                        <h2>Some basic information about myself</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="resume-cate-btn">
                        <li>
                            <button class="cate-btn active" onclick="filter('about-part')">
                                <i class="fas fa-user"></i>
                                <span>about me</span>
                            </button>
                        </li>
                        <li>
                            <button class="cate-btn" onclick="filter('exper-part')">
                                <i class="fas fa-user-tie"></i>
                                <span>experience</span>
                            </button>
                        </li>
                        <li>
                            <button class="cate-btn" onclick="filter('edu-part')">
                                <i class="fas fa-user-graduate"></i>
                                <span>education</span>
                            </button>
                        </li>
                        <li>
                            <button class="cate-btn" onclick="filter('refer-part')">
                                <i class="fas fa-users"></i>
                                <span>reference</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    RESUME PART END
        =======================================-->


    <!--=====================================
                    ABOUT PART START
        =======================================-->
    <section class="section about-part cate-active">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-summery">
                        <?php if ($aboutResult): ?>
                        <h3><?= $aboutResult->short_about ?></h3>
                        <?php endif; ?>
                        <?php if ($aboutResult): ?>
                        <p><?= $aboutResult->about ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="about-list">
                        <ul>
                            <li>
                                <h6>Birthday:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->birthday ?></p>
                                <?php endif; ?>
                            </li>
                            <li>
                                <h6>Lives in:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->location ?></p>
                                <?php endif; ?>
                            </li>
                            <li>
                                <h6>Website:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->github ?></p>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <h6>Phone:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->whatsapp ?></p>
                                <?php endif; ?>
                            </li>
                            <li>
                                <h6>Skype:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->skype ?></p>
                                <?php endif; ?>
                            </li>
                            <li>
                                <h6>Linkedin:</h6>
                                <?php if ($aboutResult): ?>
                                <p><?= $aboutResult->linkedin ?></p>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="about-btn duel-btn">
                        <a class="btn btn-inline" href="images/miron-cv.pdf" download>
                            <i class="fas fa-download"></i>
                            <span>Download CV</span>
                        </a>
                        <a class='btn btn-inline' href='/contact'>
                            <i class="fas fa-headset"></i>
                            <span>contact me</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="frontend/assets/images/banner/about.png" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    ABOUT PART END
        =======================================-->


    <!--=====================================
                    EXPERIENCE PART START
        =======================================-->
    <section class="section exper-part cate-active">
        <div class="container">
            <div class="row">
                <?php if (!empty($experienceResults)): ?>
                <?php foreach ($experienceResults as $experience): ?>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="resume-meta">
                                <h4><?= $experience->title ?></h4>
                                <h5><?= $experience->company_name ?></h5>
                                <h6><?= $experience->starting_date ?> - <?= $experience->ending_date ?>/h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p><?= $experience->description ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--=====================================
                    EXPERIENCE PART END
        =======================================-->


    <!--=====================================
                    EDUCATION PART START
        =======================================-->
    <section class="section edu-part cate-active">
        <div class="container">
            <div class="row">
                <?php if (!empty($educationResults)): ?>
                <?php foreach ($educationResults as $education): ?>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="resume-meta">
                                <h4><?= $education->title ?></h4>
                                <h5><?= $education->academy_name ?></h5>
                                <h6><?= $education->starting_date ?>-<?= $education->ending_date ?></h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p><?= $education->description ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--=====================================
                    EDUCATION PART END
        =======================================-->


    <!--=====================================
                    REFERENCE PART START
        =======================================-->
    <section class="section refer-part cate-active">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="refer-card">
                        <div class="refer-img">
                            <img src="frontend/assets/images/reference/01.jpg" alt="reference">
                        </div>
                        <div class="refer-content">
                            <h4>Maccelam Bond</h4>
                            <p>Sr. Ux / Ui Designer <span>at Creative It Institute</span></p>
                            <ul class="refer-contact">
                                <li><a class="icon icon-inline" href="#"><i class="fas fa-phone-alt"></i></a></li>
                                <li><a class="icon icon-inline" href="#"><i class="fas fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="refer-card">
                        <div class="refer-img">
                            <img src="frontend/assets/images/reference/02.jpg" alt="reference">
                        </div>
                        <div class="refer-content">
                            <h4>Lady Watsona</h4>
                            <p>Deputy Manager <span>at Icon Infotech LTD</span></p>
                            <ul class="refer-contact">
                                <li><a class="icon icon-inline" href="#"><i class="fas fa-phone-alt"></i></a></li>
                                <li><a class="icon icon-inline" href="#"><i class="fas fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    REFERENCE PART END
        =======================================-->


    <!--=====================================
                    SERVICE PART START
        =======================================-->
    <section class="section service-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>services</span></p>
                        <h2>I'm very passionate under about this services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <h3>01</h3>
                        <span class="flaticon-seo"></span>
                        <i class="flaticon-seo"></i>
                        <h4>web development</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card service-ghape">
                        <h3>02</h3>
                        <span class="flaticon-development"></span>
                        <i class="flaticon-development"></i>
                        <h4>software development</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <h3>03</h3>
                        <span class="flaticon-smartphone"></span>
                        <i class="flaticon-smartphone"></i>
                        <h4>app development</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <h3>04</h3>
                        <span class="flaticon-artwork"></span>
                        <i class="flaticon-artwork"></i>
                        <h4>graphics design</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card service-ghape">
                        <h3>05</h3>
                        <span class="flaticon-computer"></span>
                        <i class="flaticon-computer"></i>
                        <h4>ui/ux design</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <h3>06</h3>
                        <span class="flaticon-promotion"></span>
                        <i class="flaticon-promotion"></i>
                        <h4>digital marketing</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Non neque voluptate esse in nobis
                            eius commodi mollitia voluptatem</p>
                        <a href='service-details.html'>view details</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-btn">
                        <a class="btn btn-inline" href="service.html">
                            <i class="far fa-eye"></i>
                            <span>view all list</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    SERVICE PART END
        =======================================-->


    <!--=====================================
                    CODING PART START
        =======================================-->
    <section class="section coding-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>coding <span>structure</span></p>
                        <h2>How do I organize of my coding structure</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="coding-content">
                        <h3>Build your SAAS landing page using the <span>intelligent BEM interface</span></h3>
                        <p>Blocks, Elements and Modifiers. A smart HTML/CSS structure that can easely be reused. Layout
                            driven by the purpose of modularity.</p>
                    </div>
                    <ul class="coding-list">
                        <li>
                            <span class="coding-round"></span>
                            <p>Simple and Smart HTML code structure</p>
                        </li>
                        <li>
                            <span class="coding-round"></span>
                            <p>Works reintegrated in any part of the layout</p>
                        </li>
                        <li>
                            <span class="coding-round"></span>
                            <p>Reuse the elements from one design to another</p>
                        </li>
                        <li>
                            <span class="coding-round"></span>
                            <p>Looks good on all devices Responsive code</p>
                        </li>
                        <li>
                            <span class="coding-round"></span>
                            <p>Meaningful comment in each section</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="coding-img">
                        <img src="frontend/assets/images/banner/coding.jpg" alt="coding">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    CODING PART END
        =======================================-->


    <!--=====================================
                    PORTFOLIO PART START
        =======================================-->
    <section class="section port-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>portfolio</span></p>
                        <h2>Take a look some of my featured projects</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="port-slider">
                        <div class="port-card">
                            <div class="port-img">
                                <img src="frontend/assets/images/portfolio/01.jpg" alt="portfolio">
                            </div>
                            <div class="port-oly">
                                <div class="port-btn">
                                    <a class="btn btn-inline" href="#">live preview</a>
                                    <a class="btn btn-inline" href="#">view details</a>
                                </div>
                                <div class="port-text">
                                    <h6>Corporate website</h6>
                                </div>
                            </div>
                        </div>
                        <div class="port-card">
                            <div class="port-img">
                                <img src="frontend/assets/images/portfolio/02.jpg" alt="portfolio">
                            </div>
                            <div class="port-oly">
                                <div class="port-btn">
                                    <a class="btn btn-inline" href="#">live preview</a>
                                    <a class="btn btn-inline" href="#">view details</a>
                                </div>
                                <div class="port-text">
                                    <h6>App landing page</h6>
                                </div>
                            </div>
                        </div>
                        <div class="port-card">
                            <div class="port-img">
                                <img src="frontend/assets/images/portfolio/03.jpg" alt="portfolio">
                            </div>
                            <div class="port-oly">
                                <div class="port-btn">
                                    <a class="btn btn-inline" href="#">live preview</a>
                                    <a class="btn btn-inline" href="#">view details</a>
                                </div>
                                <div class="port-text">
                                    <h6>Job marketplace</h6>
                                </div>
                            </div>
                        </div>
                        <div class="port-card">
                            <div class="port-img">
                                <img src="frontend/assets/images/portfolio/04.jpg" alt="portfolio">
                            </div>
                            <div class="port-oly">
                                <div class="port-btn">
                                    <a class="btn btn-inline" href="#">live preview</a>
                                    <a class="btn btn-inline" href="#">view details</a>
                                </div>
                                <div class="port-text">
                                    <h6>creative agency</h6>
                                </div>
                            </div>
                        </div>
                        <div class="port-card">
                            <div class="port-img">
                                <img src="frontend/assets/images/portfolio/05.jpg" alt="portfolio">
                            </div>
                            <div class="port-oly">
                                <div class="port-btn">
                                    <a class="btn btn-inline" href="#">live preview</a>
                                    <a class="btn btn-inline" href="#">view details</a>
                                </div>
                                <div class="port-text">
                                    <h6>FM radio station</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="port-show-btn">
                        <a class='btn btn-inline' href='portfolio-list.html'>
                            <i class="far fa-eye"></i>
                            <span>show more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    PORTFOLIO PART END
        =======================================-->


    <!--=====================================
                    SKILLS PART START
        =======================================-->
    <section class="section skills-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>skills</span></p>
                        <h2>Expert in this technical web software</h2>
                    </div>
                </div>
            </div>
            <div class="row skills-parent">
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/html.png" alt="html">
                        </div>
                        <div class="skills-name">
                            <p>html</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/css.png" alt="css">
                        </div>
                        <div class="skills-name">
                            <p>css</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/javascript.png" alt="javascript">
                        </div>
                        <div class="skills-name">
                            <p>javascript</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/bootstrap.png" alt="bootstrap">
                        </div>
                        <div class="skills-name">
                            <p>bootstrap</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/jquery.png" alt="jquery">
                        </div>
                        <div class="skills-name">
                            <p>jquery</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/sass.png" alt="sass">
                        </div>
                        <div class="skills-name">
                            <p>sass</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/wordpress.png" alt="wordpress">
                        </div>
                        <div class="skills-name">
                            <p>wordpress</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/react.png" alt="react">
                        </div>
                        <div class="skills-name">
                            <p>react</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/github.png" alt="github">
                        </div>
                        <div class="skills-name">
                            <p>github</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/vscode.png" alt="vscode">
                        </div>
                        <div class="skills-name">
                            <p>vscode</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/photoshop.png" alt="photoshop">
                        </div>
                        <div class="skills-name">
                            <p>photoshop</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="skills-card">
                        <div class="skills-img">
                            <img src="frontend/assets/images/skill/illustrator.png" alt="illustrator">
                        </div>
                        <div class="skills-name">
                            <p>illustrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    SKILLS PART END
        =======================================-->


    <!--=====================================
                    DISCUSS PART START
        =======================================-->
    <section class="discuss-part">
        <div class="container">
            <div class="discuss-oly">
                <div class="row discuss-bg">
                    <div class="col-md-7 col-lg-8">
                        <div class="discuss-content">
                            <h3>Let’s discuss your idea</h3>
                            <p>Have a thought about your future website? I am always here.</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="discuss-btn">
                            <a class='btn btn-inline' href='contact.html'>
                                <i class="fas fa-paper-plane"></i>
                                <span>Get in Touch</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    DISCUSS PART END
        =======================================-->


    <!--=====================================
                    PRICING PART START
        =======================================-->
    <section class="section pricing-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>pricing <span>plan</span></p>
                        <h2>Pricing plan will be change by discussion</h2>
                    </div>
                </div>
        </div>
            <div class="row">
                <?php if (!empty($pricingResults)): ?>
                <?php foreach ($pricingResults as $plan): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-card">
                        <div class="pricing-money">
                            <h3><?= $plan->name ?></h3>
                            <h4><?= $plan->price ?></h4>
                            <p>per project</p>
                        </div>
                        <ul class="pricing-list">
                            <?php
                                    if (!empty($plan->features)):
                                        foreach ($plan->features as $feature):
                                    ?>
                            <li><?= $feature ?></li>
                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                        </ul>
                        <div class="pricing-btn">
                            <a class="btn btn-inline" href="#">
                                <i class="fas fa-paper-plane"></i>
                                <span>Purchase plan</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
    </section>
    <!--=====================================
                    PRICING PART END
        =======================================-->


    <!--=====================================
                    FAQ PART START
        =======================================-->
    <section class="section faq-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>faq <span>question</span></p>
                        <h2>Find your question before we work together</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="faq-parent">
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>What needs to be done to place your order ?</button>
                            </div>
                            <div class="faq-ans">
                                <p>psd / png / jpg / pdf / any source file or reference link must be provided. If
                                    nothing else, tell me your needs, likes, or thoughts.</p>
                            </div>
                        </div>
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>I don't have PSD and JPG but I have Idea...</button>
                            </div>
                            <div class="faq-ans">
                                <p>No problem, you will give me your idea and requirements of your website, in this case
                                    i'll help you to generate idea.</p>
                            </div>
                        </div>
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>What If I provide JPG file instant of PSD file ?</button>
                            </div>
                            <div class="faq-ans">
                                <p>In this case the photos will be used in the website will not have good quality. But I
                                    can provide you with similar photos with limited cost.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="faq-parent">
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>How long will I take to handover your project ?</button>
                            </div>
                            <div class="faq-ans">
                                <p>It depends on the complexity of your project but I've team so, I'm capable to finish
                                    your project faster than anyone else.</p>
                            </div>
                        </div>
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>If i don't get my project according to my requirement ?
                                </button>
                            </div>
                            <div class="faq-ans">
                                <p>Well It never happened. In this case i'll redesign for you if the design doesn't full
                                    fill your requirement.</p>
                            </div>
                        </div>
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>Do you use any automated Software conversion ?</button>
                            </div>
                            <div class="faq-ans">
                                <p>Never! All codes are hand-typed code with well commented and W3C Validated.</p>
                            </div>
                        </div>
                        <div class="faq-child">
                            <div class="faq-que">
                                <button>Will I get pixel perfect design ?</button>
                            </div>
                            <div class="faq-ans">
                                <p>Yes, You will get a pixel perfect and fresh design.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    FAQ PART END
        =======================================-->


    <!--=====================================
                    TESTIMONIAL PART START
        =======================================-->
    <section class="section testi-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>clients <span>qoute</span></p>
                        <h2>Received fantastic feedback from the clients</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testi-slider">
                        <div class="testi-card">
                            <i class="flaticon-favorites"></i>
                            <div class="testi-quote">
                                <p>Oustanding design and collaboration. I'm satisfied work with him.</p>
                            </div>
                            <div class="testi-meta">
                                <h5>austin houston</h5>
                                <p>new york, usa</p>
                                <a href="#"><img src="frontend/assets/images/testimonial/01.jpg" alt="testimonial"></a>
                            </div>
                        </div>
                        <div class="testi-card">
                            <i class="flaticon-favorites"></i>
                            <div class="testi-quote">
                                <p>Oustanding design and collaboration. I'm satisfied work with him.</p>
                            </div>
                            <div class="testi-meta">
                                <h5>devid whigtmore</h5>
                                <p>rome, Italy</p>
                                <a href="#"><img src="frontend/assets/images/testimonial/02.jpg" alt="testimonial"></a>
                            </div>
                        </div>
                        <div class="testi-card">
                            <i class="flaticon-favorites"></i>
                            <div class="testi-quote">
                                <p>Oustanding design and collaboration. I'm satisfied work with him.</p>
                            </div>
                            <div class="testi-meta">
                                <h5>sane galonhop</h5>
                                <p>dubai, uae</p>
                                <a href="#"><img src="frontend/assets/images/testimonial/03.jpg" alt="testimonial"></a>
                            </div>
                        </div>
                        <div class="testi-card">
                            <i class="flaticon-favorites"></i>
                            <div class="testi-quote">
                                <p>Oustanding design and collaboration. I'm satisfied work with him.</p>
                            </div>
                            <div class="testi-meta">
                                <h5>martin howelling</h5>
                                <p>toronto, canada</p>
                                <a href="#"><img src="frontend/assets/images/testimonial/04.jpg" alt="testimonial"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testi-btn">
                        <a class="btn btn-inline" href="#">
                            <i class="fas fa-tint"></i>
                            <span>drop your quote</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    TESTIMONIAL PART END
        =======================================-->


    <!--=====================================
                    BLOG PART START
        =======================================-->
    <section class="section blog-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>blogs</span></p>
                        <h2>Some article about my activity &amp; experience</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="frontend/assets/images/blog/01.jpg" alt="blog">
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
                                <h4><a href="#">Business contents insurance iure ipsam ratione is a type of
                                        business...</a></h4>
                            </div>
                            <ul class="blog-link">
                                <li>
                                    <a class="btn btn-inline" href="#">read more</a>
                                </li>
                                <li>
                                    <i class="fas fa-comments"></i>
                                    <p>13 comments</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="frontend/assets/images/blog/02.jpg" alt="blog">
                            <div class="blog-oly">
                                <p>javascript</p>
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
                                <h4><a href="#">Business contents insurance iure ipsam ratione is a type of
                                        business...</a></h4>
                            </div>
                            <ul class="blog-link">
                                <li>
                                    <a class="btn btn-inline" href="#">read more</a>
                                </li>
                                <li>
                                    <i class="fas fa-comments"></i>
                                    <p>13 comments</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-suggest">
                                <div class="suggest-img">
                                    <a href="#"><img src="frontend/assets/images/blog-suggest/01.jpg"
                                            alt="blog-suggest"></a>
                                </div>
                                <div class="suggest-content">
                                    <div class="suggest-title">
                                        <h6><a href="#">Business contents insurance is a type of business.</a></h6>
                                    </div>
                                    <div class="suggest-date">
                                        <i class="fas fa-clock"></i>
                                        <p>02 feb 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog-suggest">
                                <div class="suggest-img">
                                    <a href="#"><img src="frontend/assets/images/blog-suggest/02.jpg"
                                            alt="blog-suggest"></a>
                                </div>
                                <div class="suggest-content">
                                    <div class="suggest-title">
                                        <h6><a href="#">Business contents insurance is a type of business.</a></h6>
                                    </div>
                                    <div class="suggest-date">
                                        <i class="fas fa-clock"></i>
                                        <p>02 feb 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog-suggest">
                                <div class="suggest-img">
                                    <a href="#"><img src="frontend/assets/images/blog-suggest/03.jpg"
                                            alt="blog-suggest"></a>
                                </div>
                                <div class="suggest-content">
                                    <div class="suggest-title">
                                        <h6><a href="#">Business contents insurance is a type of business.</a></h6>
                                    </div>
                                    <div class="suggest-date">
                                        <i class="fas fa-clock"></i>
                                        <p>02 feb 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-btn">
                        <a class='btn btn-inline' href='blog-list.html'>
                            <i class="far fa-eye"></i>
                            <span>show more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    BLOG PART END
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
                    <form action="/request/frontend/contact" method="POST">
                        <input type="text" hidden name="form_page" value="home_page">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                    <?php if (isset($_GET['name_error'])): ?>
                                    <p class="text-danger"><?= $_GET['name_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <?php if (isset($_GET['email_error'])): ?>
                                    <p class="text-danger"><?= $_GET['email_error']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
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

    <!-- FOR SLICK SLIDER -->
    <?php include('frontend/partials/js/slick.php'); ?>

    <!-- FOR COUNTERUP -->
    <?php include('frontend/partials/js/counterup.php'); ?>

    <!-- FOR INTERACTION -->
    <?php include('frontend/partials/js/main.php'); ?>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>