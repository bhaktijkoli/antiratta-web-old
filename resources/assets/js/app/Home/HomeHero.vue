<template>
  <section id="hero">
    <div class="container">
      <div class="col-sm-6">
        <h1>Online Education</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <div class="icons">
          <div class="icon">
            <img src="/images/google_play.png"/>
          </div>
          <div class="icon">
            <img src="/images/app_store.png"/>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
}
</script>

<style media="screen">
  #hero {
    width: 100%;
    height: 100vh;
    color: #FFFFFF;
    background-image: linear-gradient(120deg, #E94150 0%, #7E50FC 100%);
  }
  #hero .container {
    padding-top: 200px;
  }
  #hero p {
    font-weight: 500;
    font-size: 16px;
    text-align: justify;
  }
  #hero .icons .icon {
    display: inline-block;
  }
  #hero .icons .icon img {
    width: 170px;
  }


</style>
