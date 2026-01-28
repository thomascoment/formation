<template>
    <main id="main">
        <section class="home-container">

            <div class="logo-home">
            <img src="../assets/logo-purple.svg" alt="" width="284px">
        </div>
        <div class="home-button">
            <RouterLink to="/tableau-de-bord" class="button">
                    Renseigner des points d'intérêts
            </RouterLink>
            <RouterLink class="button">
                Ajouter des photos
            </RouterLink>
        </div>
    </section>
</main>
</template>

<script>
import { RouterLink } from 'vue-router';

</script>

<style scoped></style>