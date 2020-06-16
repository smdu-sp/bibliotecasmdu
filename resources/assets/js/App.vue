<template>
  <div class="main">
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

      <router-link to="/usuarios">
        <img src="../img/usuario-icon.jpg" alt="Usuarios" class="header-icon" />
      </router-link>

      <router-link to="/emprestimos">
        <img src="../img/emprestimos-icon.jpg" alt="Emprestimos" class="header-icon" />
      </router-link>

      <router-link to="/relatorios">
        <img src="../img/relatorios-icon.jpg" alt="Relatorios" class="header-icon" />
      </router-link>

      <!-- <router-link to="/etiquetas">
        <img src="../img/etiquetas-icon.jpg" alt="Etiquetas" class="header-icon" />
      </router-link>-->

      <a class="pointer">
        <img
          src="../img/login-icon.jpg"
          alt="login"
          class="header-icon to-the-right"
          @click="openModal"
          data-toggle="modal"
          data-target=".chamar-modal"
        />
      </a>
    </div>
    <!-- <Header></Header> -->
    <transition name="fade">
      <router-view></router-view>
    </transition>

    <!--Modal-login-->
    <div
      class="modal fade chamar-modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-style">
        <div class="modal-content">
          <h5 class="modal-title">Login</h5>

          <form>
            <div class="form-group row">
              <label class="col-sm-1 col-form-label">
                <img src="../img/user-icon.jpg" alt="user" class="login-icon-style" />
              </label>
              <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Ex: joaodasilva@gmail.com" />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-1 col-form-label">
                <img src="../img/password-icon.jpg" alt="password" class="login-icon-style" />
              </label>
              <div class="col-sm-11">
                <input type="password" class="form-control" placeholder="Senha" />
              </div>
            </div>
          </form>

          <div class="modal-footer">
            <label>
              <a href="/cadastrarlogin">Criar login</a>
            </label>
            <a href="/entrar" class="btn btn-modal">Entrar</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Modal-login-->

    <footer class>
      <div class="container">
        <div class="columns">
          <div class="colun">
            <p>
              <strong>Secretaria Municipal de Urbanismo e Licenciamento (SMUL) Prefeitura de São Paulo</strong>
            </p>
          </div>
          <p>Rua São Bento, 405, Centro - 18º andar, CEP 01011-100 - São Paulo - SP, Telefone: (11) 3113-7500</p>
        </div>
        <div class></div>
      </div>
    </footer>
  </div>
</template>
 
<style>
.main {
  background-color: #fff;
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
.login-icon-style {
  width: 30px;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
.modal-content {
  padding: 15px;
}
.modal-style {
  width: 400px;
}
.modal-title {
  padding: 10px;
  margin-left: 12px;
  font-size: 20px;
  font-weight: bold;
  color: #0a0;
}
a {
  color: gray;
}
a:hover {
  color: lightslategrey;
  text-decoration: none;
}
.btn-modal {
  width: 70.39px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
  padding-left: 10px;
  text-align: center;
}
.btn-modal:hover {
  color: lightgrey;
  background-color: #080;
}
.pointer {
  cursor: pointer;
}
.user-width {
  width: 300px;
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
import Header from "./components/Header.vue";

export default {
  name: "Biblioteca",
  components: {
    Header
  },
  data() {
    return {
      userLevel: "unknown"
    };
  },
  methods: {
    openModal() {
      // Função do Bootstrap
    }
  }
};
</script>