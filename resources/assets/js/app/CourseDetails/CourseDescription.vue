<template>
  <section id="course-description">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">About this course</h3>
              <p>
                Does your team use Cloud Foundry to deploy applications? Or would you like to use Cloud Foundry, but haven't had time to learn the lingo? Then this course is just what you need! Cloud Foundry makes it simple for developers to deliver business value more quickly, without wasting time getting their app to the cloud -- it's already there.
              </p>
              <p>
                This course is an introduction to Cloud Foundry, including distributions available to end users, an overview of the platform's components, and what it means to be Cloud Foundry certified. The course also includes technical instructions on how to use the command line interface, how applications are deployed, what services are within the context of the system and basic debugging practices.
              </p>
              <p>
                Finally, the workshop will take you on a tour through what it means to build cloud-native applications architecturally and ideologically. In doing so, we'll review the 12-factor method of composing modern distributed web systems.
              </p>
              <h3 class="card-title">What you'll learn</h3>
              <ul>
                <li>Explore the runtime, security and network of Cloud Foundry.</li>
                <li>How to build runtime and framework support with buildpacks.</li>
                <li>Learn "The Twelve Factor app" design patterns for resiliency and scalability.</li>
                <li>Get the steps needed to make your app "cloud-native".</li>
                <li>Understand how each component of Cloud Foundry combine to provide a cloud-native platform.</li>
                <li>Study techniques and examples for locating problems in distributed systems.</li>
              </ul>
              <h3 class="card-title">Prerequisites</h3>
              <ul>
                <li>Explore the runtime, security and network of Cloud Foundry.</li>
                <li>How to build runtime and framework support with buildpacks.</li>
                <li>Learn "The Twelve Factor app" design patterns for resiliency and scalability.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('course-loaded', ()=>{
    });
  },
  props: ['course'],
  computed: {
    description() {
      if(this.course == null) return "";
      return this.course.description
    },
  }
}
</script>
