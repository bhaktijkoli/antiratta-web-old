<template>
  <section id="splitview" style="margin-top:70px">
    <div class="splitview skewed">
      <div class="panel bottom">
        <div class="content">
          <div class="description">
            <h1>Dose</h1>
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          </div>
          <img src="images/john_f_kennedy_original.png" alt="Original">
        </div>
      </div>
      <div class="panel top">
        <div class="content">
          <div class="description">
            <h1>Overdose</h1>
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          </div>
          <img src="images/john_f_kennedy_alternate.png" alt="Duotone">
        </div>
      </div>
      <div class="handle"></div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      image: window.route.site('/images/banner.png'),
    }
  }
}
</script>
