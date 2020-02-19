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
      <h4>Marco William</h4>
      <hr />
      <table class="table table-hover">
        <thead>
          <th scope="col"></th>
          <th scope="col">Título</th>
          <th scope="col">Emprestado em</th>
          <th scope="col">Devolvido em</th>
          <th scope="col">Situação</th>
          <th scope="col">Exemplar</th>
        </thead>
        <tbody>
          <tr v-for="item in histEmprestimos" v-bind:key="item.id">
            <label>
              <input type="checkbox" />
              <th scope="col"></th>
            </label>
            <th scope="row">{{ item.titulo }}</th>
            <td>{{ item.emprestimoData }}</td>
            <td>{{ item.devolucaoData }}</td>
            <td>{{ item.situacaoExemplar }}</td>
            <td>{{ item.exemplarEdicao }}</td>
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
  border-color:ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn1:hover {
  background-color: gray;
  color:ghostwhite;
}
.btn-btn2 {
  background-color: darkgrey;
  color: white;
  border-color:ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn2:hover {
  background-color: gray;
  color:ghostwhite;
}
.btn-btn3 {
  background-color: #080;
  color: white;
  border-color:ghostwhite;
  float: right;
  margin: 0 10px;
  border-radius: 5px;
}
.btn-btn3:hover {
  background-color: #070;
  color:ghostwhite;
}
</style>


<script>
export default {
  data() {
    return {
      histEmprestimos: [
        {
          titulo: "Avenida Paulista",
          emprestimoData: "2019-05-10",
          devolucaoData: "2019-05-25",
          situacaoExemplar: "Entregue",
          exemplarEdicao: "1"
        },
        {
          titulo: "Operação Urbana Faria Lima",
          emprestimoData: "2019-11-10",
          devolucaoData: "2019-11-23",
          situacaoExemplar: "Entregue",
          exemplarEdicao: "2"
        },
        {
          titulo: "Polis",
          emprestimoData: "2019-11-20",
          devolucaoData: "",
          situacaoExemplar: "Emprestado",
          exemplarEdicao: "2"
        },
        {
          titulo: "Cadastro de referencias urbanas: zona leste",
          emprestimoData: "2019-12-01",
          devolucaoData: "2019-12-15",
          situacaoExemplar: "Entregue",
          exemplarEdicao: "1"
        }
      ]
    };
  }
};
</script>