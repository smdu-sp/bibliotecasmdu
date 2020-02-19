<template>
  <div class="main">
    <h1>Relatórios</h1>
    <h2>Consulte as publicações que estão emprestadas</h2>

    <br />
    <!-- pesquisa -->
    <div class="linha-pesquisa row">
      <div class="col-sm-2">
        <label class="lbPesquisar">Pesquisar por:</label>
      </div>
      <div class="col-md-3">
        <select name="pesquisa" class="form-control form-group-sm select-size">
          <option value="1">Título publicação</option>
          <option value="3">Usuário</option>
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
        <h3>Foram localizados 04 registros em nossa base de dados</h3>
      </div>
    </div>
    <br />

    <!--Tabela de itens encontrados-->
    <table class="table table-hover">
      <thead>
        <tr class="relatorios-pesquisa">
          <th scope="col">Título</th>
          <th scope="col">Autor</th>
          <th scope="col">Devolução</th>
          <th scope="col">Edição</th>
          <th scope="col">Situação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in relatorio" v-bind:key="item.id">
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".modal-relatorio"
            class="pointer"
          >{{ item.tituloItem }}</td>
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".modal-relatorio"
            class="pointer"
          >{{ item.autorItem }}</td>
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".modal-relatorio"
            class="pointer"
          >{{ item.devolucaoData }}</td>
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".modal-relatorio"
            class="pointer"
          >{{ item.edicaoData }}</td>
          <td>
            <div class="disponivel" v-if="item.devolucaoData >= '20/12/2019'">Disponível</div>
            <div class="atrasado" v-if="item.devolucaoData <= '20/12/2019'">Atrasado</div>
          </td>
        </tr>
      </tbody>
    </table>
    <!--Tabela de itens encontrados-->

    <!--Modal-->
    <div
      class="modal fade modal-relatorio"
      id="ExemploModalCentralizado"
      tabindex="-1"
      role="dialog"
      aria-labelledby="TituloModalCentralizado"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
          </div>
          <table class="table info-obra">
            <tbody>
              <tr>
                <th scope="row">Titulo:</th>
                <td>Título da obra</td>
              </tr>
              <tr>
                <th scope="row">Autor:</th>
                <td>SOBRENOME, Primeiro Segundo Nome</td>
              </tr>
              <tr>
                <th scope="row">Nome:</th>
                <td>Marco Willian</td>
              </tr>
              <tr>
                <th scope="row">E-mail:</th>
                <td>marcowilliam1@gmail.com</td>
              </tr>
              <tr>
                <th scope="row">Devolução prevista:</th>
                <td>12/01/2020</td>
              </tr>
              <tr>
                <th scope="row">Situação:</th>
                <td>Atrasado</td>
              </tr>
            </tbody>
          </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary1" data-dismiss="modal">Fechar</button>
        </div>
        </div>
      </div>
    </div>
    <!--Modal-->

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
  color: #000;
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
.relatorios-pesquisa {
  color: #000;
  font-weight: bold;
  font-size: 18px;
}
.titulos-pesquisa th {
  color: #000;
  font-weight: bold;
  font-size: 18px;
}
table, td, a {
  color: black;
  font-size: 16px;
}
.disponivel {
  color: #080;
  font-weight: bold;
  font-style: italic;
}
.atrasado {
  color: red;
  font-weight: bold;
  font-style: italic;
}
.modal-title {
  padding: 10px;
  margin-left: 12px;
  font-size: 20px;
  font-weight: bold;
  color: #0a0;
}
</style>

<script>
export default {
  data() {
    return {
      methods: {
        openModal() {
          // Função do Bootstrap
        }
      },
      relatorio: [
        {
          tituloItem: "Avenida Paulista",
          autorItem: "Primeiro Nome Sobrenome",
          devolucaoData: "25/05/2019",
          edicaoData: "01"
        },
        {
          tituloItem: "Operação Urbana Faria Lima",
          autorItem: "Primeiro Nome Sobrenome",
          devolucaoData: "20/11/2019",
          edicaoData: "03"
        },
        {
          tituloItem: "Polis",
          autorItem: "Primeiro Nome Sobrenome",
          devolucaoData: "12/01/2020",
          edicaoData: "02"
        },
        {
          tituloItem: "Cadastro de referencias urbanas: zona leste",
          autorItem: "Primeiro Nome Sobrenome",
          devolucaoData: "16/01/2020",
          edicaoData: "01"
        }
      ]
    };
  }
};
</script>