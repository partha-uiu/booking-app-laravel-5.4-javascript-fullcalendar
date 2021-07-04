// baikal core files
window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js/dist/umd/popper');
require('../baikal/lib/bootstrap/dist/js/bootstrap.min');
require('../baikal/lib/imagesloaded/imagesloaded.pkgd');
window.Rellax = require('../baikal/lib/rellax/rellax');
require('../baikal/js/core');
require('../baikal/lib/typed.js/dist/typed.min.js');
require('../baikal/js/main');

// 3rd party libraries
require('bootstrap-datepicker/js/bootstrap-datepicker');
require('fullcalendar/dist/fullcalendar');
require('gsap');

// custom
require('./custom');

