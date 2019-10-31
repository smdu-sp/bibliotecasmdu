<template>
  <div class="container">
    <div>
      <router-link to="/">
        <img src="../img/logo-prefeitura.jpg" alt="Home" class="logo" />
      </router-link>

      <!--<router-link to="/cadastrar">Cadastrar Item</router-link>-->

      <router-link to="/sobre">
        <img src="../img/sobre-icon.jpg" alt="Sobre" class="header-icon" />
      </router-link>

      <router-link to="/catalogo">
        <img src="../img/catalogo-icon.jpg" alt="Catalogo" class="header-icon" />
      </router-link>

      <img src="../img/login-icon.jpg" alt="login" class="header-icon" />
    </div>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
.container {
  padding-top: 2em;
}
.header-icon {
  max-width: 150px;
  padding-left: 2em;
  padding-top: 1.5em;
}
.logo {
  max-width: 300px;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>

<script>
export default {};
</script>
