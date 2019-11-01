require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Home from './components/Home.vue';
import Cadastrar from './components/Cadastrar.vue';
import Catalogo from './components/Catalogo.vue';
import Sobre from './components/Sobre.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: Home
  },
  {
      name: 'cadastrar',
      path: '/cadastrar',
      component: Cadastrar
  },
  {
      name: 'catalogo',
      path: '/catalogo/:id?',
      component: Catalogo
  },
  {
      name: 'sobre',
      path: '/sobre',
      component: Sobre
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
