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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm1haW4uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoibWFpbi5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qIGdsb2JhbHMgalF1ZXJ5LCBNb2Rlcm5penIgKi9cbid1c2Ugc3RyaWN0J1xuXG5jb25zdCBtcVNtYWxsID0gJyhtYXgtd2lkdGg6IDk2MHB4KSdcbmNvbnN0IG1xRGVza3RvcCA9ICcobWluLXdpZHRoOiA5NjFweCknXG5cbmNvbnN0IGJvZHkgPSBkb2N1bWVudC5ib2R5XG5cbmNvbnN0IG9wZW5DbHMgPSBbJ3BhbmVsLS1vcGVuJywgJ2JveC0tb3BlbicsICdzaXRlLW5hdi0tb3BlbiddXG5jb25zdCBzaGFkb3cgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYy1zaGFkb3cnKVxuc2hhZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xuICBib2R5LmNsYXNzTGlzdC5yZW1vdmUoLi4ub3BlbkNscylcbn0pXG5cbi8vIE5hdiB0b2dnbGVcbmNvbnN0IG5hdk9wZW5UcmlnZ2VyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtbmF2LS10cmlnZ2VyJylcbmNvbnN0IG5hdkNsb3NlVHJpZ2dlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zaXRlLW5hdi0tY2xvc2UnKVxuY29uc3QgbmF2T3BlbkNsYXNzID0gJ3NpdGUtbmF2LS1vcGVuJ1xuXG5uYXZPcGVuVHJpZ2dlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChlKSA9PiB7XG4gIGUucHJldmVudERlZmF1bHQoKVxuICBib2R5LmNsYXNzTGlzdC5hZGQobmF2T3BlbkNsYXNzKVxufSlcblxubmF2Q2xvc2VUcmlnZ2VyLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGUpID0+IHtcbiAgZS5wcmV2ZW50RGVmYXVsdCgpXG4gIGJvZHkuY2xhc3NMaXN0LnJlbW92ZSguLi5vcGVuQ2xzKVxufSlcblxuLy8gSXMgaW4gdmlld3BvcnQgKHRvcCBvZiBlbGVtZW50KVxuZnVuY3Rpb24gaXNUb3BJblZpZXdwb3J0IChlbCkge1xuICBjb25zdCByZWN0ID0gZWwuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KClcbiAgcmV0dXJuIChcbiAgICByZWN0LnRvcCA8PSAod2luZG93LmlubmVySGVpZ2h0IHx8IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGllbnRIZWlnaHQpXG4gIClcbn1cblxuLy8gVmlzaWJsZSBtYWdpY1xuY29uc3QgZm9vdGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtZm9vdGVyJylcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIGZ1bmN0aW9uICgpIHtcbiAgaWYgKGlzVG9wSW5WaWV3cG9ydChmb290ZXIpKSB7XG4gICAgZm9vdGVyLmNsYXNzTGlzdC5hZGQoJ2lzLXZpc2libGUnKVxuICAgIGJvZHkuY2xhc3NMaXN0LmFkZCgnZm9vdGVyLXZpc2libGUnKVxuICB9IGVsc2Uge1xuICAgIGZvb3Rlci5jbGFzc0xpc3QucmVtb3ZlKCdpcy12aXNpYmxlJylcbiAgICBib2R5LmNsYXNzTGlzdC5yZW1vdmUoJ2Zvb3Rlci12aXNpYmxlJylcbiAgfVxufSwge1xuICBwYXNzaXZlOiB0cnVlXG59KVxuXG4vLyBTY3JvbGwgdXAgYW5kIGRvd24gbWFnaWNcbmNvbnN0IHNjcm9sbFVwID0gJ3Njcm9sbC11cCdcbmNvbnN0IHNjcm9sbERvd24gPSAnc2Nyb2xsLWRvd24nXG5jb25zdCBzY3JvbGxUb3AgPSAnc2Nyb2xsLXRvcCdcbmNvbnN0IHNjcm9sbEJvdHRvbSA9ICdzY3JvbGwtYm90dG9tJ1xubGV0IGxhc3RTY3JvbGwgPSAwXG5cbndpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCAoKSA9PiB7XG4gIGNvbnN0IGN1cnJlbnRTY3JvbGwgPSB3aW5kb3cucGFnZVlPZmZzZXRcbiAgaWYgKGN1cnJlbnRTY3JvbGwgPD0gMCkge1xuICAgIC8vIGJvdHRvbVxuICAgIGJvZHkuY2xhc3NMaXN0LnJlbW92ZShzY3JvbGxVcClcbiAgICBib2R5LmNsYXNzTGlzdC5hZGQoc2Nyb2xsVG9wKVxuICAgIHJldHVyblxuICB9XG4gIGlmIChjdXJyZW50U2Nyb2xsID4gbGFzdFNjcm9sbCAmJiAhYm9keS5jbGFzc0xpc3QuY29udGFpbnMoc2Nyb2xsRG93bikpIHtcbiAgICAvLyBkb3duXG4gICAgYm9keS5jbGFzc0xpc3QucmVtb3ZlKHNjcm9sbFRvcClcbiAgICBib2R5LmNsYXNzTGlzdC5yZW1vdmUoc2Nyb2xsVXApXG4gICAgYm9keS5jbGFzc0xpc3QuYWRkKHNjcm9sbERvd24pXG4gIH0gZWxzZSBpZiAoY3VycmVudFNjcm9sbCA8IGxhc3RTY3JvbGwgJiYgYm9keS5jbGFzc0xpc3QuY29udGFpbnMoc2Nyb2xsRG93bikpIHtcbiAgICAvLyB1cFxuICAgIGJvZHkuY2xhc3NMaXN0LnJlbW92ZShzY3JvbGxUb3ApXG4gICAgYm9keS5jbGFzc0xpc3QucmVtb3ZlKHNjcm9sbERvd24pXG4gICAgYm9keS5jbGFzc0xpc3QuYWRkKHNjcm9sbFVwKVxuICB9XG4gIGxhc3RTY3JvbGwgPSBjdXJyZW50U2Nyb2xsXG5cbiAgLy8gYm90dG9tXG4gIGlmICgod2luZG93LmlubmVySGVpZ2h0ICsgY3VycmVudFNjcm9sbCkgPj0gZG9jdW1lbnQuYm9keS5vZmZzZXRIZWlnaHQpIHtcbiAgICBib2R5LmNsYXNzTGlzdC5hZGQoc2Nyb2xsQm90dG9tKVxuICB9IGVsc2Uge1xuICAgIGJvZHkuY2xhc3NMaXN0LnJlbW92ZShzY3JvbGxCb3R0b20pXG4gIH1cbn0pXG5cbi8vIEFkZHMgbG9hZGVkIGNsYXNzIG9uY2UgZXZlcnl0aGluZyBoYXMgbG9hZGVkIHNvIGxlYXZlIHRoaXMgYXQgdGhlIGJvdHRvbSBvZiB0aGlzIGZpbGVcbndpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKGUpIHtcbiAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2xvYWRlZCcpXG4gIC8vIGZpcmUgb2ZmIGFueSBmdW5jdGlvbnMgaGVyZVxufSlcblxuLy8galF1ZXJ5XG5pZiAoalF1ZXJ5KSB7XG4gIGNvbnNvbGUubG9nKCdqUXVlcnkgbG9hZGVkJylcbn0gZWxzZSB7XG4gIGNvbnNvbGUubG9nKCdObyBqUXVlcnknKVxufVxuIl19
