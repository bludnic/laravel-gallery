
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


/*
 * Sort images by user.
 * /views/admin/pages/images.blade.php
 */
(function () {
  const select = document.getElementById('sort_by_user')
  if (select) {
    const url = select.getAttribute('data-url')
    select.onchange = function () {
      const value = this.options[this.selectedIndex].value
      if (value.length > 0) {
        location.href = `${url}?user_id=${value}`
      } else {
        location.href = url
      }
    }
  }
})();