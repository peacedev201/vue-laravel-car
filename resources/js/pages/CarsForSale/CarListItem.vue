<template>
  <div>
      <div class="container list-item">
        <h1 class="car-item-name">{{adsTitle}}&nbsp;-&nbsp;{{modelSpecification}}</h1>
        <div class="row list-item-mobile-row">
          <div class="col-md-8">
            <!-- <img class="list-img" src='/images/15.jpg' alt=""/> -->
            <div>
              <slick ref="slick1" :options="slickOptions1" id="slick1">
                <div class="slider_car_div" v-for="(item, index) in sliderAds" v-bind:key="index">
                  <img v-lazy="item.URL" class="list-img" />
                </div>
              </slick>
              <div class="container" style="padding: 0; margin-top: 10px;">
                <slick ref="slick2" :options="slickOptions2" id="slick2">
                  <div class="slider_car_div" v-for="(item1, index1) in sliderAds" v-bind:key="index1">
                    <img v-lazy="item1.URL_THUMB" class="slider_car_img" />
                  </div>
                </slick>
              </div>
            </div>
            <!-- <LoadingBar v-else/> -->

            <div class="container" style="padding: 0px; margin-top: 50px;">
              <div class="car-info-menu-list">
                <div class="col-md-6 information">{{$t('Information')}}</div>
                <div class="menu-list-information">
                  <div class="col-md-12">
                    <div class="row menu-list-item" v-for="(itemsINFO, index) in carAd.INFO" v-bind:key="index">
                      <div class="col-md-6 item1">{{itemsINFO.LEDETEKST}}</div>
                      <div class="col-md-6 item2">{{itemsINFO.VERDI}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container" style="padding: 0px; margin-top: 50px;">
              <div class="car-info-menu-list">
                <div class="col-md-6 information">{{$t('Description')}}</div>
                <div class="row menu-list-information" style="margin: 0;">
                  <div class="col-md-12" v-html="carAd.BESKRIVELSE">
                    {{carAd.BESKRIVELSE}}
                  </div>
                </div>
              </div>
            </div>
            
            <div class="container" style="padding: 0; margin-top: 50px;">
                <GmapMap
                  :center="{lat:59.962553, lng:11.048484}"
                  :zoom="18"
                  map-type-id="roadmap"
                  style="height: 500px"
              >
                  <GmapMarker
                      :key="index"
                      v-for="(m, index) in markers"
                      :position="m.position"
                      :clickable="true"
                      :draggable="true"
                      @click="center=m.position"
                  />
              </GmapMap>
            </div>
          </div>
          <div class="col-md-4" style="font-size: 14px;">
            <div class="car-info-list">
              <div class="row car-info-menu-list">
                <div class="container">
                  <div class="row menu-list-img">
                    <img src="/images/logo.svg" alt style="width: 200px;" />
                  </div>

                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('Asking price')}}</div>
                    <div class="col-md-6 item2">
                      {{ carAd.SALG ? formatPrice(carAd.SALG.BELOP) : 0 }} Kr
                    </div>
                    <!-- <div v-else class="col-md-6 item2">
                      0 Kr
                    </div> -->
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('Sales Department')}}</div>
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('TELEFON')}}:</div>
                    <div class="col-md-6 item2">40097041</div>
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('EPOST')}}:</div>
                    <div class="col-md-6 item2">post@iauto.no</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="car-info-list" style="padding-top: 50px;">
              <div class="row car-info-menu-list">
                <div class="container">
                  <div class="row menu-list-features">
                    <div>{{$t('Equipment')}}</div>
                  </div>
                  <div v-if="Object.keys(utstyr).length === 4" >
                    <div>{{utstyr.KATEGORI}}</div>
                    <ul>
                      <li>{{utstyr.NAVN}}</li>
                    </ul>
                  </div>
                  <div v-else v-for="(items, index) in utstyr" :key="index" class="row menu-list-features">
                      <div>{{index}}</div>
                      <ul>
                          <li v-for="(item, idx) in items" :key="idx">{{item}}</li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</template>
