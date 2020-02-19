<template>
  <div class="main">
    <h1>Cadastrar Item</h1>
    <h2>Formulário para cadastro de novos materiais</h2>
    <form @submit.prevent="adicionarItem">
      <!-- Formulario de Cadastro -->
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Título da obra:</label>
            <input type="text" class="form-control" v-model="item.Titulo" placeholder="Título" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Data Publicação:</label>
            <input type="date" class="form-control" v-model="item.Data" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tipo:</label>
            <select name="selectTipo" class="form-control form-group-md select-size">
              <option value="1">Livro</option>
              <option value="2">Artigo</option>
              <option value="3">Revista</option>
              <option value="4">Jornal</option>
              <option value="5">CD-ROM</option>
              <option value="6">Enciclopédia</option>
              <option value="7">Diário Oficial</option>
              <option value="8">Mapa</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Código:</label>
            <input type="number" class="form-control" v-model="item.Codigo" placeholder="0001" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Autor(es):</label>
            <input
              type="text"
              class="form-control"
              v-model="item.Autor"
              placeholder="Nome dos autores"
            />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Editora:</label>
            <input
              type="text"
              class="form-control"
              v-model="item.Editora"
              placeholder="Nome da Editora"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Resumo/Sinopse:</label>
            <textarea
              class="form-control resumo-sinopse"
              v-model="item.Sinopse"
              placeholder="Sinopse da obra ou breve resumo."
            ></textarea>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Nº Páginas:</label>
            <input type="number" class="form-control" v-model="item.NPaginas" placeholder="ex: 157" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Assunto:</label>
            <input
              type="text"
              class="form-control"
              v-model="item.Assunto"
              placeholder="ex: Ficção Científica"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label>Edição:</label>
            <input type="number" class="form-control" v-model="item.Edicao" placeholder="ex: 03" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Versão:</label>
            <input type="number" class="form-control" v-model="item.Versao" placeholder="ex: 1.0.1" />
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label>Endereço:</label>
            <input
              type="text"
              class="form-control"
              v-model="item.Endereco"
              placeholder="ex: Rua São Bento, 404 - São Paulo, SP - Centro"
            />
          </div>
        </div>
      </div>
      <!-- Formulario de Cadastro -->
      
      <!-- Botão de Enviar Cadastro -->
      <br />
      <div class="form-group">
        <button class="btn mb-2 btn-color">Cadastrar</button>
      </div>
      <!-- Botão de Enviar Cadastro -->

    </form>
  </div>
</template>

<style>
.main {
  padding: 2em;
  font-family: Arial, Helvetica, sans-serif;
  color: inherit;
}
h1 {
  color: #000;
  font-weight: bold;
}
h2 {
  font-size: 28px;
  font-style: italic;
  color: black;
}
.resumo-sinopse {
  max-width: 100%; 
  min-width: 100%; 
  min-height: 80px
}
.btn-color {
  width: 120.75px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
  padding-left: 0;
}
.btn-color:hover {
  background-color: #080;
  color: #fff;
}
.form-group {
  color: black;
}
</style>

<script>
export default {
  mounted() {
    console.log("Componente Cadastrar montado.");
  },
  data() {
    return {
      item: {}
    };
  },
  methods: {
    adicionarItem() {
      let uri = "http://bibliotecasmdu/api/acervo/cadastrar";
      this.axios.post(uri, this.item).then(response => {
        this.$router.push({ name: "acervo" });
      });
    }
  }
};
</script>