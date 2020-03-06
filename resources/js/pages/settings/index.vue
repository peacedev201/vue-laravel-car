<template>
  <div class="container mobile-settings">
    <div class="col-md-3 mobile-card-header">
      <card :title="$t('settings')" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.route" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <!-- <fa :icon="tab.icon" fixed-width /> -->
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-9 mobile-card-body">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
@media screen and (min-width: 768px) { 
  .mobile-settings {
    display: flex;
    padding-bottom: 300px !important;
  }
}

@media screen and (max-width: 768px) { 
 .mobile-settings {
    display: block;
  } 
  .mobile-card-header {
    margin: 0 !important;
    padding-top: 100px !important;
  }
  .mobile-card-body .card {
    margin-top: 30px !important;
    margin-bottom: 100px !important;
  }
}

</style>
