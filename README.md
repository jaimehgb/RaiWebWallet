# RaiWebWallet

- Wallet.js contains the wallet itself. All the signing, ciphering, storing, and PoW stuff. <br/>
- js/custom.js basically links the wallet with the UI. So users can use it. Yep. <br/>
- Block.js handles all the stuff related with blocks (transactions). Creates blocks, computes hashes, etc ... <br/>
<br/>
pack it all with browserify js/custom.js -o main.js<br/>
<br/>
BTW, currently its not stable. Still in testing phase. <br/>
<br/>
Feel free to contribute and post all the issues you find :)<br/>
<br/>
(Hmmm, I have to spend some time on a proper readme :P )<br/>

<h3>TODO</h3>
<hr/>
 - Allow user to change pbkdf2 password stretching iterations (security).<br/>
 - Allow user to set a minimum receive amount (Utility)<br/>
 - Allow user to import a wallet seed, importing all chains in case it has been used already in the network (Utility)<br/>
 - Allow user to import single private keys, of course not backed by the seed (Utility)<br/>
 - Load more transactions when scrolling down the txs page, currently only the last 20 are loaded (UX)<br/>
 - Change URI when changing tabs (UX)<br/>
 - On page refresh, show up the login modal with the wallet id already filled so users can log back in quickly (UX)<br/>
 - Intensive testing.<br/>
 - Code cleaning.<br/>
 - Client/Server comunication optimization, there are too many calls.<br/>
 
 
