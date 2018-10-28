import $ from 'jquery';
import './components/slider';
import './components/navigation';
import 'slick-carousel';

$(document).ready(() => {
  $(".c-post__gallery").slick({
    arrows: false,
    adaptiveHeight: true,
  });
})