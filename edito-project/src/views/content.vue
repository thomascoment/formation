<script>

import Sidebar from '../components/Sidebar.vue';
import PointInteret from '../components/PointInteret.vue';
import { onMounted, onBeforeMount } from 'vue';

export default {
  name: 'App',
  components: {
    Sidebar, PointInteret
  },
  methods: {
    eventHandler(data) {
      tinymce.get('tinymce-editor').setContent(data)
    }
  },
  data() {
    return {
      printResponse: ""
    };
  },
  setup() {
    onMounted(() => {
      if (window.tinymce) {
        window.tinymce.init({
          selector: '#tinymce-editor',
          id: "uuid",
          license_key: "gpl",
          base_url: '/tinymce',
          suffix: '.min',
          plugins: 'advlist anchor autolink charmap code fullscreen help image insertdatetime link lists media preview searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | styles | bold italic underline strikethrough | generateButton | selectPromptButton',
          height: 500,
          
          setup: (editor) => {
            editor.ui.registry.addButton('generateButton', {
              tooltip: 'Générer le texte',
              icon: 'auto-image-enhancement',
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
  }
}




</script>

<template>
  <Sidebar />
  <div class="content-container">
    <PointInteret @sendResponse="eventHandler" />
    <div class="editor-container">
      <textarea id="tinymce-editor"></textarea>
    </div>
  </div>
</template>

<style scoped>
.content-container {
  margin-left: -4%;
}

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