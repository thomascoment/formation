<template>
    <h2 class="barre-title">
        Taux par catégorie
    </h2>
    <div v-for="(page) in pages" :key="page.id" class="barre">
        <div class="menu">
            <p class="cat" v-html="page.title"></p>
            <div v-for="ville in page.children" :key="ville.id">
                <p class="sous-cat">{{ ville.title }}</p>
            </div>
            <div class="progression">
                <p class="prog"></p>
            </div>
            
            <div class="chevron">
                <svg @click="show" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
        </div>
    </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { getPages } from '../services/wordpress';

//onMounted(() => {
    //    const url = 'https://script.googleusercontent.com/macros/echo?user_content_key=AehSKLgLnzWAHyoAAyaZlPhuAdB4zIV9Tcx_V5lQ_P9giBT1r7Mec0fLpMVYsiv7Iisjhbrk42V0y7VySeNltFmGQZwq2Z0_jbYzm1Z3rKa3o94LF15ZMgDLRm_T9B3qjLXhkbvKS5V_Zo5GeZrGaavXwQSr6_Ygt59Oix5sWUusFeTa7noABM_1bI3Wzm6-JDVAxnM-9pJGUTMQlmKYfmp61waHMTuUPT69Q61Epzc1QA5aG3OLQW1cnhBBnTM6SYovVQrDZDL-SYJISNrX5XfA_Sbo87GigQ&lib=Mczly9QA9PXq-hXhAtNf65QA6AJu5-yHf'
    //    axios.get(url)
    //        .then(
        //            (data) => {
//                state.trees = data.data;
//            }
//        )
//})
//
//const state = reactive({
    //    trees: []
    //})
</script>

<script>

    export default {
        name: 'Tree',
        data() {
        return {
          pages: [],
        };
      },
      async created() {
        this.pages = await getPages();
      },
    }
    
    let className = ref("hidden")
    
    function show() {
    if (className.value === "hidden") {
        className.value = 'tree'
    } else {
        className.value = "hidden"
    }
}


</script>