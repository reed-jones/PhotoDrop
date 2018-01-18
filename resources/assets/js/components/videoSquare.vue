<template>
  <div class="wedding-video">
    <video :src="'/storage/videos/downloads/' + video" controls class="wedding-video">
      Sorry, your browser doesn't support this type of video :(
    </video>
  </div>
</template>

<script>
export default {
  props: [
    'video'
  ]
}
</script>

<style>
.wedding-video {
  width: 100%;
  height: 100%;
  background: #000;
}

@media screen and (min-width: 400px) {
  .wedding-video {
    width: 400px;
    height: 400px;
  }
}
</style>