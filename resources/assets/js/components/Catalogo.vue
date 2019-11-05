<template>
  <div class="main">
    <h1>Catálogo de Documentos</h1>
    <h2>Localize em nosso catálogo o documento desejado</h2>

    <!--pesquisa-->
    <div class="box-container">
      <div class="search-container">
        <div class="row header-pesquisa">
          <tr>
            <td>
              <label class="lbPesquisar">Pesquisar por:</label>
            </td>
            <td>
              <select name="pesquisa" class="form-control form-group-sm select-size">
                <option value="1">Autor</option>
                <option value="2">Assunto</option>
                <option value="3">Palavra</option>
                <option value="4">Título</option>
              </select>
            </td>
            <td>
              <input
                type="search"
                placeholder="Digite o termo desejado"
                class="form-control search-size"
              />
            </td>
            <td>
              <button type="submit" class="btn mb-2 btn-color">Pesquisar</button>
            </td>
          </tr>
        </div>
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
          <td @click="openModal"
            data-toggle="modal"
            data-target=".bd-example-modal-lg" class="pointer">{{ item.IDAcervo }}</td>
          <td
            @click="openModal"
            data-toggle="modal"
            data-target=".bd-example-modal-lg"
           class="pointer">{{ item.Titulo }}</td>
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
.pointer {
  cursor: pointer;
}

.main {
  padding: 2em;
}
.box-container {
 padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.search-container {
  padding: 20px;
}
.header-pesquisa {
width: 100%;
}

.lbPesquisar {
  font-size: 18px;
  color: #000;
}
.select-size {
  width: 200px;
}
.search-size {
  width: 500px;
}

.btn-color {
  margin-left: 15px;
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
  color: #0a0
}
.info-obra th {
  color: #0a0;
  font-weight: bold;
  font-size: 16px;
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
