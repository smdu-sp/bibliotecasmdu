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
      <h4>{{ itemAtual.NomeCorrentista}}</h4>
      <hr />
      <table class="table table-hover">
        <thead>
          <th scope="col">Título</th>
          <th scope="col">Emprestado em</th>
          <th scope="col">Devolvido em</th>
          <th scope="col">Situação</th>
          <th scope="col">Exemplar</th>
        </thead>
        <tbody>
          <tr>
            <label>
              <input type="checkbox" />
              <th scope="col"></th>
            </label>
            <th scope="row">{{ itemAtual.titulo }}</th>
            <td>{{ itemAtual.emprestimoData }}</td>
            <td>{{ itemAtual.devolucaoData }}</td>
            <td>{{ itemAtual.situacaoExemplar }}</td>
            <td>{{ itemAtual.exemplarEdicao }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Informações dos Empréstimos -->
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
h4 {
  color: #080;
  font-weight: bold;
  font-size: 22px;
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
    Emprestimos(itemDoCorrentistas) {
      this.itemAtual = itemDoCorrentistas;
      console.log(this.itemAtual);
    },
    checkUserLevel(userLevel) {
      return userLevel === this.$parent.userLevel;
    },
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