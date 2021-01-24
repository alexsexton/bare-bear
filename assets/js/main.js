/* globals jQuery, Modernizr */
'use strict'

const mqSmall = '(max-width: 960px)'
const mqDesktop = '(min-width: 961px)'

const body = document.body

const openCls = ['panel--open', 'box--open', 'site-nav--open']
const shadow = document.querySelector('.c-shadow')
shadow.addEventListener('click', () => {
  body.classList.remove(...openCls)
})

// Nav toggle
const navOpenTrigger = document.querySelector('.site-nav--trigger')
const navCloseTrigger = document.querySelector('.site-nav--close')
const navOpenClass = 'site-nav--open'

navOpenTrigger.addEventListener('click', (e) => {
  e.preventDefault()
  body.classList.add(navOpenClass)
})

navCloseTrigger.addEventListener('click', (e) => {
  e.preventDefault()
  body.classList.remove(...openCls)
})

// Is in viewport (top of element)
function isTopInViewport (el) {
  const rect = el.getBoundingClientRect()
  return (
    rect.top <= (window.innerHeight || document.documentElement.clientHeight)
  )
}

// Visible magic
const footer = document.querySelector('.site-footer')
document.addEventListener('scroll', function () {
  if (isTopInViewport(footer)) {
    footer.classList.add('is-visible')
    body.classList.add('footer-visible')
  } else {
    footer.classList.remove('is-visible')
    body.classList.remove('footer-visible')
  }
}, {
  passive: true
})

// Scroll up and down magic
const scrollUp = 'scroll-up'
const scrollDown = 'scroll-down'
const scrollTop = 'scroll-top'
const scrollBottom = 'scroll-bottom'
let lastScroll = 0

window.addEventListener('scroll', () => {
  const currentScroll = window.pageYOffset
  if (currentScroll <= 0) {
    // bottom
    body.classList.remove(scrollUp)
    body.classList.add(scrollTop)
    return
  }
  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollTop)
    body.classList.remove(scrollUp)
    body.classList.add(scrollDown)
  } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
    // up
    body.classList.remove(scrollTop)
    body.classList.remove(scrollDown)
    body.classList.add(scrollUp)
  }
  lastScroll = currentScroll

  // bottom
  if ((window.innerHeight + currentScroll) >= document.body.offsetHeight) {
    body.classList.add(scrollBottom)
  } else {
    body.classList.remove(scrollBottom)
  }
})

// Adds loaded class once everything has loaded so leave this at the bottom of this file
window.addEventListener('load', function (e) {
  document.documentElement.classList.add('loaded')
  // fire off any functions here
})

// jQuery
if (jQuery) {
  console.log('jQuery loaded')
} else {
  console.log('No jQuery')
}
