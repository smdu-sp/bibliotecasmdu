<template>  
  <div id="top-breadcrumb">
    <br/>
    <hr/>
    <div class="text-uppercase">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Sobre</li>
        </ol>
      </nav>
    </div>
    <hr/>
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
.conteudo {
  font-size: 24px;
  color: #000;
}
.breadcrumb {
  background-color: white;
  color: gray;
  margin-bottom: 0px;
}
.breadcrumb-item + .breadcrumb-item::before {
  content: "»";
  color: gray;
}
#top-breadcrumb hr {
  margin: 2px 0;
}
a {
  color: inherit;
}
</style>

<script>
export default {
  name: 'Header',
  computed: {
    isOk() { console.log("Header") }
  }
};
</script>