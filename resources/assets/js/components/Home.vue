<template>
<div class="container">

  <!--Div da imagem-->
    <div class="bg-home">
        <div class="alinhar-itens">
            <p class="titulo">Controle de documentos</p>
            <p class="subtitulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. </p>
            <br>
            <router-link to="catalogo"><input type="button" name="Visualizar Catálogo" class="btnVisualizarCatalogo" value="Visualizar Catálogo"></router-link>
        </div>
        <img class="bg-img" src="/images/background-home-image.jpg">
    </div>
  <!--Div da imagem-->

  <!--cartões de opções-->
    <!-- <div class="home-card">
        <img src="/images/novidades-icon.jpg" class="icon-sizes">
        <h4>NOVIDADES</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        <br>
        <input type="button" name="cardNovidades" class="btnCards" value="Acessar">
    </div>

    <div class="home-card">
        <img src="/images/dicas-de-leitura-icon.jpg" class="icon-sizes">
        <h4>DICAS DE LEITURA</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        <br>
        <input type="button" name="cardDicasDeLeitura" class="btnCards" value=" Acessar">
    </div>

    <div class="home-card">
        <img src="/images/mais-procurados-icon.jpg" class="icon-sizes">
        <h4>MAIS PROCURADOS</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        <br>
        <input type="button" name="cardMaisProcurados" class="btnCards" value="Acessar"> 
    </div>

    <div class="home-card">
        <img src="/images/curiosidades-icon.jpg" class="icon-sizes">
        <h4>CURIOSIDADES</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        <br>
        <input type="button" name="cardCuriosidades" class="btnCards" value="Acessar">
    </div> -->
  <!--cartões de opções-->

</div>
</template>

<style>
.container {
  background-color: #FFF;
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
    margin-right: 40px;
    margin-left: 40px;
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
</style>

<script>
export default {
    mounted() {
        console.log("Componente Home montado.");
    }
};
</script>
