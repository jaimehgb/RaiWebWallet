# RaiWebWallet

<h3>Overview</h3>
<p>
    This is a web based wallet for <a href="https://raiblockscommunity.net" target="_blank">RaiBlocks</a><br/><br/>
    This repo contains all the files which are downloaded to the browser at <a href="http://raiwallet.com/" target="_blank">RaiWallet</a>.
    Adding a compatible back-end anyone can build his own web based wallet from this. <br/>
    The wallet itself is at <code>Wallet.js</code>. If you want to verify how blocks are created, signed and verified, how accounts are generated, etc ... you should look there. With it you can build your own private and homemade RaiBlocks wallet :D When an efficient way to generate PoW is found, the wallet will be almost self-sufficient. It will only need to query a server to get info about the ledger.
    <br/><br/>
    At <code>js/custom.js</code> you can find like the "Middleware" between the Wallet and the GUI. It also contains all the queries made to the server to request PoW, info about accounts and transactions, etc ...
    <br/><br/>
    The code relies on some NPM libraries for node.js. I've used <a href="http://browserify.org/" target="_blanke">browserify</a> to use them at the browser.<br/>
    <code>$ browserify js/custom.js -o main.js</code> (for example)
</p>

<hr/>

<h3>How is it built into RaiWallet.com</h3>
<p>
    At <a href="http://raiwallet.com/" target="_blank">RaiWallet</a> the server is only used to store the users' wallets (ciphered), to provide information about the network to them, and to generate PoW. When a user signs up, a random identifier is generated to store the user wallet under it, but the wallet is created at the browser (seeds, keys, accounts, transactions, signatures, everything ... ). Once the user is done with the wallet, it is ciphered (AES256) with his password, still at the browser, and then the ciphered wallet is sent to the server to store it. Someone with access to the database wouldn't be able to find users' keys (if passwords are strong enough and haven't been leaked by their owners).
</p>

<hr/>
<h3>Contributing</h3>
<p>
    Any kind of help is appreciated :) Suggestions, proposals, fixes, TODO items, issues, testing ... If you want to help there is stuff to do :D
</p>

<h3>TODO</h3>
<hr/>
 - Find an efficient way to generate PoW at the browser.<br/>
 - Allow user to change pbkdf2 password stretching iterations (security).<br/>
 - <del>Allow user to set a minimum receive amount (Utility)</del><br/>
 - Allow user to import a wallet seed, importing all chains in case it has been used already in the network (Utility)<br/>
 - Allow user to import single private keys, of course not backed by the seed (Utility)<br/>
 - <del>Load more transactions when scrolling down the txs page, currently only the last 20 are loaded (UX)</del><br/>
 - <del>Change URI when changing tabs (UX)</del><br/>
 - <del>On page refresh, show up the login modal with the wallet id already filled so users can log back in quickly (UX)</del><br/>
 - Intensive testing.<br/>
 - Code cleaning.<br/>
 - <del>Client/Server comunication optimization, there are too many calls.</del><br/>
 
 
