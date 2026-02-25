<script setup>

import Sidebar from '../components/Sidebar.vue';
import PointInteret from '../components/PointInteret.vue';
import { ref, onMounted, onBeforeMount } from 'vue';
import { createPost } from '../services/save';
import Header from '../components/Header.vue';

const postContent = ref('')


async function saveTextToWP() {
  if (!sessionStorage.getItem('jwtToken')) {
    alert('Vous devez être connecté pour enregistrer un texte')
  }
  const token = sessionStorage.getItem('jwtToken');
  const content = tinymce.get('tinymce-editor').getContent();
  const title = tinymce.get('tinymce-editor').getContent();
  try {
    const post = await createPost(token, title, content);
    alert('Article enregistré !');
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
          text: 'Enregistrer le texte',
          icon: 'checkmark',
          onAction: (_) => saveTextToWP(),
        });
      },
    });
  }
});
onBeforeMount(() => {
  if (window.tinymce) {
    window.tinymce.remove('#tinymce-editor');
  }
});

const eventHandler = (data) => {
  tinymce.get('tinymce-editor').setContent(data)
};

</script>

<template>
  <Sidebar />
  <div class="content-container">
    <Header></Header>
    <PointInteret @sendResponse="eventHandler" />
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