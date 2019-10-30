<template>
  <div>
      <h1>Catálogo</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'cadastrar' }" class="btn btn-primary">Cadastrar Item</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Notas</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="item in acervo" :key="item.id">
                    <td>{{ item.IDAcervo }}</td>
                    <td>{{ item.Titulo }}</td>
                    <td>{{ item.Notas }}</td>
                    <td><router-link :to="{name: 'atualizar', params: { id: item.IDAcervo }}" class="btn btn-primary">Atualizar</router-link></td>
                    <td><button class="btn btn-danger">Deletar</button></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div>
          <a :href="resultados.prev_page_url">Anterior</a>
          <a :href="resultados.next_page_url">Próxima</a>
        </div>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          acervo: [],
          resultados: {}
        }
      },
      created() {
      let uri = 'http://localhost:8000/api/acervo';
      this.axios.get(uri).then(response => {
        this.resultados = response.data;
        this.acervo = this.resultados.data;
      });
    }
  }
</script>