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
                            All this without letting anyone know your keys, you are the only owner of your money.
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
        
        <section class="bg-dark-2">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>RaiBlocks Transactions Last 24h</h3>
                                <span id="tfh"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-top:50px">
                                <h3>Amount Transferred Last 24h</h3>
                                <span id="amtf"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="live">
                            <div class="elem" style="display:none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    
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
            $('#recover-id-modal').modal('hide');
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
        
        $('.import').click(function() {
            $('#login-modal').modal('hide');
            $('#import-seed-modal').modal();
            $('body').css('padding-right', '0px');
            return false;
        });
        
        $('#lost_id').click(function(event){
            event.preventDefault();
            $("#login-modal").modal('hide');
            $('#recover-id-modal').modal();
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
    

    <script>
        
        var txs = liveTxs();
        txs.run();
        
        function liveTxs() {
            var api = {};
            var conn;
            var txsCount = 0;
            var sum = 0;
            
            api.run = function() {
                api.getLast24h(api.connect());
            }
            
            api.getLast24h = function(callback = null) {
                $.post('ajax.php', 'action=last24h', function(data){
                    data = JSON.parse(data);
                    
                    $('#tfh').html(data.txs);
                    
                    if(data.last5) {
                        for(let i = 0; i < 5; i++)
                            api.addTx(data.last5[i]);
                    }
                    
                    if(data.sum) {
                        sum = parseInt(data.sum);
                        $('#amtf').html((sum / 100000).toFixed(6));
                    }
                    
                    if(callback !== null)
                        callback();
                });
            }
            
            api.connect = function() {
                conn = new WebSocket('wss://raiwallet.com:8332');
        
                conn.onmessage = function(data){
                    api.addTx(JSON.parse(data.data));
                };
                
                conn.onclose = function() {
                    console.log('Closed');
                    api.connect();
                };
            }
            
            api.addTx = function(data) {
                var elem = document.createElement('div');
                elem.classList = "elem";
                var cont = document.createElement('div');
                cont.classList = "row text-left";
                var col1 = document.createElement('div');
                var col2 = document.createElement('div');
                
                if(data.type == 'send' || data.type == 'receive') {
                    var col3 = document.createElement('div');
                    col1.classList = "col-sm-12 type";
                    col2.classList = "col-sm-12 hash";
                    col3.classList = "col-sm-12 amount";
                    cont.appendChild(col1);
                    cont.appendChild(col2);
                    cont.appendChild(col3);
                    var slice = data.amount.slice(0, data.amount.length - 24);
                    col3.innerText = (parseFloat(slice) / 1000000).toFixed(6) + " XRB";
                } else {
                    col1.classList = "col-sm-12 type";
                    col2.classList = "col-sm-12 hash";
                    cont.appendChild(col1);
                    cont.appendChild(col2);
                }
                
                col1.innerText = data.type;
                
                var a = document.createElement('a');
                a.setAttribute('href', 'https://raiblocks.net/block/index.php?h=' + data.hash);
                a.setAttribute('target', '_blank');
                a.innerText = data.hash;
                col2.appendChild(a);
                
                elem.appendChild(cont);
                elem.setAttribute('style', 'display:none');
                
                $('.live').prepend($(elem));
                $(elem).fadeIn(1000);
                var elems = document.getElementsByClassName('elem');
                if(elems.length >= 4) {
                    var elem = elems[elems.length - 1];
                    elem.remove();
                }
                $('#tfh').html(parseInt($('#tfh').html()) + 1);
                txsCount++;
                
                if(data.type == 'send') {
                    sum += parseInt(slice);
                    $('#amtf').html((sum / 100000).toFixed(6));
                }
            }
            
            api.stop = function() {
                conn.onclose = null;
                conn.close();
            }
            
            api.status = function() {
                console.log(conn);
            }
            
            return api;
        }
        
    </script>
    
    
    <!-- Wallet -->
    <script src="blake2b.js"></script>
    <script src="node_modules/tweetnacl/nacl.js"></script>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="js/bigInteger.min.js"></script>
    <script type="text/javascript" src="Logger.js"></script>
    <script src="js/pow.js"></script>
    <script src="js/startThreads.js"></script>
    <script src="main.js?v=1.0.2"></script>

</body>

</html>
