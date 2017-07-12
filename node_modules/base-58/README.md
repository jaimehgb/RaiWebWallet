Base58 in a `window`
===================

Get [`Base58.js`](https://raw.githubusercontent.com/45678/base58/master/Base58.js)
and add it to your web page with a script tag:

    <script src="Base58.js" charset="utf-8"></script>

`window.Base58` is defined when the script is executed. There are two methods:

    Base58.encode(a Uint8Array) returns a String
    Base58.decode(a String) returns a Uint8Array


Base58 in Node.js
=================

Run `npm install base-58` to add the module to your package. Require it in
your program with `Base58 = require("base-58")`. Again, there are two methods:

    Base58.encode(a Buffer or Uint8Array) returns a String
    Base58.decode(a String) returns a Buffer


Credits
-------
- [Mike Hearn](https://github.com/mikehearn) for original Java implementation.
- [Stefan Thomas](https://github.com/justmoon) for porting to JavaScript.
- [Stephan Pair](https://github.com/gasteve) for buffer improvements.
- [Daniel Cousens](https://github.com/dcousens) for cleanup and merging improvements from bitcoinjs-lib.
- [Jared Deckard](https://github.com/deckar01) for killing `bigi` as a dependency.
- [cryptocoinjs](https://github.com/cryptocoinjs/bs58) for the original package.
- [Js2coffee](http://js2coffee.org/) for conversion to CoffeeScript.
