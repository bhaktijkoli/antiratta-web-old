<template>
  <section id="intro">
    <div id="intro-video"></div>
    <div id="intro-video-overlay"></div>
  </section>
</template>

<script>
export default {
  mounted() {
    $('#intro-video').YTPlayer({
      fitToBackground: true,
      videoId: 'GEPhLqwKo6g',
      playerVars: {
        modestbranding: 0,
        autoplay: 1,
        autohide: 0,
        controls: 0,
        showinfo: 1,
        branding: 0,
        rel: 0,
      }
    });
  },
  methods: {
  },
}
</script>
