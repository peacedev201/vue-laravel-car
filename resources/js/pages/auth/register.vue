<template>
  <div class="container">
    <div class="row register-view">
      <div class="col-md-6 register-view-private">
        <h3>{{$t('Private')}}</h3>
        <h6>{{$t('txt_private')}}</h6>
        <div class="row private-div">
          <ul>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('Exciting')}}</li>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('Fun')}}</li>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('We handle the sales crowd')}}</li>
          </ul>
        </div>
        <button v-on:click="goPrivate()" class="btn btn-success" style="background: #58ba3a;">{{$t('Next')}}&nbsp;<i class="fas fa-chevron-right"></i></button>
      </div>
      <div class="col-md-6 register-view-company">
        <h3>{{$t('Company')}}</h3>
        <h6>{{$t('txt_company')}}</h6>
        <div class="row company-div">
          <ul>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('We sell fast')}}</li>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('Documentation at all auctions')}}</li>
            <li><i class="fas fa-check" style="color: #58ba3a;"></i>&nbsp;&nbsp;{{$t('Visibility of multi-channel ads')}}</li>
          </ul>
        </div>
        <button v-on:click="goCompany()" class="btn btn-success" style="background: #58ba3a;">{{$t('Next')}}&nbsp;<i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  middleware: 'guest',

  components: {
  },

  // metaInfo () {
  //   return { title: this.$t('register') }
  // },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    },
    goPrivate() {
      return this.$router.push('/register/private')
    },
    goCompany() {
      return this.$router.push('/register/company')
    }
  }
}
</script>

<style scoped>
  .register-view {
    padding-top: 200px;
    padding-bottom: 200px;
  }
  .register-view-private {
    text-align: center;
    border-right: 1px solid #ddd;
  }
  .register-view-company {
    text-align: center;
  }
  .private-div {
    padding-top: 30px;
    padding-bottom: 20px;
  }
  .private-div ul {
    list-style-type: none;
    text-align: left;
    margin-left: 55px;
  }
  .company-div {
    padding-top: 30px;
    padding-bottom: 20px;
  }
  .company-div ul {
    list-style-type: none;
    text-align: left;
    margin-left: 10px;
  }
  @media screen and (max-width: 768px) { 
    .private-div ul {
      margin-left: 0;
    }
    .company-div ul {
      margin-left: 0;
    }
    .register-view-company {
      padding-top: 30px;
    }
  }
</style>