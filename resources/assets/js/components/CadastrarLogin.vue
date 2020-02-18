<template>
  <div class="main">
    <h1>Novo Cadastro</h1>
    <h2>Formulário para novo cadastro</h2>

    <form class="formCadastro">
      <!-- Formulário de Cadastro -->
      <div class="row">
        <div class="form-group col-md-12">
          <label for="inputNome">Nome Completo:</label>
          <input
            class="form-control"
            required="required"
            type="name"
            placeholder="ex: João da Silva"
          />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputCPF">CPF:</label>
          <input
            class="form-control"
            required="required"
            type="text"
            maxlength="14"
            placeholder="999.999.999-99"
            v-mask="'###.###.###-##'"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="inputRG">RG:</label>
          <input
            class="form-control"
            required="required"
            type="text"
            maxlength="14"
            placeholder="99.999.999-9"
            v-mask="'##.###.###-#'"
          />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email:</label>
          <input
            class="form-control"
            required="required"
            type="email"
            placeholder="ex: joaodasilva@gmail.com"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Email Secundário:</label>
          <input
            class="form-control"
            required="required"
            type="email"
            placeholder="ex: joaodasilva3@hotmail.com"
          />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputCelular">Celular:</label>
          <input
            class="form-control"
            required="required"
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
        <!-- Formulário de Cadastro -->

        <!-- Botão de Cadastro -->
        <br />
        <div class="form-group col-md-12">
          <button
            type="submit"
            class="btn mb-2 btn-color"
            data-toggle="modal"
            data-target="#mostraModalCadastro"
            @click="cadastrarUsuario"
          >Cadastrar</button>
        </div>
        <!-- Botão de Cadastro -->
        <!-- Modal -->
        <div
          class="modal fade"
          id="mostraModalCadastro"
          v-show="mostraModalCadastro"
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
              <div class="modal-body">{{ msgResposta }}</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-modal" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
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
  color: black;
}
.btn-color {
  width: 120.75px;
  color: #fff;
  background-color: #090;
  font-weight: bold;
  text-align: center;
}
.btn-color:hover {
  background-color: #080;
  color: #fff;
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
.form-group {
  color: black;
  font-size: 16px;
}
</style>

<script>
export default {
  data() {
    return {
      mostraModalCadastro: false,
      msgResposta: "Cadastrado com sucesso!"
    };
  },
  methods: {
    cadastrarUsuario: function(e) {
      e.preventDefault();

      this.msgResposta = "Erro: Usuário já existe";

      this.mostraModalCadastro = true;
    }
  }
};
</script>