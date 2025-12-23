<script>
import Sidebar from '../components/Sidebar.vue';
import Card from '../components/Card.vue';

export default {
  name: 'App',
  components: {
    Sidebar, Card
  }
}
</script>

<template>
  <div id="app">
    <Sidebar />
    <Card />
  </div>
</template>

<style>

</style>