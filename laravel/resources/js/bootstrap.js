import _ from 'lodash';
window._ = _;

import 'bootstrap';

try {
    window.Popper = require('@popperjs/core');
    window.bootstrap = require('bootstrap');
} catch (e) {}

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
console.log("bootstrap est bien chargé");