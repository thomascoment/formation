<script setup>
import { ref, onMounted } from 'vue';
import HelloWorld from './component/HelloWorld.vue';
const msg = ref('Yo');
const msg2 = ref('');
const val = ref('');


onMounted(async () => {
  const res = await fetch(

  )
})

</script>

<template>
  <main id="main">
    <h1>{{ msg }}</h1>
    <HelloWorld/>
    <p>{{ msg2 }}</p>
    <p>{{ val }}</p>
  </main>
</template>

<style scoped></style>