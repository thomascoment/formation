<script setup>

import Sidebar from '../components/Sidebar.vue';
import PointInteret from '../components/PointInteret.vue';
import { ref, onMounted, onBeforeMount } from 'vue';
import { createPost, getJWToken } from '../services/save';

const postContent = ref('')

const eventHandler = (data) => {
  tinymce.get('tinymce-editor').setContent(data)
};

async function saveTextToWP() {
  const username = 'testuser';
  const password = 'testuser'
  const content = tinymce.get('tinymce-editor').getContent();
  const title = 'Titre par défaut'
    try {
        const token = await getJWToken(username, password);
        const post = await createPost(token, title, content);
        console.log('Article crée avec succès :', post);
    } catch (error) {
        console.error('Erreur lors de la création de l\'article :', error);
    }
}

const printResponse = ref("");

onMounted(() => {
  if (window.tinymce) {
    window.tinymce.init({
      selector: '#tinymce-editor',
      id: "uuid",
      license_key: "gpl",
      base_url: '/tinymce',
      suffix: '.min',
      plugins: 'advlist anchor autolink charmap code fullscreen help image insertdatetime link lists media preview searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | styles | bold italic underline strikethrough | generateButton',
      height: 500,

      setup: (editor) => {
        editor.ui.registry.addButton('generateButton', {
          tooltip: 'Enregistrer le texte',
          icon: 'checkmark',
          onAction: (_) => editor.insertContent('Bouton'),
        });
      },
    });
  }
});
onBeforeMount(() => {
  if (window.tinymce) {
    window.tinymce.remove('#my-editor');
  }
});
</script>

<template>
  <Sidebar />
  <div class="content-container">
    <PointInteret @sendResponse="eventHandler" />

            <button @click="saveTextToWP()" class="button">Enregistrer le texte</button>
    <div class="editor-container">
      <textarea id="tinymce-editor"></textarea>
    </div>
  </div>
</template>

<style scoped>

.content {
  position: relative;
}

@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 980px;
  }
}
</style>