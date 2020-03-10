<template>
  <div>
    <!-- <div v-if="loading"> -->
    <div class="container list-item">
      <h1 class="car-item-name" style="overflow-wrap: break-word;">{{adsTitle}}&nbsp;-&nbsp;{{modelSpecification}}</h1>      
      <div class="row list-item-mobile-row">
        <div class="col-md-8">
          <div>
            <slick ref="slick1" :options="slickOptions1" id="slick1">
              <div class="slider_car_div" v-for="(item, index) in sliderAds" v-bind:key="index">
                <img v-lazy="item.URL" class="list-img" alt />
              </div>
            </slick>
            <div class="container" style="padding: 0; margin-top: 10px;">
              <slick ref="slick2" :options="slickOptions2" id="slick2">
                <div class="slider_car_div" v-for="(item1, index1) in sliderAds" v-bind:key="index1">
                  <img v-lazy="item1.URL_THUMB" class="slider_car_img" alt />
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
                    <div class="col-md-6 item2" style="overflow-wrap: break-word;">{{itemsINFO.VERDI}}</div>
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

          <div class="container" style="padding: 0px; margin-top: 50px;">
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
                  <div class="col-md-6 item1">{{$t('auction_number')}}</div>
                  <div class="col-md-6 item2">{{carAd.ID}}</div>
                </div>

                <template v-if="!complete">
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('starting_price')}}</div>
                    <div class="col-md-6 item2">{{formatPrice(old_price)}} Kr</div>
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('mybid')}}</div>
                    <div class="col-md-6 item2">
                        <input class="form-control" type="text" v-model="price" style="text-align: right;"/>
                    </div>
                  </div>
                  <div class="row menu-list-item">
                    <!-- <div class="col-md-6 item1"></div> -->
                    <div class="col-md-12 col-sm-12" style="text-align: right;">
                      <button @click="handleBid" type="button" class="btn btn-success price-btn">{{$t('bid')}}</button>
                      <button @click="handleAutoBid" type="button" class="btn btn-success price-btn">{{$t('auto_bid')}}</button>
                    </div>
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('bid_increase')}}</div>
                    <div class="col-md-6 item2">{{formatPrice(1000)}} Kr</div>
                  </div>

                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('phone')}}:</div>
                    <div class="col-md-6 item2">40097041</div>
                  </div>
                  <div class="row menu-list-item">
                    <div class="col-md-6 item1">{{$t('email')}}:</div>
                    <div class="col-md-6 item2">post@iauto.no</div>
                  </div>

                  <div class="row menu-list-item" style="display: block;">
                    <div class="col-md-6 item1">
                      {{$t('ends_in')}}: 
                    </div>
                    <div class="col-md-6 item2">
                        <AuctionTimer 
                          starttime="Oct 10, 2019 00:00:00" 
                          :endtime="carAd.timer.replace(/<(.|\n)*?>/g, '')"
                          trans='{  
                          "day":"Day",
                          "hours":"Hours",
                          "minutes":"Minuts",
                          "seconds":"Seconds",
                          "expired":"Event has been expired.",
                          "running":"Till the end of event.",
                          "upcoming":"Till start of event.",
                          "status": {
                              "expired":"Expired",
                              "running":"Running",
                              "upcoming":"Future"
                            }}'
                          @end="completeAuction"
                      ></AuctionTimer>
                    </div>
                  </div>
                </template>

                <div class="row menu-list-item">
                  <div class="col-md-6 item1">{{!complete?$t('ends'):$t('completed')}}:</div>
                  <div class="col-md-6 item2">{{ carAd.timer }}</div>
                </div>

                <div v-if="!complete" class="row menu-list-item">
                  <div class="col-md-6 item1">{{$t('extended_after_last_bid')}}:</div>
                  <div class="col-md-6 item2">2 minutes</div>
                </div>

              </div>
            </div>
          </div>

          <div class="car-info-list" style="padding-top: 50px;">
            <div class="row car-info-menu-list">
              <div class="container">
                <div class="row menu-list-features">
                  <div>Utstyr</div>
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

          <div class="car-info-list" style="padding-top: 50px;">
            <div class="row menu-list-features">
              <div>{{$t('bidding')}}</div>
            </div>
            <ul v-for="(item, idx) in bids" :key="idx" style="display: flex; list-style-type: none; padding: 0; justify-content: space-between;">
              <li><i class="fas fa-user" v-if="idx === 0" v-bind:style="{'color': 'red'}"></i><i class="fas fa-user" v-else></i></li>
              <li>{{formatBid(item.mobile_number)}}</li>&nbsp;&nbsp;
              <li>{{item.created_at}}</li>
              <template v-if="item.bid_status==1">
                <li>{{formatPrice(item.bid_price)}}<span style="color: red;">*</span></li>&nbsp;&nbsp;
              </template>
              <template v-else>
                <li>{{formatPrice(item.bid_price)}}</li>&nbsp;&nbsp;
              </template>
            </ul>
            <ul style="display: flex; list-style-type: none; padding: 0; font-size: 13px;">
              <li><i class="fas fa-user" v-bind:style="{'color': 'red'}"></i></li>&nbsp;&nbsp;
              <li>{{$t('Indicates bidder')}}, <span style="color: red;">*</span> {{$t('indicates the use of auto bidding')}}.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- <LoadingBar v-else/>
  </div> -->
