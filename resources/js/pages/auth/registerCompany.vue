<template>
  <div class="row mobile-registerCompany-view" style="margin: 0;">
    <div class="col-lg-8 m-auto" style="padding-bottom: 200px;">
      <card v-if="mustVerifyEmail" :title="$t('REGISTER AS A PRIVATE USER')">
        <div class="alert alert-success" role="alert">
          {{ $t('verify_email_address') }}
        </div>
      </card>
      <card v-else :title="$t('REGISTER AS A PRIVATE USER')">
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
            <!-- Organization Number  -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Organization number') }}</label>
            <div class="col-md-7">
              <input v-model="form.organizationNumber" :class="{ 'is-invalid': form.errors.has('organizationNumber') }" class="form-control" type="number" name="organizationNumber">
              <has-error :form="form" field="organizationNumber" />
            </div>
          </div>
          
          <!-- companyName -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Company Name') }}</label>
            <div class="col-md-7">
              <input v-model="form.companyName" :class="{ 'is-invalid': form.errors.has('companyName') }" class="form-control" type="text" name="companyName">
              <has-error :form="form" field="companyName" />
            </div>
          </div>

          <!-- Name -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Contact Person Full Name') }}</label>
            <div class="col-md-7">
              <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
              <has-error :form="form" field="name" />
            </div>
          </div>

          <!-- Email -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
            <div class="col-md-7">
              <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
              <has-error :form="form" field="email" />
            </div>
          </div>

          <!-- Mobile -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Mobile') }}</label>
            <div class="col-md-7">
              <input v-model="form.mobile" :class="{ 'is-invalid': form.errors.has('mobile') }" class="form-control" type="number" name="mobile">
              <has-error :form="form" field="mobile" />
            </div>
          </div>

          <!-- Address -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('Address') }}</label>
            <div class="col-md-7">
              <input v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }" class="form-control" type="text" name="address">
              <has-error :form="form" field="address" />
            </div>
          </div>

          <!-- Password -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
              <has-error :form="form" field="password" />
            </div>
          </div>

          <!-- Password Confirmation -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
              <has-error :form="form" field="password_confirmation" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right"></label>
            <div class="col-md-7">
              <vue-recaptcha 
                ref="recaptcha"
                @verify="onVerify"
                sitekey="6LfTm7UUAAAAALrl-OfUpGIdi1T9nUtI9Tj8AgXP"
                :loadRecaptchaScript="true"
              >
              </vue-recaptcha>
              <div class="alert alert-danger" v-if="form.errors.has('recaptcha')">
                  {{$t('Please tick recaptcha')}}
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex">
              <!-- Submit Button -->
              <v-button :loading="form.busy" style="background: #58ba3a; border: 1px solid #58ba3a;">
                {{ $t('register') }}
              </v-button>

              <!-- GitHub Register Button -->
              <!-- <login-with-github /> -->
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import VueRecaptcha from 'vue-recaptcha';

export default {
  middleware: 'guest',

  components: {
    VueRecaptcha
  },

  // metaInfo () {
  //   return { title: this.$t('register') }
  // },

  data: () => ({
    form: new Form({
      companyName: '',
      email: '',
      mobile: '',
      name: '',
      organizationNumber: '',
      address: '',
      password: '',
      password_confirmation: '',
      recaptcha: '',
    }),
    mustVerifyEmail: false
  }),

  methods: {
    onVerify(response) {
      this.form.recaptcha = response;
    },
    async register () {        
      // Register the user.
      const { data } = await this.form.post('/api/register')

      this.$refs.recaptcha.reset();

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
        this.$router.push({ name: 'welcome' })
      }
    }
  }
}
</script>
<style scoped>
  @media screen and (max-width: 768px) { 
    .mobile-registerCompany-view {
      padding-top: 100px !important;
    }
  }
</style>