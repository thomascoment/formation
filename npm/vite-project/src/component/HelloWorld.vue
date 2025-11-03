<script setup>
    import { ref } from 'vue';
    import SubComp from './SubComp.vue';
    const msg = ref('Hello From Component');

</script>

<template>
    <h1>{{ msg }}</h1>
    <h3>{{ childMsg }}</h3>
    <SubComp>Example : {{ msg }}</SubComp>


</template>

<style scoped>
h1{
    color: red
}
</style>