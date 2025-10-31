<script setup>
import { ref, computed } from 'vue';
let id = 0;
// Var
const msg = ref('Tuto Vue.js');
const fName = ref('Toto');
const lName = ref('Coment');
const price = ref(100);
const discount = ref(30);


//const fullName = computed(() => fName.value + " " + lName.value.toUpperCase())
const finalPrice = computed(() => price.value - discount.value)

const fullName = computed({
  // getter
  get() {
    return fName.value + ' ' + lName.value.toUpperCase();
  },
  // setter
  set(newValue) {
    [fName.value, lName.value] = newValue.split(' ')
  }
})

fullName.value = "Michel Bidule"
</script>

<template>
  <main id="main">
    <h1>{{ msg }}</h1>
    <h2>Bonjour {{ fullName }}</h2>
    <h3>Le prix est de {{ finalPrice }} €</h3>

  </main>
</template>

<style scoped></style>