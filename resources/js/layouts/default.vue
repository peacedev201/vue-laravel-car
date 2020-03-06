<template>
  <div class="main-layout">
    <!-- <navbar /> -->

    <div class="container-fluid" style="padding: 0;">
      <child />
    </div>
  </div>
</template>

<script>
// import Navbar from '~/components/Navbar'

export default {
  name: "MainLayout",

  components: {
    // Navbar
  }
};
</script>
<style>
@font-face {
  font-family: "Montserrat";
  src: url("/montserrat/Montserrat-Regular.otf");
}
* {
  font-family: "Montserrat";
}
</style>
