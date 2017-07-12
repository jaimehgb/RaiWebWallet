# RaiWebWallet

Wallet.js contains the wallet itself. All the signing, ciphering, storing, and PoW stuff.
js/custom.js basically links the wallet with the UI. So users can use it. Yep.
Block.js handles all the stuff related with blocks (transactions). Creates blocks, computes hashes, etc ...

pack it all with browserify js/custom.js -o main.js

BTW, currently its not stable. Still in testing phase. 

Feel free to contribute and post all the issues you find :)

(Hmmm, I have to spend some time on a proper readme :P )