</template>
<script>
import Vue from "vue";
import VueAxios from "vue-axios";
// import LoadingBar from '../../components/LoadingBar'
import AuctionTimer from './AuctionTimer'
import axios from "axios";
import Slick from "vue-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.scss";
import { mapGetters } from 'vuex'
Vue.use(VueAxios, axios);
export default {
  components: {
    Slick,
    AuctionTimer
    // LoadingBar
  },
  data() {
    return {
      markers: [],
      old_price: '',  
      price: '',
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
        adaptiveHeight: false,
        autoplaySpeed: 3000,
        autoplay: false,
        speed: 1500,
        asNavFor: "#slick1",
        focusOnSelect: true,
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
      // loading: false,
      carAd: [],
      sliderAds: [],
      adsTitle: '',
      modelSpecification: '',
      utstyr: [],
      userbid: {
        'name': '',
        'mobile_number': '',
        'price': '',
        'ID': '',
        'bid_status': ''
      },
      bids: [],
      complete: false
    };
  },
  computed: mapGetters({
    user: 'auth/user'
  }),
  async created() {
    var id = this.$route.params.id
    let uri =`/api/auction/${id}`
    await this.axios.get(uri)
      .then(res => {
        this.bids = res.data.bidInfo
        this.carAd = res.data.auction_ad[0]
        this.carAd.BILDE = JSON.parse(this.carAd.BILDE)
        this.carAd.INFO = JSON.parse(this.carAd.INFO)
        this.carAd.KONTAKT = JSON.parse(this.carAd.KONTAKT)
        this.carAd.SALG = JSON.parse(this.carAd.SALG)
        this.carAd.UTSTYR = JSON.parse(this.carAd.UTSTYR)
        this.carAd.timer = JSON.parse(this.carAd.timer)
        this.sliderAds = this.carAd.BILDE
        this.old_price = this.carAd.SALG.BELOP
        this.price = parseInt(this.old_price) + 1000
        if(this.bids.length !== 0)
        {
          this.old_price = this.bids[0].bid_price
          this.price = parseInt(this.old_price) + 1000
        }
        
        // console.log(this.carAd.INFO)
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
        // this.loading = true
      })
      .catch(error => console.log("Error: "+ error)) 
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
    handleBid() {
        if(!this.user) {
            alert("Please Login!")
            this.$router.push({ name: 'login' })
        } else {
          if(this.price - this.old_price < 1000 ) {
            alert("Minimum bid increase 1000Kr!!!")
          } else {
            this.userbid.name = this.user.name
            this.userbid.mobile_number = this.user.mobile_number
            this.userbid.price = this.price
            this.userbid.ID = this.carAd.ID
            this.userbid.bid_status = '0'            
            this.axios.post('/api/bids', {body: this.userbid})
              .then(res => {
                alert("Bid Success!")
                this.bids = res.data.success
                this.old_price = this.bids[0].bid_price
              })
          }
        }
    },
    handleAutoBid() {
        if(!this.user) {
            alert("Please Login!")
            this.$router.push({ name: 'login' })
        } else {
            if(this.price - this.old_price < 1000 ) {
            alert("Minimum bid increase 1000Kr!!!")
          } else {
            this.userbid.name = this.user.name
            this.userbid.mobile_number = this.user.mobile_number
            this.userbid.price = this.price
            this.userbid.ID = this.carAd.ID
            this.userbid.bid_status = '1'            
            this.axios.post('/api/bids', {body: this.userbid})
              .then(res => {
                alert("Auto Bid Success!")
                this.bids = res.data.success
                this.old_price = this.bids[0].bid_price
              })
          }
        }
    },
    formatPrice(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    },
    formatBid(value) {
        var texts = value.toString().substr(3, 5);
        return value.toString().replace(texts, "*****")
    },
    completeAuction(value) {
      this.complete = value
    }
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
  padding-right: 0px;
}
.slider_car_img {
  /* max-height: 80px; */
  max-width: 130px;
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

.price-btn {
    font-size: 13px;    
    background: #58ba3a;
    border: 1px solid #58ba3a;
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