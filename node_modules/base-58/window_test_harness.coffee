if window? and window.location.hostname is "45678.github.io" and window.location.protocol isnt "https:"
  window.location = window.location.toString().replace("http:", "https:")

tape = require("tape")
module.exports = tape.createHarness()

testTemplate = document.getElementById("test_template")
failureTemplate = document.getElementById("failure_template")
assertionTemplate = document.getElementById("assertion_template")
numberOfTests = document.getElementById("number_of_tests")
numberOfFailedTests = document.getElementById("number_of_failed_tests")
body = document.body
idOfCurrentlyRunningTest = undefined
untouched = true
failedTests = []

window.onmousewheel = ->
  window.onmousewheel = undefined
  untouched = false

delay = (amount, callback) -> setTimeout(callback, amount)

module.exports.createStream(objectMode:yes).on "data", (data) ->
  switch
    when data.type is "test"
      idOfCurrentlyRunningTest = data.id
      insertTestElement(data)
      renderBodyElement(data)
    when data.operator?
      if data.ok is false
        failedTests.push(idOfCurrentlyRunningTest) unless idOfCurrentlyRunningTest in failedTests
      element = findElementForTest(idOfCurrentlyRunningTest)
      renderTestElementUpdate(element, data)
      insertTestAssertion(element, data)
      insertFailure(element, data) unless data.ok
    when data.type is "end"
      idOfCurrentlyRunningTest = undefined
      renderTestElementEnded(findElementForTest(data.test), data)
      numberOfFailedTests.innerText = failedTests.length if failedTests.length isnt 0
      numberOfTests.innerText = data.test + 1
      renderBodyElement(data)
    else
      console.info("Unhandled", data)

renderBodyElement = (data) ->
  body.className = body.className.replace("undefined", "")
  body.className = switch
    when data.type is "test"
      body.className.replace("stopped", "running")
    when data.type is "end"
      body.className.replace("running", "stopped")
    else
      body.className
  if failedTests.length is 1 and body.className.indexOf("fail") is -1
    body.className += " failures"

insertTestElement = (data) ->
  element = testTemplate.cloneNode(true)
  element.id = "test_#{data.id}"
  element.querySelector(".name").innerText = data.name
  element.className += " started"
  element.startedAt = Date.now()
  element.querySelector("div.id").innerText = (data.id / 1000).toFixed(3).replace("0.", "#")
  container = document.getElementById('tests')
  container.appendChild(element)
  containerHeight = parseInt getComputedStyle(container)['height']
  bodyHeight = parseInt getComputedStyle(document.body)['height']
  if (containerHeight > bodyHeight)
    document.body.style.height = "#{containerHeight}px"
  element.scrollIntoView() if untouched

renderTestElementUpdate = (element, data) ->
  className = if data.ok then "ok" else "failed"
  element.className = element.className.replace(className,"").trim() + " " + className

renderTestElementEnded = (element, data) ->
  element.className = element.className.replace("started", "ended")
  element.querySelector("div.duration").innerText = "#{((Date.now() - element.startedAt) / 1000).toFixed(2)}s"

insertTestAssertion = (element, data) ->
  assertionEl = assertionTemplate.cloneNode(true)
  assertionEl.id = "test_#{idOfCurrentlyRunningTest}_assertion_#{data.id}"
  element.className = element.className.replace('empty', '').trim()
  element.querySelector('.assertions').appendChild(assertionEl)

insertFailure = (element, data) ->
  failureEl = failureTemplate.cloneNode("true")
  failureEl.id = ""
  if typeof data.expected is "function"
    failureEl.querySelector("pre.expected").innerHTML += data.expected
  else
    failureEl.querySelector("pre.expected").innerHTML += JSON.stringify(data.expected, undefined, "  ")
  if typeof data.actual is "function"
    failureEl.querySelector("pre.received").innerHTML += data.actual
  else
    failureEl.querySelector("pre.received").innerHTML += JSON.stringify(data.actual, undefined, "  ")
  if data.error?
    failureEl.querySelector("pre.error_stack").innerText = data.error.stack
  element.appendChild(failureEl)
  if failedTests.length is 1
    if untouched is true
      delay 1, ->
        untouched = false
        element.scrollIntoView(true)

findElementForTest = (id) ->
  document.getElementById("test_#{id}")
