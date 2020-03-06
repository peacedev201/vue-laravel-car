<template>
  <div>
      <!-- <div v-if="loading"> -->
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
                        <a href="#" class="view-grid view-type" data-view="grid" v-on:click="handleChangeAuctionGridState">
                            <i class="stm-icon-grid"></i>
                        </a>
                        <a href="#" class="view-list view-type" data-view="list" v-on:click="handleChangeAuctionListState">
                            <i class="stm-icon-list"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div v-if="auctionListShow" class="row auctionListShow">
                <AuctionCarListItems v-if="loading" :cars="cars"/>
                <LoadingBar v-else/>
            </div>

            <div v-if="auctionGridShow" class="container" style="padding: 0px;">
                <AuctionCarListItemsView v-if="loading" :cars="cars"/>
                <LoadingBar v-else/>
            </div>
      </div>
      <!-- <LoadingBar v-else/>
  </div> -->
</template>

<script>
import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import VSelect from "@alfsnd/vue-bootstrap-select";
import AuctionCarListItems from './AuctionCarListItems'
import AuctionCarListItemsView from './AuctionCarListItemsView'
import LoadingBar from '../../components/LoadingBar'
Vue.use(VueAxios, axios);

export default {
  props: ['auctionFilterOption', 'auctionTransmissionOption', 'auctionKilometerOption', 'auctionYearOption', 'auctionPriceOption'],
  components: {
    VSelect,
    AuctionCarListItemsView,
    AuctionCarListItems,
    LoadingBar
  },
  data() {
      return {
          auctionGridShow: true,
          auctionListShow: false,
          selectedValueTransmission: '',
          cars: [],
          loading: false
      }
  },
  methods: {
      handleChangeAuctionGridState() {
          this.auctionGridShow = false
          this.auctionListShow = true
        //   console.log(this.auctionGridShow)
      },

      handleChangeAuctionListState() {
          this.auctionListShow = false
          this.auctionGridShow = true
        //   console.log(this.auctionGridShow)
      },
    async changedLabel(event) {
      await this.axios.post('/api/auction_date_filter', {data: event.text})
        .then( res => {
            this.cars = res.data.auction_ads
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
      await this.axios.get('/api/auctions')
      .then(res => {
        this.cars = res.data.auction_ads.reverse()
        for(var car of this.cars)
        {
          car.BILDE = JSON.parse(car.BILDE)
          car.INFO = JSON.parse(car.INFO)
          car.KONTAKT = JSON.parse(car.KONTAKT)
          car.SALG = JSON.parse(car.SALG)
          car.UTSTYR = JSON.parse(car.UTSTYR)
          car.timer = JSON.parse(car.timer)
        }
        this.loading = true
      })
      .catch(error => console.log("Error: "+error)) 
    },
    watch: {
      auctionFilterOption: function(newVal, oldVal) { 
        if(oldVal !== '') {
        this.axios.post('/api/auction_brand_filter', {data: newVal})
          .then(res => {
              // this.loading = false
              this.cars = res.data.auction_ads
              for (var car of this.cars) {
                car.BILDE = JSON.parse(car.BILDE);
                car.INFO = JSON.parse(car.INFO);
                car.KONTAKT = JSON.parse(car.KONTAKT);
                car.SALG = JSON.parse(car.SALG);
                car.UTSTYR = JSON.parse(car.UTSTYR);
              }
              // this.loading = true
          })
        }
      },
      auctionTransmissionOption: function(newVal, oldVal) {
        if(oldVal !== '') {
        this.axios.post('/api/auction_transmission_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.auction_ads
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
      auctionKilometerOption: function(newVal, oldVal) {
        if(oldVal !== '') {
        this.axios.post('/api/auction_kilometer_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.auction_ads
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
      auctionYearOption: function(newVal, oldVal) {
        if(oldVal !== '') {
        this.axios.post('/api/auction_year_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.auction_ads
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
      auctionPriceOption: function(newVal, oldVal) {      
        if(oldVal !== '') {  
        this.axios.post('/api/auction_price_filter', {data: newVal})
          .then(res => {
              this.cars = res.data.auction_ads
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
        .auctionListShow {
            width: 100%;
        }
    }
</style>>
