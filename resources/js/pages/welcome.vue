<template>
<div>
  <!-- <b-modal ref="my-modal" hide-footer title="COMMING SOON">
      <div class="d-block text-center">
        <h6>OUR WEBSITE IS CURRENTLY UNDER CONSTRUCTION.
          WE SINCERELY APOLOGIZE FOR THE INCONVENIENCE AND WILL HAVE OUR UPDATED WEBSITE
          UP SOON.
        </h6>
        <br />
        <h6>PHONE NUMBER: +47 40097041</h6>
        <br />
        <h6>E-MAIL: POST@IAUTO.NO</h6>
      </div>
      <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close</b-button>
  </b-modal> -->
  <!-- <Header /> -->
  <div class="row" style="margin: 0px;">
    <div class="col-md-12 slick-slider-mobile" style="padding: 0px;">
      <slick
        ref="slick"
        :options="slickOptions"
      >
        <div style="position: relative;">
          <!-- <img src="/images/8.jpg" alt="" class="image-slider"> -->
          <img class="image-slider" :width="50" :height="50" v-lazy="src1" :data-srcset="src1+'?size=50 50w'" alt />                            
        </div>
        <div style="position: relative;">
          <!-- <img src="/images/7.jpg" alt="" class="image-slider"> -->
          <img class="image-slider" :width="50" :height="50" v-lazy="src2" :data-srcset="src2+'?size=50 50w'" alt />                            
          <div class="slider-txt-div2" style="position: absolute; top: 20%; right: 5%; display: flex; align-items: center;">
             <div style="display: flex; transition-delay: 1.5s; transition-duration: 1s; border-radius: 50%; background: #cc6119; width: 310px; height: 310px; align-items: center; justify-contents: center;">
               <div style="display: block;">
                 <div style="width: 150px; margin-left: auto; margin-right: auto;">
                    <h6 style="color: white;">2016 new</h6>
                    <h6 style="color: black;">MERCEDES-BENS</h6>
                    <h6 style="color: black;">C-CLASS</h6>
                 </div>
                 <div style="width: 300px;">
                    <h6 style="padding-left: 5px;">Auction ID: 1</h6>
                    <h6 style="color: black; text-align: right; font-size: 13px; margin-right: 20px;">CURRENT BID: 463 000,-Kr</h6>
                    <div style="display: flex; justify-content: center; align-items: baseline;">
                        <h6 style="color: black;">My Bid</h6>
                        <input class="form-control" type="text" style="text-align: right; margin-left: 10px; width: 65%;" placeholder="464 000"/>
                    </div>
                    <div style="display: flex; justify-content: flex-end; align-items: baseline; padding-top: 5px;">
                        <button class="btn btn-primary" style="margin-right: 10px; font-size: 14px; background: #58ba3a; border: #58ba3a;">Bid</button>
                        <button class="btn btn-primary" style="margin-right: 20px; font-size: 14px; background: #58ba3a; border: #58ba3a;">Auto Bid</button>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: baseline; padding-top: 10px;">
                        <h6 style="font-size: 12px;">TIME LEFT:</h6>
                        <h6 style="font-size: 12px;">1 DAY 2:30 MINUTES</h6>
                    </div>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </slick>
    </div>

    <div class="col-md-12 car-listing-title">
      <div class="container" style="display: flex;">
        <div class="col-md-8 listing-title">
          <div class="listing-title-txt1">{{$t('welcome_to')}}</div>&nbsp;&nbsp;
          <span class="listing-title-txt2">iAUTO AS</span>
        </div>
        <div class="col-md-4 found-cars">
          <i class="stm-icon-car"></i>&nbsp;
          <span class="found-cars-txt1">{{$t('available')}}</span>&nbsp;
          <span class="found-cars-txt2" style="margin: 0; color: #58ba3a;">{{availableCar}}&nbsp;{{$t('cars')}}</span>
        </div>
      </div>
    </div>

    <div class="container mobile-tab">
      <b-card no-body style="border: none;">
        <b-tabs v-model="tabIndex" card class="card-header-bg">
          <b-tab :title-link-class="linkClass(0)">
            <template v-slot:title>
              {{$t('used_cars')}}
            </template>
            <CarLists v-if="loading" :cars="cars"/>
            <LoadingBar v-else />
          </b-tab>
          <b-tab :title-link-class="linkClass(1)">
            <template v-slot:title>
              {{$t('auction')}}
            </template>
            <AuctionCarLists />
          </b-tab>
          <b-tab :title-link-class="linkClass(2)">
             <template v-slot:title>
              {{$t('search_inventory')}}
            </template>
          </b-tab>
        </b-tabs>
      </b-card>
    </div>

  </div>
  <!-- <Footer /> -->
</div>
</template>

<script>

import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import { mapGetters } from 'vuex'
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.scss';
import Parallax from "vue-parallaxy";
import CarLists from './CarLists'
import AuctionCarLists from './AuctionCarLists'
import LoadingBar from '../components/LoadingBar'
import { BButton } from 'bootstrap-vue'
Vue.component('b-button', BButton)
// Vue.component('b-modal', BModal)
Vue.use(VueAxios, axios);

