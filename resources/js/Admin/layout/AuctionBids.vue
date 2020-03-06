<template>
  <div>
    <b-table
      :items="items"
      :fields="fields"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      sort-icon-left
      responsive="sm"
    ></b-table>
  </div>
</template>
<script>
import Vue from 'vue'
import VueAxios from "vue-axios";
import axios from "axios";
import { BTable } from 'bootstrap-vue'
Vue.use(VueAxios, axios);
Vue.component('b-table', BTable)
export default {
    data() {
      return {
        sortBy: 'bid_price',
        sortDesc: false,
        fields: [
          { key: 'name', sortable: true },
          { key: 'mobile_number', sortable: true },
          { key: 'bid_price', sortable: true },
          { key: 'ID', sortable: true },
          { key: 'created_at', sortable: true }
        ],
        items: []
      }
    },
    async created() {
        this.axios.get('/api/bids')
            .then(res => {
                this.items = res.data.bidInfo
            })
    }
  }
</script>