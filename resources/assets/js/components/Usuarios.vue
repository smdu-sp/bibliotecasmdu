<template>
  <div class="main">


    <h1>Usuários</h1>
    <h2>Localizar usuário</h2>

    <br/>
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
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">E-mail</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in usuario" v-bind:key="item.id">
          <td><a href="/emprestimos" class="pointer">{{ item.nomeItem }}</a></td>
          <td><a href="/emprestimos" class="pointer">{{ item.cpfItem }}</a></td>
          <td><a href="/emprestimos" class="pointer">{{ item.emailItem }}</a></td>
        </tr>
      </tbody>
    </table>
    <!--Tabela de itens encontrados-->

    <hr />

    <!--Paginação-->
    <div class="container-pagination">
      <div class="pagination">
        <a
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
        >&lt;</a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a
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
        >»</a>
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
.linha-pesquisa > :first-child {
  padding-left: 1em;
}
</style>


<script>
export default {
  data() {
    return {
      usuario: [
        {
          nomeItem: "Marco William",
          cpfItem: "999.999.999-99",
          emailItem: "marcowilliam1@gmail.com"
        },
        {
          nomeItem: "Marcia Silva",
          cpfItem: "999.999.999-99",
          emailItem: "silvamarcia23@gmail.com"
        },
        {
          nomeItem: "Jessica Boelho",
          cpfItem: "999.999.999-99",
          emailItem: "boelhojessica@gmail.com"
        },
        {
          nomeItem: "Lucia Maria",
          cpfItem: "999.999.999-99",
          emailItem: "lucimaria89@gmail.com"
        },
        {
          nomeItem: "Lucas Silva",
          cpfItem: "999.999.999-99",
          emailItem: "lucasilva2@gmail.com"
        },
        {
          nomeItem: "Bruno Matias",
          cpfItem: "999.999.999-99",
          emailItem: "brunom1972@gmail.com"
        },
      ],
    };
  }
};
</script>