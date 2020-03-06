<template>
  <div class="animated fadeIn">
    <b-row>
      <b-col sm="12">
        <c-table
          :table-data="itemsArray"
          :per-page="10"
          hover
          striped
          bordered
          small
          fixed
          caption="<i class='fa fa-align-justify'></i> Company"
        ></c-table>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { shuffleArray } from '../shared/utils'
import cTable from './Table.vue'

export default {
  props: ['companies'],
  name: 'tables',
  components: {cTable},
  data: () => {
    return {
      itemsArray: [],
      fields: [
        {key: 'organization_number'},
        {key: 'company_name'},
        {key: 'name'},
        {key: 'email'},
        {key: 'mobile'},
        {key: 'address'}
      ],
    }
  },
  async created() {
    this.itemsArray = shuffleArray(this.companies)
  }
}
</script>