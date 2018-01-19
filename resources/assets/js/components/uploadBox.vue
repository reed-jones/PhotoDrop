<template>
  <dropzone id="myVueDropzone" url="/api/media/store" @vdropzone-success="showSuccess" @vdropzone-removed-file="removeFile" :options="dropzoneOptions">
  </dropzone>
</template>

<script>
import Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {
  components: {
    Dropzone
  },
  data() {
    return {
      dropzoneOptions: {
        url: '/api/media/store',
        showRemoveLink: false,
        thumbnailWidth: 150,
        maxFilesize: 15000,
        maxNumberOfFiles: 200,
        acceptedFileTypes:'image/*,video/*'
      }
    }
  },
  methods: {
    'showSuccess': function(file) {
      // console.log(file)
    },
    'removeFile': function(file, error, xhr) {
      console.log('file deleted')
    }
  }
}
</script>