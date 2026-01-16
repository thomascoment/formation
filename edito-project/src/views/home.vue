<template>
    <main id="main">
        <section class="home-container">

            <div class="logo-home">
            <img src="../assets/logo-purple.svg" alt="" width="284px">
        </div>
        <div class="button">
            <RouterLink to="/tableau-de-bord" class="point-interet">
                    Renseigner des points d'intérêts
            </RouterLink>
            <div class="photos">
                <p>Ajouter des photos</p>
            </div>
        </div>
    </section>
</main>
</template>

<script>
import { RouterLink } from 'vue-router';

</script>

<style scoped></style>