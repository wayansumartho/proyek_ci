<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekam Medis | Login </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel=" stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">
    <!-- Icon Tab -->
    <link href="<?php echo base_url('assets/images/logo.png'); ?>" rel="shortcut icon">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?php echo base_url('vendors/pnotify/dist/pnotify.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/pnotify/dist/pnotify.buttons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/login/login.css'); ?>" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <!-- The HTML5 video element that will create the background video on the header -->
                <video playsinline="playsinline" id="myVideo" autoplay="autoplay" muted="muted" loop="loop">
                    <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
                </video>
                <section class="login_content">

                    <form method="POST" action="<?php echo site_url('Login/aksi_login'); ?>">
                        <h1>Rekam Medis <li class="fa fa-heartbeat"> </li>
                        </h1>

                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
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
                        <div>
                            <br>
                            <br>
                        </div>

                        <div>
                            <button type="submit" class="col 4 btn btn-round btn-primary">Login</button>

                        </div>

                        <div class="clearfix"></div>



                    </form>

                </section>
            </div>

        </div>
    </div>
</body>

</html>