<script>
import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import Slick from "vue-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.scss";
Vue.use(VueAxios, axios);
export default {
  components: {
    Slick,
  },
  data() {
    return {
      markers: [],
      tabIndex: 0,
      slickOptions1: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: true,
        asNavFor: "#slick2"
      },
      slickOptions2: {
        arrows: true,
        infinite: true,
        slidesToShow: 5,
        dots: true,
        autoplaySpeed: 3000,
        autoplay: false,
        speed: 1500,
        asNavFor: "#slick1",
        focusOnSelect: true,
        // variableWidth: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          }
        ]
      },
      carAd: [],
      sliderAds: [],
      adsTitle: '',
      modelSpecification: '',
      utstyr: [],
    };
  },
  methods: {
    addMarker() {
      const marker = {
        lat: 59.962553,
        lng: 11.048484
      };
      this.marker.push({ position: marker });
      this.center = marker;
    },
    formatPrice(value) {
        // let val = (value/1).toFixed(2).replace('.', '')
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    }
  },
  computed: {
    get() {
      return this.$route.params.id
    }
  },  
  async created() {
    var id = this.$route.params.id
    let uri =`/api/ad/${id}`
    await this.axios.get(uri)
      .then(res => {
        this.carAd = res.data.car_ad[0]
        this.carAd.BILDE = JSON.parse(this.carAd.BILDE)
        this.carAd.INFO = JSON.parse(this.carAd.INFO)
        this.carAd.KONTAKT = JSON.parse(this.carAd.KONTAKT)
        this.carAd.SALG = JSON.parse(this.carAd.SALG)
        this.carAd.UTSTYR = JSON.parse(this.carAd.UTSTYR)
        this.sliderAds = this.carAd.BILDE
        
        for(var item of this.carAd.INFO) {
          if(item.ID == 123) {
            this.adsTitle = item.VERDI
          }
          if(item.ID == 160) {
            this.modelSpecification = item.VERDI
          }
        }        
        if(Object.keys(this.carAd.UTSTYR).length === 4) {
          this.utstyr = this.carAd.UTSTYR
        } else {
          var foo = {};
          for(var style of this.carAd.UTSTYR) {
            let category = style.KATEGORI
            if(typeof foo[category] == 'undefined'){
              foo[category]= [style.NAVN];
            } else {
              foo[category].push(style.NAVN);
            }
          } 
          this.utstyr = foo   
        }
      })
      .catch(error => console.log("Error: "+ error)) 
  },
  watch: {
    sliderAds: function(newsliderAs) {
      let currIndex = this.$refs.slick1.currentSlide()
      let currIndex1 = this.$refs.slick2.currentSlide()
      this.$refs.slick1.destroy()
      this.$refs.slick2.destroy()
      this.$nextTick(() => {
        this.$refs.slick1.create()
        this.$refs.slick2.create()
        this.$refs.slick1.goTo(currIndex, true)
        this.$refs.slick2.goTo(currIndex1, true)
      })
    }
  }
};
</script>
<style>
.list-item {
  margin-top: 50px;
  margin-bottom: 50px;
  padding-top: 50px;
  padding-bottom: 50px;
  border-top: 1px solid #ddd;
  overflow-wrap: break-word;
}
.list-img {
  width: 100%;
}
.slider_car_div {
  padding-right: 10px;
}
.slider_car_img {
  max-height: 80px;
}
.car-info-menu-list {
  background: #f0f2f5;
}
.menu-list-item {
  border-bottom: 1px solid #ddd;
  margin: 10px;
  padding-bottom: 10px;
}
.item1 {
  padding: 0;
}
.item2 {
  padding: 0;
  font-weight: 600;
}
.menu-list-img {
  display: flex;
  justify-content: center;
  padding: 30px 0;
  border-bottom: 1px solid #ddd;
  margin: 10px;
}

.menu-list-features {
  border-bottom: 1px solid #ddd;
  margin: 10px;
  padding-bottom: 10px;
  display: block;
}
.menu-list-information {
  display: flex;
  font-size: 12px;
}
.information {
  padding-left: 20px;
  padding-top: 10px;
}

@media screen and (max-width: 768px) {
  .list-item {
    margin-top: 0;
  }
  .list-item-mobile-row {
    width: 100%;
    margin: 0;
  }
  .car-item-name {
    padding-top: 100px;
    font-size: 26px;
  }
  .item1 {
      width: 50%;
  }
  .item2 {
      width: 50%;
      overflow-wrap: break-word;
  }
  .menu-list-item {
      display: flex;
  }
  .menu-list-information {
      display: block;
  }
  .car-info-list {
      padding-top: 50px;
  }
}
</style>