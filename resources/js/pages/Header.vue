<template>
  <div class="header-main">
    <div class="container mobile-header-logo" style="top: 0px; display: flex; padding: 0;">
      <div class="col-md-4" style="padding: 0;">
        <img src="/images/logo.svg" class="logo" alt/>
        <!-- <img class="logo" :width="50" v-lazy="src" :data-srcset="src+'?size=50 50w'" alt />                             -->
      </div>

      <div class="col-md-6 pull-right">
        <div class="header-address">
          <i class="stm-icon-pin icon"></i>
          <div class="address">
            <h6 class="title">{{$t('address')}}</h6>
            <h6 class="title_list">Odalsgata 25, 2003 Lillestrom</h6>
          </div>
          <div class="phone_number" style="display: flex; margin-left: 30px;">
            <i class="stm-icon-phone icon"></i>
            <div class="address">
              <h6 class="title">{{$t('sales')}}:</h6>
              <h6 class="title_list">+47 40097041</h6>
            </div>
          </div>
          <div class="email_address" style="display: flex; margin-left: 30px;">
            <i class="stm-icon-mail icon"></i>
            <div class="address">
              <h6 class="title">{{$t('e-mail')}}</h6>
              <h6 class="title_list">post@iauto.no</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-2 pull-right">
        <div class="header-address">
          <div class="address">
            <h6 class="title_list" style="margin: 0">MON - FRI 10:00 - 18:00<br /> SAT 10:00 - 16:00</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row top-right" style="padding: 0;">
      <nav class="navbar navbar-expand-md navbar-light mobile-nav" id="mobile-nav">
        <div class="logo-main">
          <a class="navbar-brand mobile-brand-logo" href="#" style="display: none; height: 50px;">
            <img src="/images/logo.svg" class="logo" alt/>
            <!-- <img class="logo" :width="50" v-lazy="src" :data-srcset="src+'?size=50 50w'" alt />                             -->
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="container mobile-header-menu" style="padding: 0;">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav-pills navbar-nav">
              <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'welcome' }">{{$t('home')}}</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'CarsForSale' }">{{$t('cars_for_sale')}}</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'Auction' }">{{$t('auction')}}</router-link>
              </li>
              <li class="dropdown nav-item">
                <router-link
                  :to="{ name: 'Services' }"
                  data-toggle="dropdown"
                  class="nav-link dropdown-toggle"
                >
                  <b class="caret"></b>{{$t('services')}}
                </router-link>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">{{$t('finance')}}</a>
                  </li>
                  <li>
                    <a href="#">{{$t('guarantee')}}</a>
                  </li>
                  <li>
                    <a href="#">{{$t('insurance')}}</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'AboutUs' }">{{$t('about_us')}}</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'ContactUs' }">{{$t('contact_us')}}</router-link>
              </li>

              <!-- logged -->
              <li v-if="user" class="nav-item dropdown padding-login">
                <a class="nav-link dropdown-toggle text-dark"
                  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                >
                  <img :src="user.photo_url" style="width: 15px;" class="rounded-circle profile-photo mr-1" alt>
                  {{ user.name }}
                </a>
                <div class="dropdown-menu">
                  <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                    <!-- <fa icon="cog" fixed-width /> -->
                    {{ $t('settings') }}
                  </router-link>

                  <div class="dropdown-divider" />
                  <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                    <!-- <fa icon="sign-out-alt" fixed-width /> -->
                    {{ $t('logout') }}
                  </a>
                </div>
              </li>

              <template v-else>
                <li class="nav-item padding-login">
                  <router-link
                    class="nav-link"
                    :to="{ name: 'login' }"
                    style="color: black;"
                  >{{ $t('login') }}</router-link>
                </li>
                <li class="nav-item">
                  <router-link
                    class="nav-link"
                    :to="{ name: 'register' }"
                    style="color: black;"
                  >{{ $t('register') }}</router-link>
                </li>
              </template>
                <li class="nav-item">
                  <!-- <a href class="nav-link search">
                    <i style="padding: 15px;" class="stm-icon-search"></i>
                  </a> -->
                  <locale-dropdown />
                </li>
            </ul>
          </div>
        </div>
        <div class="mobile-call" style="display: none; padding-top:15px;">
            <i class="stm-icon-phone icon"></i>
            <div class="address">
              <h6 class="title">{{$t('sales')}}:</h6>
              <h6 class="title_list">+47 40097041</h6>
            </div>
        </div>
      </nav>
    </div>
  </div>
</template>
<script>

import { mapGetters } from 'vuex'
import LocaleDropdown from '../components/LocaleDropdown'
export default {  
  components: {
    LocaleDropdown
  },
  computed: mapGetters({
    user: 'auth/user'
  }),
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
};

