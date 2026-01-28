<script>
import Sidebar from '../components/Sidebar.vue';
import Barre from '../components/Barre.vue';
import { getPages } from '../services/wordpress';

export default {
  name: 'App',
  components: {
    Sidebar, Barre
  },
  data() {
    return {
      pages: [],
    };
  },
  async created() {
    this.pages = await getPages();
  },
}


</script>

<template>
  <Sidebar />
  <section class="container">
      <Barre />
    </section>
</template>