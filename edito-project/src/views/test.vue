<template>

    <h1>Test</h1>
    <div v-for="tree in state.trees" >
        {{ tree.Destinations }}
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';

onMounted(() => {
    const url = 'https://script.googleusercontent.com/macros/echo?user_content_key=AehSKLgLnzWAHyoAAyaZlPhuAdB4zIV9Tcx_V5lQ_P9giBT1r7Mec0fLpMVYsiv7Iisjhbrk42V0y7VySeNltFmGQZwq2Z0_jbYzm1Z3rKa3o94LF15ZMgDLRm_T9B3qjLXhkbvKS5V_Zo5GeZrGaavXwQSr6_Ygt59Oix5sWUusFeTa7noABM_1bI3Wzm6-JDVAxnM-9pJGUTMQlmKYfmp61waHMTuUPT69Q61Epzc1QA5aG3OLQW1cnhBBnTM6SYovVQrDZDL-SYJISNrX5XfA_Sbo87GigQ&lib=Mczly9QA9PXq-hXhAtNf65QA6AJu5-yHf'
    axios.get(url)
     .then(
        (data) => {
            state.trees = data.data;
            console.log(state.trees)
        }
     )
})

const state = reactive({
    trees: []
})

</script>