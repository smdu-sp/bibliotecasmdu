<template>
  <div id="main">
    <h1>Catálogo de Documentos</h1>
    <h2>Localize em nosso catálogo o documento desejado</h2>

    <!--pesquisa-->
    <div class=" linha-pesquisa">
      <div class="col-md-2">
        <label class="lbPesquisar">Pesquisar por:</label>
      </div>
      <div class="col-md-2">
        <select name="pesquisa" class="form-control form-group-sm select-size">
          <option value="1">Autor</option>
          <option value="2">Assunto</option>
          <option value="3">Palavra</option>
          <option value="4">Título</option>
        </select>
      </div>
      <div class="col-md-7">
        <input type="search" placeholder="Digite o termo desejado" class="form-control" />
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn mb-2 btn-color">Pesquisar</button>
      </div>
    </div>
    <!--pesquisa-->

    <div class="row">
      <div class="col-md-10">
        <label class="itens-localizados">Foram localizados 10 registros em nossa base de dados</label>
      </div>
      <div class="col-md-2">
        <router-link :to="{ name: 'cadastrar' }" class="btn btn-primary">Cadastrar Item</router-link>
      </div>
    </div>
    <br />

    <!--Tabela de itens encontrados-->
    <table class="table table-hover">
      <thead>
        <tr class>
          <th>ID</th>
          <th>Título</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in acervo" :key="item.id">
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.IDAcervo }}</td>
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
            class="pointer"
          >{{ item.Titulo }}</td>
          <td @click="openModal">{{ item.Notas }}</td>
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
                  <td>Título da obra</td>
                </tr>
                <tr>
                  <th scope="row">Autoria:</th>
                  <td>SOBRENOME, Primeiro Segundo Nome</td>
                </tr>
                <tr>
                  <th scope="row">Descrição:</th>
                  <td>Descrição da obra caso houver.</td>
                </tr>
                <tr>
                  <th scope="row">Assuntos:</th>
                  <td>Assunto da obra. Exemplo: Economia, Administração.</td>
                </tr>
                <tr>
                  <th scope="row">Imprenta:</th>
                  <td>São Paulo: 2013.</td>
                </tr>
                <tr>
                  <th scope="row">Classificação:</th>
                  <td>CD 070</td>
                </tr>
                <tr>
                  <th scope="row">Resumo:</th>
                  <td>
                    Tese apresentada ao Curso de Administração de Empresas na Universidade Braz Cubas para obtanção da
                    certificação de nível superior.
                  </td>
                </tr>
                <tr>
                  <th scope="row">Tipo do documento:</th>
                  <td>CD-ROM</td>
                </tr>
                <tr>
                  <th scope="row">Número de Chamada:</th>
                  <td>CD 070</td>
                </tr>
                <tr>
                  <th scope="row">Tombo:</th>
                  <td>00070</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger">Reservar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Modal-->

    <hr />

    <!--Paginação-->
    <div class="container-pagination">
      <div class="pagination">
        <a
          :href="resultados.prev_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Primeira página"
          class="pointer"
        >&lt&lt</a>
        <!--símbolo 'less than'-->
        <a
          :href="resultados.prev_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Anterior"
          class="pointer"
        >&lt</a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a
          :href="resultados.next_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Próxima"
          class="pointer"
        >&gt</a>
        <a
          :href="resultados.next_page_url"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Última página"
          class="pointer"
        >&gt&gt</a>
        <!--símbolo 'greater than'-->
      </div>
    </div>
    <!--Paginação-->
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
.pointer {
  cursor: pointer;
}

#main {
  padding: 2em;
}

.lbPesquisar {
  font-size: 18px;
  color: #000;
  width: 11.6%;
}
.select-size {
  width: 200px;
}
.btn-color {
  width: 150px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
}
.btn-color:hover {
  background-color: #080;
  color: #fff;
}
.itens-localizados {
  font-size: 26px;
  font-style: italic;
  color: #0c0;
  padding-top: 20px;
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
.container-pagination {
  text-align: center;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4caf50;
  color: white;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
}

.linha-pesquisa > * {
  padding-left: 2em;
}
.linha-pesquisa > :first-child {
  padding-left: 0em;
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
