import Vue from 'vue'

Vue.filter('formatDatetime', val => {
  return Date.create(val).format()
});

