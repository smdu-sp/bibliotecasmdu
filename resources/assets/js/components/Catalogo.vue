<template>
  <div class="main">
    <h1>Catálogo de Documentos</h1>
    <h2>Localize em nosso catálogo o documento desejado</h2>

    <div class="header">
      <div class="sub-header">
        <div class="item-header">Pesquisar por:</div>
      </div>
      <div class="sub-header">
        <div class="item-header">
        <form action="/action_page.php">
          <select name="pesquisa" size="1">
            <option value="autor">Autor</option>
            <option value="assunto">Assunto</option>
            <option value="palavra">Palavra</option>
            <option value="titulo">Título</option>
          </select>
        </form></div>
        </div>
        <div class="sub-header">
        <div class="item-header">
        <input type="search" placeholder="Digite o termo desejado" />
        </div>
        </div>
        <div class="sub-header">
        <div class="item-header">
          <input type="button" class="btnPesquisar" value="Pesquisar">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'cadastrar' }" class="btn btn-primary">Cadastrar Item</router-link>
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in acervo" :key="item.id">
          <td>{{ item.IDAcervo }}</td>
          <td>{{ item.Titulo }}</td>
          <td>{{ item.Notas }}</td>
          <td>
            <router-link
              :to="{name: 'atualizar', params: { id: item.IDAcervo }}"
              class="btn btn-primary"
            >Atualizar</router-link>
          </td>
          <td>
            <button class="btn btn-danger">Deletar</button>
          </td>
        </tr>
      </tbody>
    </table>
    <hr />
    <div>
      <a :href="resultados.prev_page_url">Anterior</a>
      <a :href="resultados.next_page_url">Próxima</a>
    </div>
  </div>
</template>

<style>
h1 {
  color: #000;
  font-weight: bold;
}
h2 {
  color: #000;
  font-style: italic;
}
.main {
  padding: 2em;
}
.header {
  width: 100%;
  display: table;
}
.sub-header {
  display: table-cell;
}
.item-header {
  margin-left: 25px;
}
.sub-header:first-subheader .item-header {
  margin-left: 0;
}

</style>

<script>
export default {
  data() {
    return {
      acervo: [],
      resultados: {}
    };
  },
  created() {
    let uri = "http://localhost:8000/api/acervo";
    this.axios.get(uri).then(response => {
      this.resultados = response.data;
      this.acervo = this.resultados.data;
    });
  }
};
</script>