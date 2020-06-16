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
      <!-- <div class="col-md-3">
        <select name="pesquisa" class="form-control form-group-sm select-size">
          <option value="1">Nome</option>
          <option value="3">CPF</option>
          <option value="4">E-mail</option>
        </select>
      </div>-->
      <div class="col-md-8">
        <input
          type="search"
          v-on:keyup.enter="pesquisar()"
          v-model="termoPesquisa"
          placeholder="Digite o termo desejado"
          class="form-control"
        />
      </div>
      <div class="col-sm-2">
        <button @click="pesquisar()" type="submit" class="btn mb-2 btn-color">Pesquisar</button>
      </div>
    </div>
    <!-- pesquisa -->

    <!-- <div class="row">
      <div class="col-md-10">
        <h3>Foram localizados 06 registros em nossa base de dados</h3>
      </div>
    </div> -->
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
          <td
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.IDCorrentista }}</td>
          <td
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.NomeCorrentista }}</td>
          <td
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.Email }}</td>
        </tr>
      </tbody>
    </table>
    <!--Tabela de itens encontrados-->

    <!--Modal-->
    <div
      class="modal fade bd-example-modal-lg"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <h5 class="modal-title">Empréstimos do Usuário</h5>
          <div class="modal-header">
            <table class="table info-emprestimo">
              <tbody>
                <tr>
                  <th scope="row">ID Acervo:</th>
                  <td v-for="idacervo in itemAtual.Emprestimos" :key="idacervo.id">{{ idacervo.IDAcervo }}</td>
                </tr>
                <tr>
                  <th scope="row">Título:</th>
                  <td v-for="titulo in itemAtual.Acervo" :key="titulo.id">{{ titulo.Titulo }}</td>
                </tr>
                <tr>
                  <th scope="row">Emprestado em:</th>
                  <td v-for="dataemprestimo in itemAtual.Emprestimos" :key="dataemprestimo.id">{{ dataemprestimo.DataEmprestimo }}</td>
                </tr>
                <tr>
                  <th scope="row">Devolvido em:</th>
                  <td v-for="datadevolucao in itemAtual.Emprestimos" :key="datadevolucao.id">{{ datadevolucao.DataDevolucao }}</td>
                </tr>
                <tr>
                  <th scope="row">Situação:</th>
                  <td>Em analise.</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-color">Reservar</button>
            <button type="button" class="btn btn-secondary1" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Modal-->
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
          @click="buscarUsuarios('/api/correntistas?page=' + (parseInt(pagination.current_page) - 3))"
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
.modal-title {
  padding: 10px;
  margin-left: 12px;
  font-size: 20px;
  font-weight: bold;
  color: #0a0;
}
.info-emprestimo th {
  color: #0a0;
  font-weight: bold;
  font-size: 16px;
}
.info-emprestimo td {
  color: black;
  display: -webkit-box;
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
      itemAtual: [],
      resultados: {},
      pagination: {},
      termoPesquisa: ""
    };
  },
  methods: {
    openModal(itemDosEmprestimos) {
      this.itemAtual = itemDosEmprestimos;
      console.log(this.itemAtual);
    },
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
    },
    pesquisar: function() {
      let uri = "/api/correntistas/busca/" + this.termoPesquisa;
      this.axios.get(uri).then(response => {
        this.resultados = response.data;
        this.correntistas = this.resultados.data;
        this.makePagination(response.data);
      });
    },
    verificaValidade(propriedade) {
      if (propriedade && propriedade.length > 0) {
        return true;
      } else {
        return false;
      }
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