export default {
  layout: 'basic',

  data () {
			return {        
        tabIndex: 0,
				slickOptions: {
					arrows: false,
					slidesToShow: 1,
					dots: false,
          infinite: true,
          autoplaySpeed: 3000,
          autoplay: true,
          fade: true,
          swipeToSlide: true,
          speed:1500
        },
        cars: [],
        isOpen: true,
        availableCar: '',
        src1: '/images/8.jpg',
        src2: '/images/7.jpg',
        loading: false,
			}
		},

  components: { 
    Slick,
    Parallax,
    CarLists,
    AuctionCarLists,
    LoadingBar
  },

  // metaInfo () {
  //   return { title: this.$t('home') }
  // },

  computed: mapGetters({
    authenticated: 'auth/check'
  }),

   methods: {
      linkClass(idx) {
        if (this.tabIndex === idx) {
          return ['bg-white', 'text-success']
        } else {
          return ['bg-dark', 'text-secondary']
        }
      },
      // showModal() {
      //   this.$refs['my-modal'].show()
      // },
      // hideModal() {
      //   this.$refs['my-modal'].hide()
      // }
    },
    async created() {
      await this.axios.get('/api/ads')
        .then( res => {
          this.cars = res.data.car_ads

          for(var car of this.cars)
          {
            car.BILDE = JSON.parse(car.BILDE)
            car.INFO = JSON.parse(car.INFO)
            car.KONTAKT = JSON.parse(car.KONTAKT)
            car.SALG = JSON.parse(car.SALG)
            car.UTSTYR = JSON.parse(car.UTSTYR)
          }

          // console.log(this.cars)

          var foo = []
          for (var car of this.cars) {
            if(car.STATUS === 'Til salgs') {
               foo.push(car)
            }
          }   
          this.availableCar = foo.length
          // console.log(this.availableCar)
          this.loading = true
        })
        .catch(error => console.log("Error: "+error)) 
    },
    mounted() {
      // this.showModal();
    }
}
</script>

<style>
  .car-listing-title {
    padding: 0px; 
    text-align: center; 
    display: flex; 
    background: #232628; 
    margin-top: -10px;
  }
  .listing-title {
    padding: 0;
    padding-top: 30px; 
    padding-bottom: 50px; 
    display: flex; 
    justify-content: flex-start;
  }
  .found-cars {
    padding: 0;
    display: flex; 
    justify-content: flex-end;
    align-items: center;
    color: #aaa;
  }
  .listing-title-txt1 {
    color: white; 
    font-size: 36px; 
    font-weight: 700; 
    line-height: 1.2;
  }
  .listing-title-txt2 {
    color: #58ba3a; 
    font-size: 36px; 
    font-weight: 700; 
    line-height: 1.2;
  }
  .card-header-bg .card-header {
    background: #232628;
    font-size: 14px;
  }
  .slider-txt-div1 {
    position: absolute; 
    top: 20%; 
    right: 10%;
  }
  .found-cars-txt1 {
    font-size: 13px;
    font-weight: 700;
    line-height: 26px;
  }
  .found-cars-txt2 {
    font-size: 13px;
    font-weight: 700;
    line-height: 26px;
    color: #58ba3a;
  }
  .mobile-tab {
    margin-top: -49px; 
    z-index: 10; 
    padding: 0px; 
    padding-bottom: 100px;
  }
  .nav-tabs .nav-link {
    border: 0px solid transparent;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  .image-slider {
    width: 100%;
    max-height: 495px;
    object-fit: cover;
  }

  @media screen and (max-width: 767px) { 
    .image-slider {
      object-fit: cover;
      height: 375px;
      width: 100%;
    }
    .slider-txt-div1 {
      display: none;
    }
    .slider-txt-div2 {
      display: none !important;
    }
    .car-listing-title{
      display: block !important;
    }
    .mobile-tab {
      margin-top: -119px !important; 
      z-index: 0 !important; 
      padding: 15px !important; 
      /* padding-right: 15px !important; 
      padding-bottom: 0 !important; */
    }
    .image {
      width: 100% !important;
    }
    .nav-item {
      font-size: 10px !important;
    }
    .mobile-btn {
      font-size: 10px !important;
    }
    .mobile-txt1 {
      display: none !important;
    }
    .mobile-txt2 {
      display: none !important;
    }
    .found-cars {
      display: none;
    }
    .listing-title {
      padding: 0;
      padding-top: 15px; 
      padding-bottom: 115px; 
    }
    .card-header ul{
      display: block;
    }
    .slick-slider-mobile {
      margin-top: 110px;
    }
    .container {
      max-width: 800px;
    }
  }

  @media screen and (max-width: 519px) { 
    .image-slider {
      object-fit: cover;
      height: 250px;
      width: 100%;
    }
    .listing-title {
      display: block;
    }
  }
  @media (min-width:768px) and (max-width:991px){
    .listing-title-txt1 {
      font-size: 33px;
    }
    .listing-title-txt2 {
      font-size: 34px;
    }
  }
  @media (min-width:768px) and (max-width:1199px){
    .image-slider {
      height: 410px !important;
      max-height: unset;
    }
    .listing-title {
      padding-bottom: 50px !important;
    }
    .image {
      width: 207px !important;
    }
  }

  @media (min-width:1200px) {
    .image-slider {
      height: 600px !important;
      max-height: unset;
    }
  }

</style>
