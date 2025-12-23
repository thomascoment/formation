<template>

    <div class="logo-home">
        <img src="../assets/logo-purple.svg" alt="" width="284px">
    </div>
    <section class="container">
        <div class="point-interet">
            <RouterLink to="/tableau-de-bord">
                <p>Renseigner des points d'intérêts</p>
            </RouterLink>
        </div>
        <div class="photos">
            <p>Ajouter des photos</p>
        </div>
    </section>
</template>

<script>
    import { RouterLink } from 'vue-router';
</script>

<style scoped>

</style>