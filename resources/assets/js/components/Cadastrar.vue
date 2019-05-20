<template>
  <div>
    <h1>Cadastrar item</h1>
    <form @submit.prevent="adicionarItem">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Título da obra:</label>
            <input type="text" class="form-control" v-model="item.Titulo">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Notas:</label>
              <textarea class="form-control" v-model="item.Notas" rows="3"></textarea>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Componente Cadastrar montado.')
    },
    data(){
      return {
        item:{}
      }
    },
    methods: {
      adicionarItem(){
        let uri = 'http://bibliotecasmdu/api/acervo/cadastrar';
        this.axios.post(uri, this.item).then((response) => {
          this.$router.push({name: 'acervo'});
        });
      }
    }
  }
</script>