var assert = require('assert')
var Base58 = require('../Base58')

var fixtures = require('./fixtures.json')

describe('Base58', function() {
  describe('encode', function() {
    fixtures.valid.forEach(function(f) {
      it('can encode ' + f.hex, function() {
        var actual = Base58.encode(new Buffer(f.hex, 'hex'))
        assert.strictEqual(actual, f.string)
      })
    })
  })

  describe('decode', function() {
    fixtures.valid.forEach(function(f) {
      it('can decode ' + f.string, function() {
        var actual = new Buffer(Base58.decode(f.string)).toString('hex')
        assert.strictEqual(actual, f.hex)
      })
    })

    fixtures.invalid.forEach(function(f) {
      it('throws on ' + f.description, function() {
        assert.throws(function() {
          Base58.decode(f.string)
        }, /decode received unacceptable input/)
      })
    })
  })
})
