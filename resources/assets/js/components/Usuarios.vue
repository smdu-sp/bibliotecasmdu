<template>
  <div class="main">
    <h1>Usuários</h1>
    <h2>Localizar usuário</h2>

    <br />
    <!-- pesquisa -->
    <div class="linha-pesquisa row">
      <div class="col-sm-2">
        <label class="lbPesquisar">Pesquisar por:</label>
      </div>
      <div class="col-md-3">
        <select name="pesquisa" class="form-control form-group-sm select-size">
          <option value="1">Nome</option>
          <option value="3">CPF</option>
          <option value="4">E-mail</option>
        </select>
      </div>
      <div class="col-md-5">
        <input type="search" placeholder="Digite o termo desejado" class="form-control" />
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn mb-2 btn-color">Pesquisar</button>
      </div>
    </div>
    <!-- pesquisa -->

    <div class="row">
      <div class="col-md-10">
        <h3>Foram localizados 06 registros em nossa base de dados</h3>
      </div>
    </div>
    <br />

    <!--Tabela de itens encontrados-->
    <table class="table table-hover">
      <thead>
        <tr class="titulos-pesquisa">
          <th scope="col">ID</th>
          <th scope="col">CPF</th>
          <th scope="col">E-mail</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in correntistas" v-bind:key="item.id">
          <td>
            <a href="/emprestimos" class="pointer">{{ item.IDCorrentista }}</a>
          </td>
          <td>
            <a href="/emprestimos" class="pointer">{{ item.NomeCorrentista }}</a>
          </td>
          <td>
            <a href="/emprestimos" class="pointer">{{ item.Email }}</a>
          </td>
        </tr>
      </tbody>
    </table>
    <!--Tabela de itens encontrados-->

    <hr />

    <!--Paginação-->
    <div class="container-pagination">
      <div class="pagination">
        <!-- <a
          href="#"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Primeira página"
          class="pointer"
        >«</a>
        <a
          href="#"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Anterior"
          class="pointer"
        >&lt;</a>-->
        <button
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas')"
          v-if="pagination.prev_page_url"
        >«</button>

        <button
          class="btn btn-default"
          @click="buscarUsuarios(pagination.prev_page_url)"
          v-if="pagination.prev_page_url"
        >&lt;</button>
        <!-- <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>-->
        <button
          v-if="(parseInt(pagination.current_page) - 3) > 0"
          class="btn btn-default"
          @click="buscarUsuarios('/api/acervo?page=' + (parseInt(pagination.current_page) - 3))"
        >{{ pagination.current_page - 3 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 2) > 0"
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) - 2))"
        >{{ pagination.current_page - 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 1) > 0"
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) - 1))"
        >{{ pagination.current_page - 1 }}</button>
        <button class="btn btn-secondary2">{{ pagination.current_page }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 1) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) + 1))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 1 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 2) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) + 2))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 3) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) + 3))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page +3 }}</button>
        <!-- <a
          href="#"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Próxima"
          class="pointer"
        >&gt;</a>
        <a
          href="#"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Última página"
          class="pointer"
        >»</a>-->
        <button
          class="btn btn-default"
          @click="buscarUsuarios(pagination.next_page_url)"
          v-if="pagination.next_page_url"
        >&gt;</button>
        <!-- BOTÃO - ÚLTIMA PÁGINA -->
        <button
          class="btn btn-default"
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.last_page)))"
          v-if="pagination.next_page_url"
        >»</button>
      </div>
    </div>
    <!--Paginação-->
  </div>
</template>


<style>
.main {
  padding: 2em;
  font-family: Arial, Helvetica, sans-serif;
}
h1 {
  color: #000;
  font-weight: bold;
}
h2 {
  font-size: 28px;
  font-style: italic;
}
.container {
  padding-left: 0;
  padding-top: 0;
  color: #000;
}
.pointer {
  cursor: pointer;
}
.lbPesquisar {
  font-size: 18px;
  color: #000;
}
.select-size {
  width: 200px;
  color: #000;
  font-weight: bold;
}
.btn-color {
  width: 120.75px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
}
.btn-color:hover {
  background-color: #080;
  color: #fff;
}
h3 {
  font-size: 26px;
  font-style: italic;
  color: #090;
  padding-top: 20px;
}
.titulos-pesquisa th {
  color: #000;
  font-weight: bold;
  font-size: 18px;
}
td {
  max-width: 100px;
  font-size: 16px;
  color: #000;
}
a {
  color: inherit;
}
a:hover {
  color: inherit;
  text-decoration: none;
}
.container-pagination {
  text-align: center;
}
.pagination {
  display: inline-block;
}
.pagination button {
  display: inline-block;
  color: black;
  padding: 8px 16px;
  text-decoration: none;
  border: none;
  border-radius: 15px;
}
.linha-pesquisa > :first-child {
  padding-left: 1em;
}
</style>


<script>
export default {
  data() {
    return {
      correntistas: [],
      pagination: {}
    };
  },
  methods: {
    buscarUsuarios: function(page_url) {
      document.activeElement.blur();
      let app = this;
      page_url = page_url || "/api/correntistas";
      this.axios.get(page_url).then(function(response) {
        app.makePagination(response.data);
        app.correntistas = response.data.data;
      });
    },
    makePagination: function(data) {
      var cPagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url
      };
      this.pagination = cPagination;
    }
  },
  created() {
    let uri = "http://localhost:8000/api/correntistas";
    this.axios.get(uri).then(response => {
      this.resultados = response.data;
      this.acervo = this.resultados.data;
    });
  },
  mounted() {
    this.buscarUsuarios();
  }
};
</script>