<template>

  <div class="container">
    <div class="bg-home">
      <div class="alinhar-itens">
      <p class="titulo">Controle de documentos</p>
      <p class="subtitulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. </p>
      <br>
      <button class="btnVisualizarCatalogo">Visualizar Catálogo</button>
    </div>
  </div>

  <div class="home-card">
    <img src="/images/novidades-icon.jpg" class="icon-sizes">
    <h4>NOVIDADES</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
      <br>
      <button class="btnCards">Acessar</button>
  </div>

  <div class="home-card">
    <img src="/images/dicas-de-leitura-icon.jpg" class="icon-sizes">
    <h4>DICAS DE LEITURA</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
      <br>
      <button class="btnCards">Acessar</button>
  </div>

  <div class="home-card">
    <img src="/images/mais-procurados-icon.jpg" class="icon-sizes">
    <h4>MAIS PROCURADOS</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
      <br>
      <button class="btnCards">Acessar</button>
  </div>

  <div class="home-card">
    <img src="/images/curiosidades-icon.jpg" class="icon-sizes">
    <h4>CURIOSIDADES</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
      <br>
      <button class="btnCards">Acessar</button>
  </div>



</div>

</template>

<style>
.bg-home {
  background-image: url('/images/background-home-image.jpg');
  background-repeat: no-repeat;
  min-height: 500px;
  -webkit-filter: brightness(50%);
  text-align: center;
  opacity: 0.9;
}
.alinhar-itens {
position: absolute;
top: 25%; 
bottom: 25%;
margin: auto;
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
}
.btnVisualizarCatalogo {
  color: white;
  background-color: red;
  border-radius: 12px;
  font-size: 20px;
  font-weight: bold;
  padding: 6px;  
}
.home-card {
  margin-right: auto;
  margin-left: auto;
  float: left;
  width: 250px;
  color: #000;
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
  background-color: green;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 12px;
  padding: 6px;
}
</style>

<script>
export default {
  mounted() {
    console.log("Componente Home montado.");
  }
};
</script>
