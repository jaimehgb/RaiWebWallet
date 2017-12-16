    <!-- Sign up -->
    <div class="modal fade" id="signup-modal" role="dialog">
        <div class="modal-dialog modal-reg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
                </div>
                <div class="modal-body registering" style="padding:40px 50px;">
                    <form role="form" class="form-register" method="post">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="psw">Password</label>
                            <input type="password" class="form-control" id="psw" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="psw">Repeat your password</label>
                            <input type="password" class="form-control" id="psw2" placeholder="Enter password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Sign Up">
                    </form>
                </div>
                <div class="modal-body registered" style="padding:40px 50px; display:none">
                    <h3>
                        Wallet registration successful!
                    </h3>
                    <p class="text-center">
                        <h4>
                            Identifier
                        </h4>
                        <code id="wallet_id_reg"></code>
                    </p>
                    <p class="text-left">
                        This is your wallet identifier. You need it to login to your wallet. It can be replaced with an alias to make it
                        easier to remember from the wallet settings page. If you lose it, it can be recovered if you have access to the email
                        address you have registered with. The wallet under this identifier is stored at our servers encrypted with your password,
                        the one you used to register. If you forget that password you won't be able to decrypt your wallet and as we don't know your password
                        we won't be able to recover it either. <strong>But</strong> there is another security measure you can take. 
                        This is your wallet's seed:
                    </p>
                    <p class="text-center">
                        <h4>
                            Seed    
                        </h4>
                        <code id="wallet_seed_reg"></code>
                    </p>
                    <p class="text-left">
                        Back up this seed somewhere safe. Anyone who knows it is able to generate all your private keys, thus having access to your
                        funds. So if you forget your password but you have the seed you can recover your funds.
                    </p>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control gotowallet">
                            Go to your wallet
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-center">Already registered? <a href="#" class="login">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" class="form-login" method="post">
                        <div class="form-group">
                            <label for="wid">Wallet Identifier <a href="#" id="lost_id">Lost your identifier?</a></label>
                            <input type="text" name="wallet_id" id="wid" class="form-control" placeholder="e.g.: 33f52770e537dbae2fe307bdc4ccd4de262c705e3b565f67b37754ad46f8525f" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="pass" id="password" class="form-control" placeholder="Enter your password" required />
                        </div>
                        <div class="form-group" style="display:none" id="_2fa_input">
                            <label for="2fa">Google Authenticator</label>
                            <input type="text" name="2fa" id="2fa_login_code" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-primary btn-block" value="Login"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="text-center">
                        Not a member? <a href="#" class="signup">Sign Up</a><br/>
                        Did you lose your password? <a href="#" class="import">Recover your wallet with your seed</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="recover-id-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Recover your identifier</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" class="form-recovery" method="post">
                        <div class="form-group">
                            <label for="wid">Email Address</label>
                            <input type="text" name="email" id="r_email" class="form-control" placeholder="e.g.: john@doe.com" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="recover_id" class="btn btn-primary btn-block" value="Recover"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="text-center">Not a member? <a href="#" class="signup">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="import-seed-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Wallet from Seed</h4>
                </div>
                <div class="modal-body importing" style="padding:40px 50px;">
                    <form role="form" class="form-import" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="i_email" class="form-control" id="email-import" placeholder="e.g.: john@doe.com" />
                        </div>
                        <div class="form-group">
                            <label for="wid">Enter your seed</label>
                            <input type="text" name="seed" id="i_seed" class="form-control" placeholder="e.g.: CD92CFF974A3E3773909BBCF053970B12C9D4A09F320F792814B6F0EB2DDA3AD" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Enter a password to encrypt your wallet</label>
                            <input type="password" name="psw1" id="import_psw1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password2">Repeat your password</label>
                            <input type="password" name="psw2" id="import_psw2" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="seed_import" class="btn btn-primary btn-block" value="Import"/>
                        </div>
                    </form>
                </div>
                <div class="modal-body imported" style="padding:40px 50px; display:none">
                    <h3>
                        Wallet registration successful!
                    </h3>
                    <p class="text-center">
                        <h4>
                            Identifier
                        </h4>
                        <code id="wallet_id_import"></code>
                    </p>
                    <p class="text-left">
                        This is your wallet identifier. You need it to login to your wallet. It can be replaced with an alias to make it
                        easier to remember from the wallet settings page. If you lose it, it can be recovered if you have access to the email
                        address you have registered with. The wallet under this identifier is stored at our servers encrypted with your password,
                        the one you used to register. If you forget that password you won't be able to decrypt your wallet and as we don't know your password
                        we won't be able to recover it either. <strong>But</strong> there is another security measure you can take. 
                        This is your wallet's seed:
                    </p>
                    <p class="text-center">
                        <h4>
                            Seed    
                        </h4>
                        <code id="wallet_seed_import"></code>
                    </p>
                    <p class="text-left">
                        Back up this seed somewhere safe. Anyone who knows it is able to generate all your private keys, thus having access to your
                        funds. So if you forget your password but you have the seed you can recover your funds.
                    </p>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary form-control gotowallet">
                            Go to your wallet
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-center">Don't have a wallet? <a href="#" class="signup">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Send -->
    <div class="modal fade" id="send-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:10px 20px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-send"></span> Send</h4>
                </div>
                <div class="modal-body" style="padding:25px">
                    <form role="form" class="form-send">
                        <div class="form-group">
                            <label for="wid">From</label>
                            <select name="from" id="send-select" class="form-control" style="font-family:monospace">
            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">To</label>
                            <input type="text" name="to" id="to" class="form-control" placeholder="Receiving account" required />
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount (XRB/MRai)</label>
                            <input type="text" name="amount" id="samount" class="form-control" placeholder="e.g.: 1000000.0000" required />
                        </div>
                        <!--
                        <div class="form-group">
                            <input type="checkbox" name="pow" checked > <a data-toggle="tooltip" data-placement="top" title="Check to generate the PoW needed for the block at RaiWallet servers. It is recommended if you are on a mobile device, if you have to send and receive many blocks or if you are in a rush.">Get PoW remotely</a>
                        </div>
                        -->
                        <div class="form-group">
                            <input type="submit" name="send" class="form-control btn btn-primary" value="Send" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Receive -->
    <div class="modal fade" id="receive-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:10px 20px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-send"></span> Receive</h4>
                </div>
                <div class="modal-body" style="padding:25px">
                    <form role="form" class="form-receive">
                        <div class="form-group">
                            <label for="wid">My Accounts</label>
                            <select name="from" id="receive-select" class="form-control" style="font-family:monospace">
            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount (XRB/MRai)</label>
                            <input type="text" name="amount" id="receive-amount" class="form-control" placeholder="e.g.: 1000000.0000" required />
                        </div>
                        <div class="form-group text-center" id="qr">
                            <div class="img img-responsive"></div>
                            <div class="qr-bot"></div>
                        </div>
                        <div class="form-group">
                            <input type="button" name="acc_create" id="generate_acc" class="form-control btn btn-primary" value="Generate new Account" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Change -->
    <div class="modal fade" id="change-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary" style="padding:10px 20px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-send"></span> Change</h4>
                </div>
                <div class="modal-body" style="padding:25px">
                    <form role="form" class="form-receive">
                        <div class="form-group">
                            <label for="wid">My Accounts</label>
                            <select name="from" id="change-select" class="form-control" style="font-family:monospace">
            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Representative</label>
                            <input type="text" name="representative" id="acc-repr" class="form-control" placeholder="e.g.: xrb_1anrzcuwe64rwxzcco8dkhpyxpi8kd7zsjc1oeimpc3ppca4mrjtwnqposrs" />
                        </div>
                        <div class="form-group">
                            <button type="button" name="repr_change" id="change_repr" class="form-control btn btn-primary">Change account representative</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>