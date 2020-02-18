<template>
  <div class="main">
    <h1>Painel do Usuário</h1>
    <h2>Atualize e visualize os dados referentes a sua conta</h2>

    <form id="formTab">
      <!-- Tabela de dados !-->
      <div class="form-row">
        <div class="form-group col-md-4">
          <ul class="list-group" id="minhaLista" role="tablist">
            <li
              class="list-group-item list-group-item active"
              id="lista-dados-lista"
              data-toggle="tab"
              href="#dados"
              role="tab"
              aria-controls="dados"
            >Dados Cadastrais</li>
            <li
              class="list-group-item list-group-item"
              id="lista-historico-lista"
              data-toggle="tab"
              href="#historico"
              role="tab"
              aria-controls="historico"
            >Histórico de Empréstimos</li>
            <li
              class="list-group-item list-group-item"
              id="lista-renovacao-lista"
              data-toggle="tab"
              href="#renovacao"
              role="tab"
              aria-controls="renovacao"
            >Renovação de Empréstimos</li>
          </ul>
        </div>
      </div>
      <!-- Tabela de dados !-->

      <!-- Dados Cadastrais !-->
      <div class="form-group col-md-8">
        <div class="tab-content">
          <div
            class="tab-pane active"
            id="dados"
            role="tabpanel"
            aria-labelledby="lista-dados-lista"
          >
            <div class="form-group col-md-12">
              <h4>Dados Cadastrais</h4>
              <hr />
              <label for="inputNome">Nome Completo:</label>
              <input class="form-control" type="text" placeholder="ex: João da Silva" />
            </div>
            <div class="form-group col-md-6">
              <label for="inputCPF">CPF:</label>
              <input
                class="form-control"
                type="text"
                maxlength="14"
                placeholder="999.999.999-99"
                v-mask="'###.###.###-##'"
              />
            </div>
            <div class="form-group col-md-6">
              <label for="inputRG">RG:</label>
              <input
                type="text"
                class="form-control"
                maxlength="14"
                placeholder="99.999.999-9"
                v-mask="'##.###.###-#'"
              />
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail">Email:</label>
              <input class="form-control" type="email" placeholder="ex: joaodasilva@gmail.com" />
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail">Email Secundário:</label>
              <input class="form-control" type="email" placeholder="ex: joaodasilva3@hotmail.com" />
            </div>
            <div class="form-group col-md-6">
              <label for="inputCelular">Celular:</label>
              <input
                class="form-control"
                type="tel"
                maxlength="16"
                placeholder="ex: (11) 9 9999-9999"
                v-mask="'(##) # ####-####'"
              />
            </div>
            <div class="form-group col-md-6">
              <label for="inputTelefone">Residencial (Opcional):</label>
              <input
                class="form-control"
                type="tel"
                maxlength="14"
                placeholder="ex: (11) 9999-9999"
                v-mask="'(##) ####-####'"
              />
            </div>
            <!-- Dados Cadastrais !-->

            <br />
            <!-- Botão Atualizar Cadastro !-->
            <div class="form-group col-md-12">
              <button
                type="button"
                class="btn mb-2 btn-color"
                data-toggle="modal"
                data-target="#atualizarModal"
              >Atualizar Dados</button>
            </div>
            <!-- Botão Atualizar Cadastro !-->

            <!-- Modal -->
            <div
              class="modal fade"
              id="atualizarModal"
              data-backdrop="static"
              tabindex="-1"
              role="dialog"
              aria-labelledby="staticBackdropLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Atualizar Dados</h5>
                  </div>
                  <div class="modal-body">Dados atualizados com sucesso.</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-modal" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->

            <!-- Histórico de Empréstimos !-->
          </div>
          <div
            class="tab-pane"
            id="historico"
            role="tabpanel"
            aria-labelledby="lista-historico-lista"
          >
            <h4>Histórico de Empréstimos</h4>
            <hr />
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Título</th>
                  <th scope="col">Emprestado em</th>
                  <th scope="col">Devolvido em</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="ex in historico" v-bind:key="ex.id">
                  <th scope="row">{{ ex.ID }}</th>
                  <td>{{ ex.tituloitem }}</td>
                  <td>{{ ex.emprestimoData }}</td>
                  <td>{{ ex.devolucaoData }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Histórico de Empréstimos !-->

          <!-- Renovação de Empréstimos !-->
          <div
            class="tab-pane"
            id="renovacao"
            role="tabpanel"
            aria-labelledby="lista-renovacao-lista"
          >
            <h4>Renovação de Empréstimos</h4>
            <hr />
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Título</th>
                  <th scope="col">Emprestado em</th>
                  <th scope="col">Devolvido em</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in emprestimos" v-bind:key="item.id">
                  <th scope="row">{{ item.titulo }}</th>
                  <td>{{ item.dataEmprestimo }}</td>
                  <td>{{ item.dataDevolucao }}</td>
                  <td>
                    <button
                      v-if="item.dataEmprestimo  == '20/12/2019'"
                      type="button"
                      class="btn btn-secondary1"
                    >Em dia</button>
                    <button
                      v-if="item.dataEmprestimo  != '20/12/2019'"
                      type="button"
                      class="btn btn-danger"
                    >Renovar</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Renovação de Empréstimos !-->
        </div>
      </div>
    </form>
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
  color:black;
}
.container {
  padding-left: 0;
  padding-top: 0;
  color: #000;
}
.btn-color {
  width: 135.2px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
  text-align: center;
  float: right;
}
.btn-color:hover {
  background-color: #080;
  color: #fff;
}
h4 {
  font-size: 20px;
  color: #090;
  font-weight: bolder;
}
hr {
  margin-top: 1px;
}
.modal-content {
  padding: 15px;
}
.modal-style {
  width: 400px;
}
.modal-body {
  font-style: italic;
}
.btn-modal {
  width: 70.39px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
  padding-left: 10px;
  text-align: center;
}
.list-group-item, .list-group-item:first-child, .list-group-item:last-child {
  font-weight: bold;
  text-align: center;
  color: #000;
  margin: 3px;
  background-color:#f2f2f2;
  border-color: white;
  border-radius: 10px;
}
.list-group-item.active, .list-group-item.active:hover  {
  color: white;
  background-color: #080;
  border-color: white;
  border-radius: 10px;
}
.table {
  color: black;
}
.btn-secondary1 {
  width: 125.2px;
  background-color: #cfcfcf;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bold;
  border-radius: 4px;
}
.btn-danger {
  width: 125.2px;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bold;
  border-radius: 4px;
}
.form-group {
  color: black;
  font-size: 16px;
}
</style>

<script>
export default {
  data() {
    return {
      historico: [
        {
          ID: "2",
          tituloitem: "Avenida Paulista",
          emprestimoData: "10/05/2019",
          devolucaoData: "25/05/2019"
        },
        {
          ID: "11",
          tituloitem: "Operação Urbana Faria Lima",
          emprestimoData: "10/11/2019",
          devolucaoData: "23/11/2019"
        },
        {
          ID: "7",
          tituloitem: "Polis",
          emprestimoData: "20/11/2019",
          devolucaoData: "29/11/2019"
        },
        {
          ID: "15",
          tituloitem: "Cadastro de referencias urbanas: zona leste",
          emprestimoData: "01/12/2019",
          devolucaoData: "15/12/2019"
        }
      ],
      emprestimos: [
        {
          titulo: "Avenida Paulista",
          dataEmprestimo: "10/05/2019",
          dataDevolucao: "25/05/2019"
        },
        {
          titulo: "Operação Urbana Faria Lima",
          dataEmprestimo: "10/09/2019",
          dataDevolucao: null
        },
        {
          titulo: "Polis",
          dataEmprestimo: "20/12/2019",
          dataDevolucao: null
        }
      ]
    };
  }
};
</script>