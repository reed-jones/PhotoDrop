/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueClazyLoad from "vue-clazy-load";
// import VueImg from "./v-img";

require("./bootstrap");

window.Vue = require("vue");
Vue.use(VueClazyLoad);
// Vue.use(VueImg, {
//   altAsTitle: false
// });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("photoSquare", require("./components/photoSquare.vue"));
Vue.component("videoSquare", require("./components/videoSquare.vue"));
Vue.component("uploadBox", require("./components/uploadBox.vue"));

const app = new Vue({
  el: "#app"
});

// function assign(target, firstSource) {
//   if (target === undefined || target === null) {
//     throw new TypeError("Cannot convert first argument to object");
//   }

//   var to = Object(target);
//   for (var i = 1; i < arguments.length; i++) {
//     var nextSource = arguments[i];
//     if (nextSource === undefined || nextSource === null) {
//       continue;
//     }

//     var keysArray = Object.keys(Object(nextSource));
//     for (
//       var nextIndex = 0, len = keysArray.length;
//       nextIndex < len;
//       nextIndex++
//     ) {
//       var nextKey = keysArray[nextIndex];
//       var desc = Object.getOwnPropertyDescriptor(nextSource, nextKey);
//       if (desc !== undefined && desc.enumerable) {
//         to[nextKey] = nextSource[nextKey];
//       }
//     }
//   }
//   return to;
// }

// function polyfill() {
//   if (!Object.assign) {
//     Object.defineProperty(Object, "assign", {
//       enumerable: false,
//       configurable: true,
//       writable: true,
//       value: assign
//     });
//   }
// }

// module.exports = {
//   assign: assign,
//   polyfill: polyfill
// };
