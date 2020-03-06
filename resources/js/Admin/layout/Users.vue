<template>
    <div>
       <div class="animated fadeIn">
            <b-row>
                <b-col sm="12">
                    <customersTable :customers="customers"/>
                </b-col>
            </b-row>

            <b-row>
                <b-col sm="12">
                    <companyTable :companies="companies"/>
                </b-col>
            </b-row>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import companyTable from '../views/companyTable'
import customersTable from '../views/customersTable'
Vue.use(VueAxios, axios);
export default {
    data() {
        return {
            customers: [],
            companies: []
        }
    },
    components: {
        companyTable,
        customersTable
    },
    async created() {
      let uri = "/api/customers"
      await this.axios.get(uri)
      .then(res => {
          let items = res.data.customers
          for(let item of items) {
              if(item.company_name === null) {
                this.customers.push({id_number: item.id_number, name: item.name, mobile_number:item.mobile_number, address: item.address})
              } else {
                this.companies.push({
                    organization_number: item.organization_number, 
                    company_name: item.company_name, 
                    name: item.name, 
                    email: item.email, 
                    mobile_number:item.mobile_number, 
                    address: item.address
                })
              }
          }
        }
      )
    }
}
</script>