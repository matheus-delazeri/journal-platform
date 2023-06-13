import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery
import 'owl.carousel/dist/owl.carousel.min.js';

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        rewind: false,
        margin: 10,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            900: {
                items: 4
            }
        }
    })
});
