<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Rekam Medis | Login </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/assets/assets/vendor/nucleo/css/nucleo.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css'); ?>" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/assets/assets/css/argon.css?v=1.2.0'); ?>" type="text/css">
    <!-- Icon Tab -->
    <link href="<?php echo base_url('assets/images/logo.png'); ?>" rel="shortcut icon">
    <link href="<?php echo base_url('assets/login/login.css'); ?>" rel="stylesheet">
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">


            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">


                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">

                    <li class="nav-item">

                        <h1 style="color: cornsilk;">Welcome User,</h1>
                        <h2 style="color: cornsilk;">let's go do the best today</h2>

                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">

            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- The HTML5 video element that will create the background video on the header -->
        <video playsinline="playsinline" id="myVideo" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?php echo base_url('assets/login/video/1.mp4'); ?>" type="video/mp4">
        </video>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h1>Rekam Medis <li class="fa fa-heartbeat"> </li>
                                </h1>
                            </div>
                            <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-text"> <?php echo $this->session->flashdata('pesan'); ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if (!empty($this->session->flashdata('pesan2'))) {; ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text"> <?php echo $this->session->flashdata('pesan2'); ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <form method="POST" action="<?php echo site_url('Login/aksi_login'); ?>">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input type="text" name="username" class="form-control" placeholder="Username" required="" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <select class="form-control" name="user" required>
                                            <option value="0">
                                                <p style="color: gray;">Pilih User</p>
                                            </option>
                                            <option value="admin">Admin</option>
                                            <option value="dokter">Dokter</option>
                                            <option value="apoteker">Apoteker</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="col-12 btn btn-primary my-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ</small></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-4">
                    <div class="copyright text-center text-xl-left text-muted">
                        <a href="#" class="text-light"><small>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ</small></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="copyright text-center text-xl-left text-muted">
                        <a href="#" class="text-light"><small>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ</small></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2021 <a href="#" style="color: cornsilk;" class="font-weight-bold ml-1" target="_blank">I Wayan Sumartho Alvari</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?php echo base_url('assets/login/assets/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/assets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/assets/assets/vendor/js-cookie/js.cookie.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/assets/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/assets/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js'); ?>"></script>
    <!-- Argon JS -->
    <script src="<?php echo base_url('assets/login/assets/assets/js/argon.js?v=1.2.0'); ?>"></script>
</body>

</html>