<script>
import Sidebar from '../components/Sidebar.vue';
import Card from '../components/Card.vue';
import Tree from '../components/Barre.vue';

export default {
  name: 'App',
  components: {
    Sidebar, Card, Tree
  }
}
</script>

<template>
  <Sidebar />
    <section class="container">
      <h1 class="dashboard-title">Tableau de Bord</h1>
      <Card />
      <Tree />
    </section>
</template>

<style>

</style>