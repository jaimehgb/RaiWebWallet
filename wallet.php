    <div id="wrapper" class="wallet-wrapper" style="display:none">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        RAIWALLET <span style="font-size:15px; color:#f00">Alpha</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" id="ghome"><i class="fa fa-home" aria-hidden="true" style="display:inline"></i> Home</a>
                </li>
                <li>
                    <a href="#" id="gtxs"><i class="fa fa-exchange" aria-hidden="true" style="display:inline"></i> Transactions</a>
                </li>
                <li>
                    <a href="#" id="gsettings"><i class="fa fa-cogs" aria-hidden="true" style="display:inline"></i> Settings</a>
                </li>
                <li>
                    <a href="#" id="gsecurity"><i class="fa fa-lock" aria-hidden="true" style="display:inline"></i> Security</a>
                </li>
                <li>
                    <a href="#" id="gdebug"><i class="fa fa-bug" aria-hidden="true" style="display:inline"></i> Debug</a>
                </li>
                <li>
                    <a href="/" id="gout"><i class="fa fa-sign-out" aria-hidden="true" style="display:inline"></i> Sign Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="padding:0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 b-line">
                        <div class="col-md-12 main-box">
                            <div class="row">
                                <div class="col-xs-6 buttons">
                                    <h2 style="font-weight:700">YOUR RAIBLOCKS, ANYWHERE.</h2>
                                    <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Toggle Menu</a>
                                    <button type="button" class="btn btn-primary" id="send">Send</button>
                                    <button type="button" class="btn btn-primary" id="receive">Receive</button>
                                    <button type="button" class="btn btn-primary" id="change">Change</button>
                                </div>
                                <div class="col-xs-6 text-right" id="refresh">
                                    <h2><span id="balance">0</span> XRB</h2>
                                    <h4>(<span id="pending">0</span> pending)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- DASHBOARD -->
                <div class="row dashboard current">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h3>Pending Blocks (Waiting for PoW ...)</h3>
                            <div class="recent">
                                <ul>

                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h3>Your accounts</h3>
                            <div class="accounts">
                                <ul>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Transactions -->
                <div class="row transactions" style="display:none">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3>Last Transactions</h3>
                            <div class="acc-selector">
                                <select name="acc" id="acc-select" class="form-control" style="font-family:monospace">
                                    
                                </select>
                            </div>
                            <div class="txs">
                                <ul>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings -->
                <div class="row settings" style="display:none">
                    <div class="col-md-12 b-line">
                        <div class="col-md-12">
                            <h3>Minimum Receive Amount</h3>
                            <p>
                                Enter below the minimum amount in a receive transaction you want to spend PoW in. Lower amounts will not be 
                                pocketed. You can change this setting whenever you wish.
                            </p>
                            <form method="post" class="form-minimum">
                                <div class="form-group">
                                    <label>Minimum receive amount (rai units)</label>
                                    <input type="text" name="minimum_receive" id="minimum_receive" class="form-control" placeholder="e.g.: 1000000" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="change_minimum" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Security -->
                <div class="row security" style="display:none">
                    <div class="col-md-12 b-line">
                        <div class="col-md-12">
                            <h3>BackUps</h3>
                            <p>
                                If you haven't already, please, backup your seed. With it you will be able to recover your funds in case you loose
                                your password or your wallet data. 
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <label>Seed</label>
                                    <input type="text" name="seed" id="seed_backup" class="form-control" disabled value="<?php for($i = 0; $i < 64; $i++) echo '&#9679;'; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Enter your password to unlock the seed</label>
                                    <input type="password" name="pass" id="seed_pass" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="seed_button">
                                        Show Seed
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 b-line">
                        <div class="col-md-12">
                            <h3>Change Password</h3>
                            <p>
                                You can change you wallet password here. Just make sure you don't forget it! 
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="current" id="change-pass-current" class="form-control"/>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new1" id="change-pass-new1" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Enter the new password again</label>
                                    <input type="password" name="new2" id="change-pass-new2" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="change-pass">
                                        Change
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--
                    <div class="col-md-12 b-line">
                        <div class="col-md-12">
                            <h3>Password Stretching Iterations</h3>
                            <p>
                                The higher the number the more difficult it will be to brute force your password and decrypt your wallet.
                                But it will also increase the time your browser will need to decrypt it.
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <label>PBKDF2 Iterations</label>
                                    <input type="text" name="iterations" id="iteration_number" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="change-iterations">
                                        Change
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    -->
                    <div class="col-md-12 b-line">
                        <div class="col-md-12">
                            <h3>Download Wallet Data</h3>
                            <p>
                                Just in case, you can also download your wallet data ciphered. Having the seed is far more efficient, 
                                but who knows, you may want to have it :P <br/>
                                Also, as our code is open-sourced you can develop your own wallet starting from there and load it with your keys
                                or something.
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="download_wallet">
                                        Download
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Debug -->
                <div class="row debug" style="display:none">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3>Logs</h3>
                            <pre id="debug-box">
                            
                            </pre>
                            <h4>
                                Pending Blocks
                            </h4>
                            <pre id="pending-blocks">
                            
                            </pre>
                            <h4>
                                Ready Blocks
                            </h4>
                            <pre id="ready-blocks">
                            
                            </pre>
                            <button type="button" class="btn btn-primary" id="refreshdebug">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
        <style>
            .recent ul li, .accounts ul li, .txs ul li{
                display:block;
                padding:15px;
                border:solid 1px #aaa;
                font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
                box-shadow:2px 2px 3px #888;
                margin-bottom:10px;
            }
            .txs ul li{
                overflow-x:auto;
            }
            #send-select{
                font-size:12px !important;
                color:#888;
            }
            .acc-selector{
                color:#fff;
                padding:20px;
                background:#592191;
                font-family: 'Merriweather', 'Helvetica Neue', Arial, sans-serif;
                box-shadow:3px 3px 5px #888;
            }
            .green{
                color:#8c44d5;
            }
            .red{
                color:#aa0000;
            }
            .accounts{
                height:410px;
                overflow-x:hidden;
                overflow-y:auto;
            }
            .recent ul, .accounts ul, .txs ul{
                padding-left:5px;
            }
            .txs{
                margin-top:20px;
            }
            .gborder{
                border: solid 1px #ddd;
            }
            .blk-type{
                font-weight:bold;
            }
            .send{
                color:#aa0000;
            }
            .receive{
                color:#8c44d5;
            }
            .open{
                color:#0061ff;
            }
            .change{
                color:#00b232;
            }
            .blk-amount{
                font-size:20px;
            }
            .main-box{
                margin-top:0px;
                /*padding:30px;*/
                /*color:#fff;*/
                /*border: solid 1px #592191;*/
                font-family: 'Merriweather', 'Helvetica Neue', Arial, sans-serif;
                /*box-shadow:3px 3px 5px #888;*/
            }
            .b-line{
                border-bottom:solid 1px #888;
                padding-bottom:20px;
            }
            .stat-box{
                color:#fff;
                padding:20px;
                background:#592191;
                font-family: 'Merriweather', 'Helvetica Neue', Arial, sans-serif;
                box-shadow:3px 3px 5px #888;
            }
            .buttons a, .buttons button{
                margin-top:10px;
            }
        </style>

    </div>
    <!-- /#wrapper -->




