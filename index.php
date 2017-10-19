<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'assets/head.php'; ?>

</head>

<body id="page-top">

    

    <div class="landing">

        <?php include 'assets/navbar.php'; ?>
        
        <header>
            <div class="overlay">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1 id="homeHeading">Create your RaiBlocks web wallet</h1>
                        <hr>
                        <p>
                            RaiWebWallet is the first RaiBlocks light wallet which keeps you in control of your private keys.
                            There's no need to download the ledger to be in control over your money.
                        </p>
                        <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
    
        <section class="bg-primary" style="background:#592191" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">We've got what you need!</h2>
                        <hr class="light">
                        <p class="text-faded">
                            Don't wait for the wallet to sync to be able to make transactions. Send and receive payments from anywhere.
                            Import or export your wallet from the official RaiBlocks implementation.
                            And this without letting anyone know your keys, you are the only owner of your money.
                        </p>
                        <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Still here?</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-lock text-primary sr-icons"></i>
                            <h3>Your keys are safe</h3>
                            <p class="text-muted">
                                Wallets are encrypted before being sent to the server. You are the only one who can see your keys.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                            <h3>Start right now</h3>
                            <p class="text-muted">You can start sending and receiving payments in just 30 seconds!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-search text-primary sr-icons"></i>
                            <h3>Open Source</h3>
                            <p class="text-muted">Our code is available for all at GitHub. Anyone can inspect it, review it or improve it.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-globe text-primary sr-icons"></i>
                            <h3>Use it anywhere</h3>
                            <p class="text-muted">At home, in the street, on the mobile or computer... make XRB transactions where you need to!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <aside class="bg-dark">
            <div class="overlay2">
                <div class="container text-center">
                    <div class="call-to-action">
                        <h2>What are you waiting for?</h2>
                        <button class="btn btn-default btn-xl sr-button signup">Sign Up Now!</button>
                    </div>
                </div>
            </div>
        </aside>
    
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Let's Get In Touch!</h2>
                        <hr class="primary">
                        <p>Do you want to tell us anything? Feel free to do so :)</p>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                        <p><a href="mailto:support@raiwallet.com">support@raiwallet.com</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php include 'wallet.php'; ?>
    
    <?php include 'assets/modals.php'; ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
    
    <!-- Toasts -->
    <script src="js/jquery.toast.js"></script>
    
    <script>
        var active = 'home';
        var moving = false;
        
        $('.signup').click(function(){
            $("#login-modal").modal('hide');
            $("#signup-modal").modal();
            $('body').css('padding-right', '0px');
            return false;
        });
        
        $('.login').click(function(){
            $("#signup-modal").modal('hide');
            $("#login-modal").modal();
            $('body').css('padding-right', '0px');
            return false;
        });
        
        $('#send').click(function(){
            $("#send-modal").modal();
            $('body').css('padding-right', '0px');
            return false;
        });
        
        $('#receive').click(function(){
            $("#receive-modal").modal();
            $('body').css('padding-right', '0px');
            return false;
        });
        
        $('#change').click(function(){
            $('#change-modal').modal();
            $('body').css('padding-right', '0px');
            return false;
        })
        
        $('#ghome').click(function(event){
            event.preventDefault();
            if(active != 'home')
            {
                $('.sidebar-nav .active').removeClass('active');
                $('#ghome').parent().addClass('active');
                $('.current').fadeOut(500, function(){
                    $('.current').removeClass('current');
                    $('.dashboard').fadeIn();
                    $('.dashboard').addClass('current');
                    if(!moving)
                    {
                        window.history.pushState("home", "RaiWallet - Home", "/home");
                        document.title = 'RaiWallet - Home';
                    }
                    active = 'home';
                    moving = false;
                });
            }
        });
        
        $('#gtxs').click(function(event){
            event.preventDefault();
            if(active != 'transactions')
            {
                $('.sidebar-nav .active').removeClass('active');
                $('#gtxs').parent().addClass('active');
                $('.current').fadeOut(500, function(){
                    $('.current').removeClass('current');
                    $('.transactions').fadeIn();
                    $('.transactions').addClass('current');
                    if(!moving)
                    {
                        window.history.pushState("transactions", "RaiWallet - Transactions", "/transactions");
                        document.title = 'RaiWallet - Transactions';
                    }
                    active = 'transactions';
                    moving = false;
                });
            }
        });
        
        $('#gsecurity').click(function(event){
            event.preventDefault();
            if(active != 'security')
            {
                $('.sidebar-nav .active').removeClass('active');
                $('#gsecurity').parent().addClass('active');
                $('.current').fadeOut(500, function(){
                    $('.current').removeClass('current');
                    $('.security').fadeIn();
                    $('.security').addClass('current');
                    if(!moving)
                    {
                        window.history.pushState("security", "RaiWallet - Security", "/security");
                        document.title = 'RaiWallet - Security';
                    }
                    active = 'security';
                    moving = false;
                });
            }
        });
        
        $('#gsettings').click(function(event){
            event.preventDefault();
            if(active != 'settings')
            {
                $('.sidebar-nav .active').removeClass('active');
                $('#gsettings').parent().addClass('active');
                $('.current').fadeOut(500, function(){
                    $('.current').removeClass('current');
                    $('.settings').fadeIn();
                    $('.settings').addClass('current');
                    if(!moving)
                    {
                        window.history.pushState("settings", "RaiWallet - Settings", "/settings");
                        document.title = 'RaiWallet - Settings';
                    }
                    active = 'settings';
                    moving = false;
                });
            }
        });
        
        $('#gdebug').click(function(event){
            event.preventDefault();
            if(active != 'debug')
            {
                $('.sidebar-nav .active').removeClass('active');
                $('#gdebug').parent().addClass('active');
                $('.current').fadeOut(500, function(){
                    $('.current').removeClass('current');
                    $('.debug').fadeIn();
                    $('.debug').addClass('current');
                    if(!moving)
                    {
                        window.history.pushState("debug", "RaiWallet - Debug", "/debug");
                        document.title = 'RaiWallet - Debug';
                    }
                    active = 'debug';
                    moving = false;
                });
            }
        });
        
        window.onpopstate = function(e)
        {
            moving = true;
            switch(e.state)
            {
                case 'home':
                    $('#ghome').click();
                    break;
                case 'transactions':
                    $('#gtxs').click();
                    break;
                case 'settings':
                    $('#gsettings').click();
                    break;
                case 'security':
                    $('#gsecurity').click();
                    break;
                case 'debug':
                    $('#gdebug').click();
                    break;
            }
        }
        
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
        
        <?php if($_SESSION['logged']){ ?>
        $('.login').click();
        <?php } ?>
        
    </script>
    
    
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    
    <!-- Wallet -->
    <script src="blake2b.js"></script>
    <script src="node_modules/tweetnacl/nacl.js"></script>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="Logger.js"></script>
    <script src="main.js?v=1.0.2"></script>

</body>

</html>
