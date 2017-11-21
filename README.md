# RaiWebWallet

<h3>Overview</h3>
<p>
    This is a web based wallet for <a href="https://raiblocks.net" target="_blank">RaiBlocks</a><br/><br/>
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
<br/>

<h4>Bounty</h4>
<p>
    With the purpose of testing the wallet strength I have prepared a wallet with an account containing 2000 XRB as a bounty for the one able to log in to that wallet.
    The wallet has been created at raiwallet.com, using the code in this repo. I can give you all the info you need, except the password. Im going to start providing you with the 
    wallet identifier, the account, the password format (I would prefer you to break it in a way other than bruteforcing it :P but well ...), the ciphered wallet data and... yeah <br/>
If you need more info, just ask. If you find a vulnerability and it is worth it I may consider increasing the bounty. So yeah, lets play!
    
<pre>
Wallet Identifier: 2964ae96e92370aee570aa92419bc3698dd611172acc2fc85781a43c29bcc9aa 
Account: xrb_3haojq7ntgd45qe1wde4bkqqruazt4sspw6r3ceshfqjnnrzaof63qhhehmf 
Bounty: 2000 XRB ---> 0.07 BTC --> 300$ (at time of writing, 2000 XRB will always stay the same)
Wallet Ciphertext Hex-encoded:
9b003185af74621c71ef70276fe27c8d7a25b6d519c2605ea936c690bb0c9b65d18261d8cd255bea010f4f874b6736bb8b1f73c1528eb3a97050c939033b24712f83f283a93e594540bfd5c4ba81eada2fb1fe7ad713f42e727e53c622a154ce5845f864d51776a905a77e2cf479406af8f9465779af8fd2429d3d154eecd44c4f15240f0bad7274e57aebf82df2014370a988d979e555497e1a9d13601d9ff2ae0878e9b42ea24b307664f9ca5fdd212eb7e7f12ca254fefbdb77ab6a91f905f858836bf61f549d3ceaf489e3bf60d013bcb3a7371dbefe6b5ba1f113906286606ccbd42801813be1e0507a26ac73afd3cd454f0fb4bb2565baf0dff13fabbe3e38edea58bd4a733e1d76d84c1e63736ee8e756152eb9e9bab053ce952174f08b1506867a623d06f6e3e073d9fc2450937996e7214b99e6423f4ed5b3e690e4dd833851cfe82f9ca76cfacca186bb81f88eea840ae56e87c6026172338ed2d066f62e5aea1a548dcec46fb2d4834b45721f293aab16d6a754ca3fc9a2378011869ac9575306f23bc68269ddb5288a7ef42b65a3095e0e83e268327d6d3257240392b11fe8ae1d16c2519b107b1e228357e7b5ea7560e9457a1d57d40eb245c3c0612f28eef19f02e41f7fdfa0d041e89ff1a3808ff63a990872f0374dffb1600e0780edcb812dc75350cbd9fdb0524f0a1894ee85aa204af3c0e815b163a99600d9902637797ea2d4a0dc31d687595310ca4e03d5018aa40657c46ec0bdedd6a16921c5ce5bfced36d2dc98d303fdd8cfe1b00ed1182c32a564fa0604f20edc8427abea3305c584672c3de2c0e44cda397a0d4c35ca6d27aeab79e7852965bcfbaedcd6e84c429e222de7a36edde252d877fe4f6968f3f5c477a1ecd7ab9c80e0ef599550fc8d45bdf9ae6dea52a86d237f09a3663387896249fb51c83c61b32428785dec413448813b1836638bdf67ca4271d28d9fafe824309259bc7576fc57fc78c2f8c5cdc1750139c11e25132ddb0126f4fd7c1a2deb5c07f99ee15be7ed2356e177a9fadbd57c91ca99b94e98c0e12074f2c752a290e0b388ee66439cc03dc9430b3d3683207014643f812fe2996984defc022efeab93d0f39469d1531dbca82da5a018b0cc8fbc37d604a557fd4fe8a0537f64db15722a6de5f65b0c5b6633979f22dfbbcb542193d518f0ca147eafd47e3f12cb37644ad68edf841f41e8cbd6ac0ccc9fcac194f3a15ea6a4be251fa047af2a5fbf49d46d2778130a8f7bfaafc3f7deeb1968b177ef1c179a5674fa86116b481d55f0eafc523698c4dc985831d87a0ba3467cda5a1970f1cad68a065e8e8ed3f05a4c2ae8caada3d1f0b43b383a0f856e8d5ddad1dbcbed58b27928e589e09d9840176de1bd2501a1f0670c9348f6e474dbe3b65a599d69c5466e3bf68c195edee21a848e1dba7a14643d80072366ffa1ef854ebb86a271d0520909671ad8b4b54dcc088b70fd4b3eec32929def173472a226d3df0638358ecd7ae4f988beafdfab91e2ca7557019a286273cf5063817ef78e8f3faca5bf07f58385297929f3a8ad1130d0ba510eb0376859067b96964de393179e6587e22abcd213f0c50b61f02d3df06215ccec84680c6a7e095d9a4cf44968ed4ba700ed1335e99f5acca4062a7fc0c455a97f962ba2b70a28019273282a96847e1a14e0719de5327865f9651c873cd0c06d29f783e87eb73f2aa1679282d65e395138000624d648987e12ec0e08630ed95c11b7d559bb5c2e902fafe11e03a369416a9ba054daa301210bddfef850f2ab5ba2a3709ccb483a60f4514d4a79f805201955684a49d896bbf1b983274354191447a7
</pre>

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
 
 
