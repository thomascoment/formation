<template>
    <h2 class="barre-title">
        Taux par catégorie
    </h2>
        <div class="tree">

            <div class="render" v-if="pages.length > 0" :class="{ translate: displayTree }" style="width: 992px; height: 48px;">
                
                <div class="menu-content">
                    
                    <p class="cat">{{ pages[0].title }}</p>
                    
                    <div class="progression">
                        <span class="prog"></span>
                    </div>
                    
                    <svg @click="toggleDisplay" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="chevron"
                    :class="{ rotated: displayTree }" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
            <div class="slide" :class="{ display: displayTree }"></div>
            
        </div>
    </div>
</div>

    

</template>

<script setup>
import { ref } from 'vue';
import { getPages } from '../services/wordpress';
import { onMounted } from 'vue';


const pages = ref([]);

onMounted(async () => {
    pages.value = await getPages();
});

const displayTree = ref(false);

const toggleDisplay = () => {
    displayTree.value = !displayTree.value;
}
</script>