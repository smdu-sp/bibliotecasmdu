<template>
  <div class="container">
    <!--Div da imagem-->
    <div class="bg-home">
      <div class="alinhar-itens">
        <p class="titulo">Controle de documentos</p>
        <p class="subtitulo">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <br />
        <router-link to="catalogo">
          <input
            type="button"
            name="Visualizar Catálogo"
            class="btnVisualizarCatalogo"
            value="Visualizar Catálogo"
          />
        </router-link>
      </div>
      <img class="bg-img img-fluid" src="/images/background-home-image.jpg" />
    </div>
  </div>
</template>

<style>
.container {
  background-color: #fff;
  padding: 2em;
  font-family: Arial, Helvetica, sans-serif;
}
.bg-home {
  /*background-image: url('/images/background-home-image.jpg');*/
  /*background-repeat: no-repeat;*/
  min-height: 500px;
  text-align: center;
  width: 100%;
  left: 0;
}
.bg-img {
  position: absolute;
  width: 100vw;
  max-width: 100%;
  z-index: 0;
  left: 0;
  height: 500px;
}
.alinhar-itens {
  position: absolute;
  justify-content: center;
  top: 25%;
  bottom: 25%;
  margin: auto;
  z-index: 2;
  left: 0;
}
.titulo {
  color: white;
  font-weight: bold;
  font-size: 40px;
  text-align: center;
}
.subtitulo {
  color: white;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
  padding: 60px;
  margin-right: 200px;
  margin-left: 200px;
}
.btnVisualizarCatalogo {
  color: white;
  background-color: #c00;
  border-radius: 12px;
  border-width: 0px;
  border-color: red;
  font-size: 20px;
  font-weight: bold;
  padding: 6px;
}
.home-card {
  margin-right: 1%;
  margin-left: 1%;
  float: left;
  width: 250px;
  color: #000;
  text-align: center;
  min-height: 100px;
}
.home-card > img {
  min-height: 143px;
}
.icon-sizes {
  max-width: 90px;
  padding-top: 50px;
}
h4 {
  font-weight: bold;
  color: #000;
}
.btnCards {
  width: 150px;
  background-color: #090;
  color: white;
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  border-radius: 12px;
  border-color: #0a0;
  border-width: 0px;
  padding: 6px;
}

/* Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.98px) {
  .titulo {
  font-size: 25px;
    text-align: center;
    padding: 25px;
  }
  .subtitulo {
    font-size: 15px;
    text-align: center;
    padding: 45px;
    margin-right: 50px;
    margin-left: 50px;
}
}
/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.98px) {

}
/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {

}
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.98px) {

}
/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {

}
</style>

<script>
export default {
  mounted() {
    console.log("Componente Home montado.");
  }
};
</script>
