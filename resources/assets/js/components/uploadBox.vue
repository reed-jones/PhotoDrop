<template>
  <dropzone id="myVueDropzone" url="/api/media/store" @vdropzone-success="showSuccess" @vdropzone-removed-file="removeFile" :max-file-size-in-m-b='15000' :max-number-of-files='200' :accepted-file-types="'image/*,video/*'" :show-remove-link="false">
  </dropzone>
</template>

<script>
import Dropzone from 'vue2-dropzone'

export default {
  components: {
    Dropzone
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