</script>
<style scoped>
@media screen and (min-width: 768px) {
  .header-main {
    background: #232628;
    /* font-family: Montserrat; */
    height: 94px;
    font-weight: 700;
  }
  .dropdown:hover .dropdown-menu,
  .btn-group:hover .dropdown-menu {
    display: block;
  }
  .dropdown-menu {
    margin-top: 0;
  }
  .dropdown-toggle {
    margin-bottom: 2px;
  }
  .navbar .dropdown-toggle,
  .nav-tabs .dropdown-toggle {
    margin-bottom: 0;
  }
  .mobile-nav {
    width: 100%;
    padding: 0;
  }
  .nav-pills {
    align-items: center;
    display: flex;
    justify-content: flex-start;
    width: 100%;
  }
  .navbar-light .navbar-nav .nav-link {
    color: black;
  }
  .nav-pills .nav-link {
    border-radius: 0;
  }
  .top-right {
    position: relative;
    margin: 0;    
    background: rgba(234, 237, 240, 0.8);
    -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
    display: flex;
    z-index: 10;
  }
  .logo {
    width: 180px;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  li {
    color: black;
    font-size: 13px;
  }

  li:hover {
    background: #58ba3a;
  }

  li a.nav-link.router-link-exact-active.router-link-active {
    background: #58ba3a;
    color: white;
  }

  li a {
    color: black;
    text-decoration: none;
    padding: 15px 20px !important;
  }

  .title {
    font-size: 85px;
  }
  .pull-right {
    display: flex;
    align-items: center;
    padding: 0;
  }

  .header-address {
    display: flex;
  }

  .address {
    padding-left: 10px;
  }

  .title {
    font-size: 12px;
    color: #58ba3a;
  }

  .title_list {
    font-size: 12px;
    color: white;
  }

  .icon {
    font-size: 34px;
    color: #58ba3a;
    /* color: rgb(0,132,255); */
  }
  .social_icon {
    width: 40px;
    height: 40px;
    color: white;
    padding: 10px;
  }
  .padding-login {
    margin-left: 10%;
  }
}
/* Mobile Version Responsive */

@media screen and (max-width: 767px) {
  .top-right {
    margin: 0;
    position: absolute;
    z-index: 5;
    background: black;
    width: 100%;
  }
  .nav-pills {
    width: 100%;
    background: #eaedf0;
    padding: 0 15px;
  }
  .mobile-call {
    display: flex !important;
    padding: 5px 10px;
  }
  .address {
    padding-left: 10px;
  }

  .title {
    font-size: 12px;
    color: #58ba3a;
    margin: 0;
  }

  .title_list {
    font-size: 18px;
    color: white;
  }

  .icon {
    font-size: 34px;
    color: #58ba3a;
    /* color: rgb(0,132,255); */
  }
  .logo-main {
    padding: 10px 5px 10px;
    display: flex;
    width: 100%;
    justify-content: inherit;
  }
  .nav-item {
    font-size: 13px !important;
  }
  .mobile-header-logo {
    display: none !important;
  }
  .mobile-brand-logo {
    display: flex !important;    
  }
  .navbar.navbar-expand-lg.navbar-light.mobile-nav {
    padding: 0;
    width: 100%;
  }
  .logo {
    width: 138px;
    padding-left: 10px;
    padding-top: 0 !important;
  }
  .navbar-toggler {
    background: #6c98e1;
    margin-right: 5px;
  }
  .navbar-toggler-icon {
    width: 30px !important;
    height: 30px !important;
  }
  .nav-link {
    color: black !important;
  }
  .search {
    display: none;
  }
  .padding-login {
    margin-left: 0;
  }
  .nav-item .dropdown-menu {
    margin-top: 0 !important;
    box-shadow: unset !important;
    background: transparent !important;
  }
  .nav-item .dropdown-menu li a {
    color: black !important;
    font-size: 13px !important;
  }
  .navbar {
    width: 100%;
  }
  .mobile-nav {
    padding: 0;
  }
  .mobile-header-menu {
    max-width: 100%;
  }
}

/* Desktop Version responsive */
@media (min-width:768px) and (max-width:991px){
  .container {
    max-width: 900px !important;
  }
}
@media (min-width:992px) and (max-width:1199px){
    li a {
      padding: 15px 12px !important;
    }
    .email_address {
      margin-left: 0 !important;
    }
    .phone_number {
      margin-left: 0 !important;
    }
}

@media (min-width:768px) and (max-width:991px){
    li a {
      padding: 15px 2px !important;
    }
    .pull-right {
      display: none;
    }
    .container {
      max-width: 760px;
    }
    .car-listing-title {
      padding-bottom: 2%;
    }
    .mobile-tab {
      margin-top: -49px;
    }
    .nav-pills {
      justify-content: space-between;
    }
    .nav-item {
      font-size: 13px !important;
    }
}
@media screen and (min-width: 1200px){
    .mobile-header-menu {
      max-width: 1180px !important;
    }
    .padding-login {
      margin-left: 200px;
    }
}
</style>