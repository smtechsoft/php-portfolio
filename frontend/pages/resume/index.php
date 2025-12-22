<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <?php include('frontend/partials/utils/meta.php'); ?>

    <!-- TEMPLATE META -->
    <meta name="title" content="Portlab - Personal Portfolio Bootstrap HTML Template">
    <meta name="keywords"
        content="portlab, portfolio, personal, html, template, bootstrap, bussiness, clean, creative, resume, cv, designer, responsive, minimal, freelancer">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Portlab - Resume</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR FAVICON -->
    <?php include('frontend/partials/utils/fav.php'); ?>
    <?php include('frontend/partials/css/css.php'); ?>

    <!-- FOR INDEX PAGE -->
    <link rel="stylesheet" href="<?php $asset->frontendAsset('css/custom/resume.css') ?>">
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
                            <h1>My Resume</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">resume</li>
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
                    ABOUT PART START
        =======================================-->
    <section class="section about-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>about <span>myself</span></p>
                        <h2>Some basic information about myself</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-summery">
                        <h3>I'm Mahmudul hasan (miron)</h3>
                        <p>I’m with broad technical skill-set, very strong attention to detail, and 3 years of
                            experience in front-end web development. Able to multitask and juggle multiple pressing
                            projects simultaneously. On top of the latest trends and technologies. Ability to improvise,
                            troubleshoot, take ownership, and most importantly learn new skills on the job.</p>
                    </div>
                    <div class="about-list">
                        <ul>
                            <li>
                                <h6>Birthday:</h6>
                                <p>02 Februray 1995</p>
                            </li>
                            <li>
                                <h6>Lives in:</h6>
                                <p>Narayanganj, Bangladesh</p>
                            </li>
                            <li>
                                <h6>Website:</h6>
                                <p>www.mironmahmud.com</p>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <h6>Phone:</h6>
                                <p>(+880) 1838288389</p>
                            </li>
                            <li>
                                <h6>Skype:</h6>
                                <p>live:mironhasan018</p>
                            </li>
                            <li>
                                <h6>Linkedin:</h6>
                                <p>/mironmahmud</p>
                            </li>
                        </ul>
                    </div>
                    <div class="about-btn duel-btn">
                        <a class="btn btn-inline" href="images/miron-cv.pdf" download>
                            <i class="fas fa-download"></i>
                            <span>Download CV</span>
                        </a>
                        <a class='btn btn-inline' href='contact.html'>
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
    <section class="section exper-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>experience</span></p>
                        <h2>Something about my work experience</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Frontend Developer</h4>
                                <h5>creative-it Institute</h5>
                                <h6>Feb 2016 - Dec 2017</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Frontend Developer</h4>
                                <h5>Ingenious-hub Team</h5>
                                <h6>Feb 2017 - Dec 2018</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Frontend Developer</h4>
                                <h5>Icon-Infotech Limited</h5>
                                <h6>Feb 2018 - Dec 2019</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Frontend Developer</h4>
                                <h5>Xpeedstudio</h5>
                                <h6>Feb 2019 - Dec 2020</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    EXPERIENCE PART END
        =======================================-->


    <!--=====================================
                    EDUCATION PART START
        =======================================-->
    <section class="section edu-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>qualification</span></p>
                        <h2>Something about my qualification</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>B.S.S Honours at Economics</h4>
                                <h5>Government Tolaram college</h5>
                                <h6>Apr 2017 - Running</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Alim / H.S.C at Humanities</h4>
                                <h5>Government Madrasha-E Alia</h5>
                                <h6>jan 2015 - feb 2017</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>Dakhil / S.S.C at Humanities</h4>
                                <h5>Islami Mission Kamil Madrasha</h5>
                                <h6>jan 2013 - dec 2015</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="resume-card">
                        <div class="resume-content">
                            <div class="resume-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="resume-meta">
                                <h4>J.D.C / J.S.C</h4>
                                <h5>Badarpur Senior Alim Madrasha</h5>
                                <h6>jan 2011 - dec 2013</h6>
                            </div>
                        </div>
                        <div class="resume-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Quibusdam possimus vero explicabo
                                quas numquam harum voluptas itaque error et perspiciatis eos fuga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    EDUCATION PART END
        =======================================-->


    <!--=====================================
                    REFERENCE PART START
        =======================================-->
    <section class="section refer-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <p>my <span>reference</span></p>
                        <h2>Few referal persons information</h2>
                    </div>
                </div>
            </div>
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