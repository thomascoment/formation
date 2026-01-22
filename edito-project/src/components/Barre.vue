<template>
    <div class="arbo">

        <ul class="parents" v-for="page in pages">
            <li class="categorie">
                <div class="cat-title">
                <p>
                    {{ page.title }}
                </p>
                <svg @click="toggleDisplay(page)" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="chevron" :class="{ rotated: page.isExpanded }" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
        </div>

                <ul class="sous-cat" :style="{ display: page.isExpanded ? 'block' : 'none' }" v-if="page.children">
                    <li v-for="children in page.children">
                        <div class="sous-cat-title">
                        <p>
                            {{ children.title }}
                        </p>
                        <svg @click="toggleDisplay(children)" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="chevron" :class="{ rotated: children.isExpanded }"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>

                        <ul class="sous-sous-cat" :style="{ display: children.isExpanded ? 'block' : 'none' }"
                            v-if="children.children">
                            <li v-for="children in children.children">
                                <div class="sous-sous-cat-title">
                                    <p>
                                        {{ children.title }}
                                    </p>
                                    <svg @click="toggleDisplay(children)"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="chevron" :class="{ rotated: children.isExpanded }" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </div>

                                <ul class="sous-sous-sous-cat"
                                    :style="{ display: children.isExpanded ? 'block' : 'none' }" v-if="children.children">
                                    <li v-for="children in children.children">{{ children.title }}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import { getPages } from '../services/wordpress';
import { onMounted } from 'vue';


const pages = ref([]);

onMounted(async () => {
    pages.value = await getPages();
    const addIsExpanded = (items) => {
        if (!items || !Array.isArray(items)) return;

        items.forEach(item => {
            item.isExpanded = false;

            if (item.children && Array.isArray(item.children)) {
                addIsExpanded(item.children);
            }
        });
    };
    addIsExpanded(pages.value);

    console.log(pages.value);
});


const toggleDisplay = (page) => {
        page.isExpanded = !page.isExpanded
}

</script>