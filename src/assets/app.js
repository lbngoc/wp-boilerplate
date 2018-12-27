//js/app.js
//
// Proper NPM packages can be imported with just the package name:
// require('stickybits')
//
// Packages that don't specify a 'main' in their package.json can be imported by using the full path:
// require('jquery-textfill/source/jquery.textfill.js')
//
// Packages using global functions and should loaded through script loader. If a package doesn't work; try this.
// require('script-loader!smooth-scroll');


// Bootstrap
window.$ = window.jQuery = require('jquery');

// Scripts

// Vendor scripts - require NPM packages here.

// Custom Scripts
require('./scripts/main.js')

// Styles
require('./styles/main.scss')
