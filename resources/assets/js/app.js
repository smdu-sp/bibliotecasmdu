require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import VueTheMask from 'vue-the-mask';
Vue.use(VueTheMask)


import Home from './components/Home.vue';
import Cadastrar from './components/Cadastrar.vue';
import Catalogo from './components/Catalogo.vue';
import Sobre from './components/Sobre.vue';
import Usuarios from './components/Usuarios.vue';
import CadastrarLogin from './components/CadastrarLogin.vue';
import Entrar from './components/Entrar.vue';
import Emprestimos from './components/Emprestimos.vue';
import Relatorios from './components/Relatorios.vue';


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
  },
  {
      name: 'cadastrarLogin',
      path: '/cadastrarlogin',
      component: CadastrarLogin
  },
  {
      name: 'Entrar',
      path: '/entrar',
      component: Entrar
  },
  {
      name: 'Usuarios',
      path: '/usuarios',
      component: Usuarios
  },
  {
      name: 'Emprestimos',
      path: '/emprestimos',
      component: Emprestimos
  },
  {
      name: 'Relatorios',
      path: '/relatorios',
      component: Relatorios
  }
];


const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');