<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>RAMIREZ - Resume / CV / </title>

        <!-- Icon css link -->
        <link href="<?= base_url() ?>assets/frontend/vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendors/linears-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="<?= base_url() ?>assets/frontend/vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendors/animate-css/animate.css" rel="stylesheet">
        
        <link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/css/responsive.css" rel="stylesheet">
        
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/default.css" title="default">
        <link rel="alternate stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/orange.css" title="orange">
        <link rel="alternate stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/pink.css" title="pink">
        <link rel="alternate stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/violet.css" title="violet">
        <link rel="alternate stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/blue.css" title="blue">
        <link rel="alternate stylesheet" href="<?= base_url() ?>assets/frontend/css/colors/past.css" title="past">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="light_bg" data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="80" data-scroll-animation="true">
       
        <div id="preloader">
            <div id="preloader_spinner">
                <div class="spinner"></div>
            </div>
        </div>
        
        <!--================ Frist hader Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/frontend/img/logo.png" alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#about">ABOUT ME </a></li>
                            <li><a href="#skill">Skill</a></li>
                            <li><a href="#education">Education</a></li>
                            <li><a href="#portfolio">PORTFOLIO</a></li>
                            <li><a href="#contact">CONTACT</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </header>
        <!--================End Footer Area =================-->
        
        <!--================Total container Area =================-->
        <div class="container main_container">
            <div class="content_inner_bg row m0">
                <section class="about_person_area pad" id="about">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="person_img">
                                
                                <?php foreach ($recordFotoBiodata as $no => $val): ?>
                                    <img src="<?= base_url() ?>uploads/<?= $val['isi_biodata'] ?>" alt="">
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row person_details">
                                <?php foreach ($recordBiodata as $no => $val): ?>
                                    <?php if($val['tipe_biodata'] == 'judul'): ?>
                                        <h3><?= $val['judul_biodata'] ?></h3>
                                        <h4><?= $val['isi_biodata'] ?></h4>
                                    <?php elseif($val['tipe_biodata'] == 'panjang'): ?>
                                        <p><?= $val['isi_biodata'] ?></p>
                                    <?php elseif($val['tipe_biodata'] == 'pendek'): ?>
                                        <div class="person_information">
                                            <table width="100%">
                                                <tr>
                                                    <td><?= $val['judul_biodata'] ?></td>
                                                    <td><?= $val['isi_biodata'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="myskill_area pad" id="skill">
                    <div class="main_title">
                        <h2>My Skill</h2>
                    </div>
                    <div class="row">
                    
                        <?php foreach ($recordAnggota as $no => $val): ?>
                            <?php
			                    $skill = controller::select('anggota_keahlian', ['id_anggota' => $val['id_anggota']]);
                            ?>
                            <div class="col-md-4 wow fadeInUp animated">
                                <div class="skill_text">
                                    <h4><?= $val['nama_anggota'] ?></h4>
                                </div>
                                <div class="skill_item_inner">
                                    <?php foreach ($skill as $nom => $vall): ?>
                                        <div class="single_skill">
                                            <h4><?= $vall['nama_keahlian'] ?></h4>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $vall['persentase_keahlian'] ?>" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress_parcent"><span class="counter"><?= $vall['persentase_keahlian'] ?></span>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <section class="education_area pad" id="education">
                    <div class="main_title">
                        <h2>Education</h2>
                    </div>
                    <div class="education_inner_area">
                        <?php foreach ($recordPengalaman as $no => $val): ?>
                            <div class="education_item wow fadeInUp animated" data-line="<?= substr($val['nama_anggota'], 0, 1) ?>">
                                <h6><?= $val['dari_tahun_pengalaman']."-".$val['sampai_tahun_pengalaman'] ?></h6>
                                <a href="#"><h4><?= $val['nama_pengalaman'] ?></h4></a>
                                <h5><?= $val['tempat_pengalaman'] ?></h5>
                                <p><?= $val['teks_pengalaman'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <section class="portfolio_area pad" id="portfolio">
                    <div class="main_title">
                        <h2>Portfolio</h2>
                    </div>
                    <div class="porfolio_menu">
                        <ul class="causes_filter">
                            <li class="active" data-filter="*"><a href="">All</a></li>
                            <li data-filter=".photography"><a href="">Photography</a></li>
                            <li data-filter=".design"><a href="">Design</a></li>
                            <li data-filter=".marketing"><a href="">Marketing</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="portfolio_list_inner">
                            <?php $i = 1 ?>
                            <?php foreach ($recordGaleri as $no => $val): ?>
                                <div class="col-md-4 photo <?= $val['kategori_galeri'] ?>">
                                <div class="portfolio_item">
                                    <div class="portfolio_img">
                                        <img src="<?= base_url()."uploads/".$val['path_galeri']?>" alt="">
                                    </div>
                                    <div class="portfolio_title">
                                        <a href="#"><h4><?= $val['judul_galeri'] ?></h4></a>
                                        <h5><?= $val['kategori_galeri'] ?></h5>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; 
                            if ($i == 6) {
                                break;
                            } ?>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </section>
                <section class="contact_area pad" id="contact">
                    <div class="main_title">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left_contact_details wow fadeInUp animated">
                                <div class="contact_title">
                                    <h3>Contact Info</h3>
                                </div>
                                <p><?= $recordKontak->teks_kontak ?></p>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Address</h4>
                                        <p><?= $recordKontak->alamat_kontak ?></p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Phone</h4>
                                        <p><?= $recordKontak->nomor_kontak ?></p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Email</h4>
                                        <p><?= $recordKontak->email_kontak ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact_from_area wow fadeInUp animated">
                                <div class="contact_title">
                                    <h3>Send Message</h3>
                                </div>
                                <div class="row">
                                    <form action="<?= base_url('?c=home') ?>" method="post" id="contactForm">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="First Name*">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="last" id="last" placeholder="Last Name*">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email*">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" rows="1" id="message" name="message" placeholder="Write Message"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-default contact_btn" type="submit" name="submit"><span>Send Massage</span></button>
                                        </div>
                                    </form>
                                    <div id="success">
                                        <p>Your text message sent successfully!</p>
                                    </div>
                                    <div id="error">
                                        <p>Sorry! Message not sent. Something went wrong!!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--================Map Area =================-->
                <div id="mapBox" class="mapBox row m0" 
                data-lat="37.3818288" 
                data-lon="-122.0658212" 
                data-zoom="13"></div>
                <!--================End Map Area =================-->
            </div>
        </div>
        <!--================End Total container Area =================-->
        
        <!--================footer Area =================-->
        <footer class="footer_area">
            <div class="footer_inner">
                <div class="container">
                    <img src="<?= base_url() ?>assets/frontend/img/footer-logo.png" alt="">
                    <ul class="social_icon">
                        <?php foreach ($recordSosial as $no => $val): ?>
                            <?php if($val['nama_sosial'] == 'facebook'): ?>
                                <li><a href="<?= $val['url_sosial'] ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php elseif($val['nama_sosial'] == 'twitter'): ?>
                                <li><a href="<?= $val['url_sosial'] ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php elseif($val['nama_sosial'] == 'instagram'): ?>
                                <li><a href="<?= $val['url_sosial'] ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php else: ?>
                                <li><a href="<?= $val['url_sosial'] ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="footer_copyright">
                <div class="container">
                    <div class="pull-left">
                        <h5><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p></h5>
                    </div>
                    <div class="pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#">ABOUT ME </a></li>
                            <li><a href="#">Skill</a></li>
                            <li><a href="#">Education</a></li>
                            <li><a href="#">PORTFOLIO</a></li>
                            <li><a href="#">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End footer Area =================-->
        
        <div class="envalab-style-switch" id="switch-style">
            <div class="switch-button" id="toggle-switcher"><i class="fa fa-gears"></i></div>
            <div class="switched-options">
                <div class="config-title">Color Panel </div>
                <ul class="styles">
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("default"),!1' title="default"></a>
                    </li>
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("orange"),!1' title="orange"></a>
                    </li>
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("pink"),!1' title="pink"></a>
                    </li>
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("violet"),!1' title="violet"></a>
                    </li>
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("blue"),!1' title="blue"></a>
                    </li>
                    <li>
                        <a href=# onclick='return setActiveStyleSheet("past"),!1' title="past"></a>
                    </li>
                </ul>
            </div>
        </div>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url() ?>assets/frontend/js/jquery-2.1.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
        <!-- Extra plugin js -->
        <script src="<?= base_url() ?>assets/frontend/vendors/counter-up/waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/vendors/owl-carousel/owl.carousel.min.js"></script>
        
        <script src="<?= base_url() ?>assets/frontend/vendors/style-switcher/styleswitcher.js"></script>
        <script src="<?= base_url() ?>assets/frontend/vendors/style-switcher/switcher-active.js"></script>
        
        <script src="<?= base_url() ?>assets/frontend/vendors/animate-css/wow.min.js"></script>

        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="<?= base_url() ?>assets/frontend/js/gmaps.min.js"></script>
        
        <!-- contact js -->
        <script src="<?= base_url() ?>assets/frontend/js/jquery.form.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/jquery.validate.min.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/contact.js"></script>
        
        <script src="<?= base_url() ?>assets/frontend/js/theme.js"></script>
    </body>
</html>