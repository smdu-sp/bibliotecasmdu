<template>
  <div class="main">
    <h1>Catálogo de Documentos</h1>
    <h2>Localize em nosso catálogo o documento desejado</h2>

    <!--pesquisa-->
    <div class="linha-pesquisa row">
      <div class="col-sm-2">
        <label class="lbPesquisar">Pesquisar por:</label>
      </div>
      <div class="col-md-3">
        <select name="pesquisa" class="form-control form-group-sm select-size">
          <option value="1">Autor</option>
          <option value="2">Assunto</option>
          <option value="3">Palavra</option>
          <option value="4">Título</option>
        </select>
      </div>
      <div class="col-md-5">
        <input type="search" placeholder="Digite o termo desejado" class="form-control" />
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn mb-2 btn-color">Pesquisar</button>
      </div>
    </div>
    <!--pesquisa-->

    <div class="row">
      <div class="col-md-10">
        <h3>Foram localizados 10 registros em nossa base de dados</h3>
      </div>
      <div class="col-md-2" style="padding-top: 20px;">
        <router-link :to="{ name: 'cadastrar' }" class="btn btn-secondary1">Cadastrar Item</router-link>
      </div>
    </div>
    <br />

    <!--Tabela de itens encontrados-->
    <table class="table table-hover">
      <thead>
        <tr class="titulos-pesquisa">
          <th class="col-sm-1">ID</th>
          <th class="col-sm-4">Título</th>
          <th class="col-sm-4">Notas</th>
          <th class="col-sm-3">Autoria</th>
        </tr>
      </thead>
      <tbody class="table-body">
        <tr v-for="item in acervo" :key="item.id">
          <td
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.IDAcervo }}</td>
          <td
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.Titulo }}</td>
          <td 
          v-if="item.Notas"
          @click="openModal(item)"
          data-toggle="modal"
          data-target=".bd-example-modal-lg"
          class="pointer"
          >{{ item.Notas }}</td>
          <td v-else
          @click="openModal(item)"
          data-toggle="modal"
          data-target=".bd-example-modal-lg"
          class="pointer"
          >Não há notas disponíveis.</td>
          <!-- <td v-if="false">
            <router-link
              :to="{name: 'atualizar', params: { id: item.IDAcervo }}"
              class="btn btn-primary"
            >Atualizar</router-link>
          </td> -->
          <td
           v-if="item.Autores.length > 0"
            @click="openModal(item)"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
           ><ul>
              <li v-for="autor in item.Autores" :key="autor.id">{{ autor.NomeDoAutor }}</li>
            </ul>
          </td>
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
          <h5 class="modal-title">Informações da obra</h5>
          <div class="modal-header">
            <table class="table info-obra">
              <tbody>
                <tr>
                  <th scope="row">Titulo:</th>
                  <td>{{ itemAtual.Titulo }}</td>
                </tr>
                <tr>
                  <th scope="row">Subtítulo:</th>
                  <td v-if="itemAtual.Subtítulo">{{ itemAtual.SubTitulo }}</td>
                  <td v-else>Não há subtítulo disponível.</td>
                </tr>
                <tr>
                  <th scope="row">Autoria:</th>
                  <td v-for="autor in itemAtual.Autores" :key="autor.id">{{ autor.NomeDoAutor }}</td>
                </tr>
                <tr>
                  <th scope="row">Descrição:</th>
                  <td v-if="itemAtual.Resumo">{{ itemAtual.Resumo }}</td>
                  <td v-else>Não há descrição disponível.</td>
                </tr>
                <tr>
                  <th scope="row">Assuntos:</th>
                  <td style="color: #ff0000">Dado pendente.</td>
                </tr>
                <tr>
                  <th scope="row">Imprenta:</th>
                  <td style="color: #ff0000">Dado pendente.</td>
                </tr>
                <tr>
                  <th scope="row">Classificação:</th>
                  <td style="color: #ff0000">Dado pendente.</td>
                </tr>
                <tr>
                  <th scope="row">Tipo do documento:</th>
                  <td style="color: #ff0000">Dado pendente.</td>
                </tr>
                <tr>
                  <th scope="row">Número de Chamada:</th>
                  <td> {{ itemAtual.NumeroDeChamada }} </td>
                </tr>
                <tr>
                  <th scope="row">Tombo:</th>
                  <td>{{ itemAtual.Tombo }}</td>
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
          href="resultados.prev_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Primeira página"
          class="pointer"
        >«</a>-->
        <!--símbolo 'less than'-->
        <!-- <a
          :href="resultados.prev_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Anterior"
          class="pointer"
        >&lt;</a>-->
        <!-- BOTÃO - PRIMEIRA PÁGINA -->
        <button
          class="btn btn-default"
          @click="buscarObras('/api/acervo')"
          v-if="pagination.prev_page_url"
        >«</button>

        <button
          class="btn btn-default"
          @click="buscarObras(pagination.prev_page_url)"
          v-if="pagination.prev_page_url"
        >&lt;</button>
        <!-- <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>-->
        <!-- <span>Página {{pagination.current_page}} de {{pagination.last_page}}</span> -->
        <button
          v-if="(parseInt(pagination.current_page) - 3) > 0"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) - 3))"          
        >{{ pagination.current_page - 3 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 2) > 0"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) - 2))"
        >{{ pagination.current_page - 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) - 1) > 0"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) - 1))"
        >{{ pagination.current_page - 1 }}</button>
        <button
          class="btn btn-secondary2"          
        >{{ pagination.current_page }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 1) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) + 1))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 1 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 2) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) + 2))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page + 2 }}</button>
        <button
          v-if="(parseInt(pagination.current_page) + 3) <= pagination.last_page"
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) + 3))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page +3 }}</button>
        <!-- <button
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.current_page) + 4))"
          :disabled="!pagination.next_page_url"
        >{{ pagination.current_page +4 }}</button> -->
        
        <button
          class="btn btn-default"
          @click="buscarObras(pagination.next_page_url)"
          v-if="pagination.next_page_url"
        >&gt;</button>
        <!-- BOTÃO - ÚLTIMA PÁGINA -->
        <button
          class="btn btn-default"
          @click="buscarObras('/api/acervo?page=' + (parseInt(pagination.last_page)))"
          v-if="pagination.next_page_url"
        >»</button>
        <!-- <a
          :href="resultados.next_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Próxima"
          class="pointer"
        >&gt;</a>
        <a
          href="resultados.next_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Última página"
          class="pointer"
        >»</a> -->
        <!--símbolo 'greater than'-->
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
  color: #000;
  font-style: italic;
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
.btn-secondary1 {
  color: white;
  background-color:gray;
  border:white;
  font-weight: bold;
}
.btn-secondary1:hover {
  background-color: darkgrey;
  border: white;
}
h3 {
  font-size: 26px;
  font-style: italic;
  color: #090;
  padding-top: 20px;
}
.titulos-pesquisa {
  color: #000;
  font-weight: bold;
  font-size: 18px;
}
.table-body {
  font-size: 16px;
  color: #000;
}
.table-body td {
  table-layout: fixed;
  max-width: 100px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  transition: all ease 0.8s;
}
.table-body td:hover {
  max-width: 100px;
  overflow: auto;
  text-overflow: ellipsis;
  white-space: initial;
}
ul {
  list-style: upper-roman;
}
.modal-title {
  padding: 10px;
  margin-left: 12px;
  font-size: 20px;
  font-weight: bold;
  color: #0a0;
}
.info-obra th {
  color: #0a0;
  font-weight: bold;
  font-size: 16px;
}
.info-obra td {
  color: black;
  display: -webkit-box;
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
      acervo: [],
      itemAtual: {},
      resultados: {},
      pagination: {},
    };
  },
  methods: {
    openModal(itemDoAcervo) {
      this.itemAtual = itemDoAcervo;
      console.log(this.itemAtual)
    },
    checkUserLevel(userLevel) {
      return userLevel === this.$parent.userLevel;
    },
    buscarObras: function(page_url) {
      document.activeElement.blur();
      let app = this;
      page_url = page_url || "/api/acervo";
      this.axios.get(page_url).then(function(response) {
        app.makePagination(response.data);
        app.acervo = response.data.data;        
      });
    },
    makePagination: function(data) {
      let cPagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url
      };
      this.pagination = cPagination;
    },
  },
  created() {
    let uri = "http://localhost:8000/api/acervo";
    this.axios.get(uri).then(response => {
      this.resultados = response.data;
      this.acervo = this.resultados.data;
    });
  },
  mounted() {
    this.buscarObras();
  },
};
</script>