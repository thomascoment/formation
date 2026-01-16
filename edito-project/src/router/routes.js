import { createRouter, createWebHistory } from "vue-router";
import content from '../views/content.vue'
import dashboard from '../views/dashboard.vue'
import home from '../views/home.vue'
import tree from '../views/tree.vue'
import generate from '../views/generate.vue'
import test from "../views/test.vue";


const routes = [
    { path: '/', name: 'accueil', component: home },
    { path: '/tableau-de-bord', name: 'tableau de bord', component: dashboard },
    { path: '/arborescence', name: 'arborescence', component: tree },
    { path: '/contenu', name: 'contenu', component: content },
    { path: '/generer', name: 'generer', component: generate },
    { path: '/test', name: 'test', component: test }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router