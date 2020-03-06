<template>
  <div>
    
      <div class="row sort-header">
        <div class="sort">
          <div class="sort-header-title">
            <span>{{$t('SORT BY')}}:</span>&nbsp;
          </div>
          <div>
            <v-select
              :options="[
                {value: 1, text: $t('Date: Newest first')}, 
                {value: 2, text: $t('Date: Oldest first')}, 
              ]"
              v-model="selectedValueTransmission"
              @input="changedLabel"
            />
          </div>
        </div>
        <div class="sort-view">
          <div class="sort-view-icon">
            <a
              href="#"
              class="view-grid view-type"
              data-view="grid"
              v-on:click="handleChangeGridState"
            >
              <i class="stm-icon-grid"></i>
            </a>
            <a
              href="#"
              class="view-list view-type"
              data-view="list"
              v-on:click="handleChangeListState"
            >
              <i class="stm-icon-list"></i>
            </a>
          </div>
        </div>
      </div>

      <div v-if="listShow" class="row listShow">
        <CarListItems v-if="loading" :cars="cars" />        
        <LoadingBar v-else/>
      </div>

      <div v-if="gridShow" class="container" style="padding: 0px;">
        <CarListItemsView v-if="loading" :cars="cars" />
        <LoadingBar v-else/>
      </div>
    </div>
</template>

<script>
import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import VSelect from "@alfsnd/vue-bootstrap-select";
import CarListItems from "./CarListItems";
import CarListItemsView from "./CarListItemsView";
import LoadingBar from '../../components/LoadingBar'
Vue.use(VueAxios, axios);
export default {
  props: ['filterOption', 'transmissionOption', 'kilometerOption', 'yearOption', 'priceOption'],
  components: {
    VSelect,
    CarListItems,
    CarListItemsView,
    LoadingBar
  },
  data() {
    return {
      gridShow: true,
      listShow: false,
      selectedValueTransmission: "",
      cars: [],
      loading: false
    };
  },
  methods: {
    handleChangeGridState() {
      this.gridShow = false;
      this.listShow = true;
      //   console.log(this.gridShow)
    },

    handleChangeListState() {
      this.listShow = false;
      this.gridShow = true;
      //   console.log(this.listShow)
    },
    async changedLabel(event) {
      await this.axios.post('/api/date_filter', {data: event.text})
        .then( res => {
            this.cars = res.data.car_ads
            for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
            }
        })        
    }
  },
  mounted() {
    this.gridShow = true;
    this.listShow = false;
  },
  async created() {
    await this.axios
      .get("/api/ads")
      .then(res => {
        this.cars = res.data.car_ads.reverse();

        for (var car of this.cars) {
          car.BILDE = JSON.parse(car.BILDE);
          car.INFO = JSON.parse(car.INFO);
          car.KONTAKT = JSON.parse(car.KONTAKT);
          car.SALG = JSON.parse(car.SALG);
          car.UTSTYR = JSON.parse(car.UTSTYR);
        }

        this.loading = true
      })
      .catch(error => console.log("Error: " + error));
  },
  watch: {
      filterOption: function(newVal, oldVal) { 
        if(oldVal !== '') {  
        this.axios.post('/api/brand_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.car_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
          })
        }
      },
      transmissionOption: function(newVal, oldVal) {
        if(oldVal !== '') {  
        this.axios.post('/api/transmission_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.car_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
          })
        }
      },
      kilometerOption: function(newVal, oldVal) {
        if(oldVal !== '') {  
        this.axios.post('/api/kilometer_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.car_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
          })
        }
      },
      yearOption: function(newVal, oldVal) {
        if(oldVal !== '') {  
        this.axios.post('/api/year_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.car_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
          })
        }
      },
      priceOption: function(newVal, oldVal) {   
        if(oldVal !== '') {       
        this.axios.post('/api/price_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.car_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
          })
        }
      }
  }
};
</script>

<style scoped>
.sort-header {
  padding-top: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid grey;
  align-items: center;
  justify-content: space-between;
}
.sort {
  display: flex;
  align-items: baseline;
}
.sort-view-icon {
  float: right;
}
.view-list.view-type {
  background: #f0f2f5;
  color: #8f8f8f;
  margin-left: 10px;
}
@media screen and (max-width: 768px) {
  .sort-header {
    margin: 15px;
    padding-top: 0 !important;
  }
  .sort-header-title {
    display: none;
  }
  .listShow {
    width: 100%;
  }
}
</style>>
