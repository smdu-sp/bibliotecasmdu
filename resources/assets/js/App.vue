<template>
  <div class="main" >
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

      <router-link to="/login">
      <img src="../img/login-icon.jpg" alt="login" class="header-icon to-the-right" />
      </router-link>
      
    </div>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>

    <footer class="">
      <div class="container">
        <div class="columns">
          <div class="colun">
            <p><strong> Secretaria Municipal de Urbanismo e Licenciamento (SMUL) Prefeitura de São Paulo</strong></p>
          </div>
          <p>Rua São Bento, 405, Centro - 18º andar, CEP 01011-100 - São Paulo - SP, Telefone: (11)3113 7500</p>
        </div>
        <div class="">

        </div>
      </div>
    </footer>

  </div>
</template>
 
<style>
 .main {
  background-color: #FFF;
  padding-top: 2em;
}
.container {
  padding-top: 2em;
}
.header-icon {
  max-width: 150px;
  padding-left: 2em;
  padding-top: 1.5em;
}
.to-the-right {
  float: right;
  padding-top: 3em;
  padding-right: 2em;
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
footer {
  padding-top: 3em;
  padding-bottom: 3em;
  font-size: 16px;
  text-align: center;
  color: #000;
}
</style>

<script>
export default {};
</script>
