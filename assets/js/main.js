/* global jQuery */

if (jQuery) {
  console.log('jQuery loaded')
} else {
  console.log('no jQuery')
}

jQuery(document).ready(function ($) {
  $('html').addClass('js')
  // Nav Trigger
  $('.push-nav-trigger').on('click', function (event) {
    event.preventDefault()
    $('body').toggleClass('navigation-is-open')
  })
// eol
})
