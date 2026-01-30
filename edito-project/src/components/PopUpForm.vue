<template>
    <div class="popup">
        <div class="popup-inner">
            <h2>Connectez vous !</h2>
            <form action="">
                <label for="username" >Nom d'utilisateur
                    <input type="text" v-model="username" />
                </label>
                <label for="password">Mot de passe
                    <input v-model="password" type="text" />
                </label>
            </form>
            <button class="connect" @click="login">Se connecter</button>
        </div>
    </div>
</template>

<script setup>
import { login } from '../services/save';
import { ref } from 'vue';

const username = ref('');
const password = ref('');

</script>