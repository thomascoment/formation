<template>
        <main id="main">
            <section class="home-container">
                
            <div class="logo-home">
                <img src="../assets/logo-purple.svg" alt="" width="284px">
            </div>
            <div class="home-button">
                <RouterLink to="/tableau-de-bord" class="button-link">
                    Renseigner des points d'intérêts
                </RouterLink>
                <RouterLink class="button-link">
                    Ajouter des photos
                </RouterLink>
            </div>
            <PopUpForm />
        </section>
    </main>
</template>

<script setup>
import { RouterLink } from 'vue-router';

</script>

<style scoped>

</style>