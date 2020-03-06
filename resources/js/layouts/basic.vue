<template>
  <div class="container-fluid basic-layout" style="padding: 0px;">
    <child />
  </div>
</template>

<script>
export default {
  name: 'BasicLayout'
}
</script>

<style lang="scss">
  @font-face { 
       font-family: "Montserrat";
       src: url("/montserrat/Montserrat-Regular.otf"); 
  }
  * {
    font-family: "Montserrat";
  }
.basic-layout {
  // color: #636b6f;
  // height: 100vh;
  // font-weight: 100;
  // position: relative;

  // .links > a {
  //   color: #636b6f;
  //   padding: 0 25px;
  //   font-size: 12px;
  //   font-weight: 600;
  //   letter-spacing: .1rem;
  //   text-decoration: none;
  //   text-transform: uppercase;
  // }
  // font-weight: 700;
  // font-family: Montserrat;
}
</style>
