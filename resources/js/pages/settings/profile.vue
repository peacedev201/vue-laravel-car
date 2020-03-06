<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')" />
      <template v-if="form.organization_number">
      <!-- Organization Number  -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Organization number') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.organization_number"
            :class="{ 'is-invalid': form.errors.has('organization_number') }"
            class="form-control"
            type="number"
            name="organization_number"
          />
          <has-error :form="form" field="organization_number" />
        </div>
      </div>

      <!-- company_name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Company Name') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.company_name"
            :class="{ 'is-invalid': form.errors.has('company_name') }"
            class="form-control"
            type="text"
            name="company_name"
          />
          <has-error :form="form" field="company_name" />
        </div>
      </div>
      </template>

      <template v-else>
      <!-- ID Number  -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('ID Number') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.id_number"
            :class="{ 'is-invalid': form.errors.has('id_number') }"
            class="form-control"
            type="number"
            name="id_number"
          />
          <has-error :form="form" field="id_number" />
        </div>
      </div>
      <!-- Birth Day -->
      <!-- <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Date of Birth') }}</label>
        <div class="col-md-7">
          <datepicker placeholder="Select Date" v-model="form.birthday" name="birthday"></datepicker>
        </div>
      </div> -->
      </template>
      
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.name"
            :class="{ 'is-invalid': form.errors.has('name') }"
            class="form-control"
            type="text"
            name="name"
          />
          <has-error :form="form" field="name" />
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.email"
            :class="{ 'is-invalid': form.errors.has('email') }"
            class="form-control"
            type="email"
            name="email"
          />
          <has-error :form="form" field="email" />
        </div>
      </div>

      <!-- Mobile Number -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Mobile') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.mobile_number"
            :class="{ 'is-invalid': form.errors.has('mobile_number') }"
            class="form-control"
            type="number"
            name="mobile_number"
          />
          <has-error :form="form" field="mobile_number" />
        </div>
      </div>

      <!-- Address -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Address') }}</label>
        <div class="col-md-7">
          <input
            v-model="form.address"
            :class="{ 'is-invalid': form.errors.has('address') }"
            class="form-control"
            type="text"
            name="address"
          />
          <has-error :form="form" field="address" />
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">{{ $t('update') }}</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";
// import Datepicker from "vuejs-datepicker/dist/vuejs-datepicker.esm.js";
// import * as lang from "vuejs-datepicker/src/locale";

export default {
  scrollToTop: false,

  components: {
    // Datepicker
  },

  metaInfo() {
    return { title: this.$t("settings") };
  },

  data: () => ({
    form: new Form({
      name: "",
      email: "",
      mobile_number: "",
      // birthday: "",
      address: "",
      id_number: "",
      company_name: "",
      organization_number: ""
    })
  }),

  computed: mapGetters({
    user: "auth/user"
  }),

  created() {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key];
    });    
  },

  methods: {
    async update() {

      const { data } = await this.form.patch("/api/settings/profile");

      this.$store.dispatch("auth/updateUser", { user: data });
    }
  }
};
</script>
