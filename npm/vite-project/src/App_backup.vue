<script setup>
import { ref } from 'vue';

// Var
const msg = ref('Modifier le nombre');
const count = ref(0);

//Func
const plus = function(){
  count.value++;
}
const moins = function(){
  if(count.value <= 0){
    alert('On ne descend pas en dessous de 0 !')
  }else{
    count.value--;
  }
}
const reset = function(){
  count.value = 0;
}

</script>

<template>
  <main>
    <h1>{{ msg }}</h1>
    <h2 :class="count < 10 ? 'green' : 'red'">Nombre = {{ count }}</h2>
    <button @click="plus">Incrémenter</button>
    <button @click="moins">Décrémenter</button>
    <button :style="count <= 0 ? 'display:none;' : 'display:block'" @click="reset">Réinitialiser</button>
    
  </main>
</template>

<style scoped>
.green{
  color: green;
}
.red{
  color: red;
}
</style>

Associer input et variable grâce à v-model

<script setup>
import { ref } from 'vue';

// Var
const msg = ref('Tuto Vue.js');
const inputMsg = ref('Saisir un texte')

//Func

const submitForm = () => {
  console.log(inputMsg.value)
}

</script>

<template>
  <main>
    <h1>{{ msg }}</h1>
    <p>{{ inputMsg }}</p>
    <input v-model="inputMsg" type="text" name="tuto">
    <button @click="submitForm">Valider</button>

  </main>
</template>

<style scoped>
p{
  font-size: 20px;
  font-weight: bold;
}

 input{
  width: 100%;
  height: 42px;
 }
</style>


Conditions v-if et v-else 



<script setup>
import { ref } from 'vue';

// Var
const msg = ref('Tuto Vue.js');
const jour = ref(true);


//Func
const change = () => {
  jour.value = !jour.value
}
</script>

<template>
  <main id="main" :class="!jour ? 'nuit' : ''">
    <h1>{{ msg }}</h1>
    <h2 v-if="jour">Jour 🌞</h2>
    <h2 v-else>Nuit 🌙</h2>
    <button @click="change">Toggle</button>

  </main>
</template>

<style scoped>
#main {
  background-color: lightblue;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 20px
}

#main.nuit {
  background-color: darkslategray;
}
</style>


Boucle For


<script setup>
import { ref } from 'vue';
let id = 0;
// Var
const msg = ref('Tuto Vue.js');
const items = ref([
  { id: id++, text: 'Item 1' },
  { id: id++, text: 'Item 2' },
  { id: id++, text: 'Item 3' },
  { id: id++, text: 'Item 4' },
  { id: id++, text: 'Item 5' }
]);
const newItem = ref();
const addItem = () => {
    items.value.push({ id: id++, text: newItem.value })
    newItem.value = ''
}
const removeItem = (i) => {
  items.value = items.value.filter((item) => item !== i)
}


</script>

<template>
  <main id="main">
    <h1>{{ msg }}</h1>
    <ul>
      <li v-for="item in items" :key="item.id">
        {{ item.text }}
        <button @click="removeItem(item)">Remove Item</button>

      </li>
    </ul>
    <input type="text" v-model="newItem">
    <button @click="addItem">Add Item</button>


  </main>
</template>

<style scoped></style>