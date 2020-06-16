<template>
  <div class="main">
    <h1>Empréstimos</h1>
    <h2>Histórico de Empréstimos</h2>

    <!-- Botões -->
    <button class="btn btn-btn1" type="submit">Gerar Recibo</button>
    <button class="btn btn-btn2" type="submit">Dar Baixa</button>
    <button class="btn btn-btn3" type="submit">Novo Empréstimo</button>
    <!-- Botões -->

    <!-- Informações dos Empréstimos -->
    <div
      class="tab-pane"
      id="histEmprestimos"
      role="tabpanel"
      aria-labelledby="lista-livros-emprestados"
    >
      <br />
      <br />
      <table class="table table-hover">
        <thead>
          <th scope="col"></th>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Emprestado em</th>
          <th scope="col">Devolvido em</th>
          <th scope="col">Situação</th>
          <th scope="col">Exemplar</th>
        </thead>
        <tbody>
          <tr v-for="item in emprestimos" v-bind:key="item.id">
            <label>
              <input type="checkbox" />
              <th scope="col"></th>
            </label>
            <td>{{ item.IDAcervo }}</td>
            <td>Em analise.</td>
            <td>{{ item.DataEmprestimo }}</td>
            <td>{{ item.DataDevolucao }}</td>
            <td>Em analise.</td>
            <td>{{ item.EXEMPLAR }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Informações dos Empréstimos -->

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
          @click="buscarEmprestimos('/api/emprestimos')"
          v-if="pagination.prev_page_url"
        >«</button>

        <button
          class="btn btn-default"
          @click="buscarEmprestimos(pagination.prev_page_url)"
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
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) - 3))"
        >{{ pagination.current_page - 3 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 2) > 0"
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) - 2))"
        >{{ pagination.current_page - 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 1) > 0"
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) - 1))"
        >{{ pagination.current_page - 1 }}</button>
        <button class="btn btn-secondary2">{{ pagination.current_page }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 1) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) + 1))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 1 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 2) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) + 2))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 3) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.current_page) + 3))"
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
          @click="buscarEmprestimos(pagination.next_page_url)"
          v-if="pagination.next_page_url"
        >&gt;</button>
        <!-- BOTÃO - ÚLTIMA PÁGINA -->
        <button
          class="btn btn-default"
          @click="buscarEmprestimos('/api/emprestimos?page=' + (parseInt(pagination.last_page)))"
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
  color: black;
}
.container {
  padding-left: 0;
  padding-top: 0;
  color: #000;
}
table {
  color: black;
}
.btn-btn1 {
  background-color: darkgrey;
  color: white;
  border-color: ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn1:hover {
  background-color: gray;
  color: ghostwhite;
}
.btn-btn2 {
  background-color: darkgrey;
  color: white;
  border-color: ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn2:hover {
  background-color: gray;
  color: ghostwhite;
}
.btn-btn3 {
  background-color: #080;
  color: white;
  border-color: ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn3:hover {
  background-color: #070;
  color: ghostwhite;
}
.container-pagination {
  text-align: center;
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
      emprestimos: [],
      pagination: {}
    };
  },
  methods: {
    buscarEmprestimos: function(page_url) {
      document.activeElement.blur();
      let app = this;
      page_url = page_url || "/api/emprestimos";
      this.axios.get(page_url).then(function(response) {
        app.makePagination(response.data);
        app.emprestimos = response.data.data;
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
    let uri = "http://localhost:8000/api/emprestimos";
    this.axios.get(uri).then(response => {
      this.resultados = response.data;
      this.emprestimos = this.resultados.data;
    });
  },
  mounted() {
    this.buscarEmprestimos();
  }
};
</script>