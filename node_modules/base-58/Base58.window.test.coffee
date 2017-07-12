tape = require "./window_test_harness"
throw "Base58 was not defined on window" if window.Base58 is undefined
Base58_Test = require "./Base58_Test"

Base58_Test(tape, Base58)
