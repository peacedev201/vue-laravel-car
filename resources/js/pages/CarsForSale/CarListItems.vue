<template>
  <div style="width: 100%;">
    <!-- <div class="container"> -->
      <div class="row mobile-grid" style="padding-top: 20px; padding-bottom: 20px;">
        <div v-for="(car, idx) in cars.slice(12*(currentPage-1), 12*(currentPage))" :key="idx" class="col-md-4">
          <div v-if="!car.BILDE">
            <div v-if="car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">                            
              <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                <!-- <img class="image" src="/images/empty.jpg" alt /> -->
                <img class="image" :width="50" v-lazy="src" ::data-srcset="src+'?size=50 50w'" alt />
                <div class="stm-badge-directory heading-font stm-badge-dealer">
                   {{$t('Sold')}}
                </div>
              <!-- </router-link> -->
           </div>
          </div>
          <div v-else v-for="(items, index) in car.BILDE" :key="index">
            <div v-if="!items.URL">
              <!-- {{car.BILDE.URL._text}} -->
              <div v-if="index==='URL'">
                <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                  <div v-if="index === 'URL' && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                    <div class="stm-badge-directory heading-font stm-badge-dealer">
			                {{$t('Sold')}}
                    </div>
                  </div>
                  <div v-else-if="index === 'URL'">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                  </div>
                <!-- </router-link> -->
              </div>
            </div>
            <div v-else>
              <div v-if="index===0 && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                <router-link :to="{ name: 'CarListItem', params: {id: car.ID} }">
                  <img class="image" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                  <div class="stm-badge-directory heading-font stm-badge-dealer">
			              {{$t('Sold')}}
                  </div>
                </router-link>
              </div>  
              <div v-else-if="index===0">
                <router-link :to="{ name: 'CarListItem', params: {id: car.ID} }">
                  <img class="image" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                </router-link>
              </div>  
            </div>
          </div>
          <div class="listing-car-item-meta">
            <div class="car-meta-top">
              <div class="price">
                <div v-if="car.SALG.BELOP" class="normal-price">{{formatPrice(car.SALG.BELOP)}}Kr</div>
                <div v-else class="normal-price">0 Kr</div>
              </div>
              <div class="car-title">
                <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 123">{{itemsInfo.VERDI}}
                  <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 160">{{itemsInfo.VERDI}}</span>
                </span>
              </div>
            </div>
            <div class="car-meta-bottom">
              <ul>
                <li>
                  <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 156">
                    {{formatPrice(itemsInfo.VERDI)}}
                  </span>
                  <i class="stm-icon-road"></i>
                </li>
                <li>
                  <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 111">
                    {{itemsInfo.VERDI}}   
                  </span>
                  <i class="stm-icon-fuel"></i>
                </li>
                <li>
                  <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 118">
                    {{itemsInfo.VERDI}}   
                  </span>
                  <i class="stm-icon-transmission_fill"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>     
      </div>
      <div class="row" style="justify-content: center;">
        <b-pagination
              v-model="currentPage"
              :total-rows="cars.length"
              :per-page="perPage"
              prev-text="Prev"
              next-text="Next"
          >
        </b-pagination>
      </div>
  </div>
</template>
<script>
import Vue from 'vue'
import { PaginationPlugin } from 'bootstrap-vue'
Vue.use(PaginationPlugin)
export default {
  props: ["cars"],
  data() {
        return {
            // rows: 0,
            perPage: 12,
            currentPage: 1,
            src: '/images/empty.jpg'
        }
    },
    methods: {
        formatPrice(value) {
            // let val = (value/1).toFixed(2).replace('.', '')
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        }
    }
}
</script>

<style scoped>
    @media screen and (min-width: 768px) {
      .image {
        width: 242px;
        height: 177px;
      }
    }
  .listing-car-item-meta {
    padding-top: 17px;
  }
  .car-meta-top {
    padding-bottom: 17px;
    border-bottom: 1px solid #ccc;
    justify-content: space-between;
  }
   .price {
    position: relative;
    float: right;
    padding: 1px 10px 2px 4px;
    margin-left: 18px;
    background-color:#58ba3a;
    text-align: right;    
    color: #fff;
    font-size: 14px;
  }
  .price::before {
    position: absolute;
    content: '';
    display: block;
    top: 0;
    left: -12px;
    height: 100%;
    width: 32px;
    background-color: #58ba3a;
    transform: skew(-14deg,0deg);
    z-index: 5;
  }
  .normal-price {
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    position: relative;
    z-index: 6;
  }
  .car-title {
    color: #232628;
    overflow: hidden;
    font-size: 14px;
    line-height: 14px;
    font-weight: 700;
    overflow-wrap: break-word;
  }
  
  .car-meta-bottom ul {
    list-style: none; 
    padding: 0; 
    margin: 0;
    font-size: 11px;
  }

  .car-meta-bottom ul li {
    display: inline-block;
    margin-top: 4px;
    margin-bottom: 0;
    margin-right: 10px;
    color: #888;
    vertical-align: middle;
    padding: 0;
  }
  .stm-badge-directory.heading-font.stm-badge-dealer {
    position: absolute;
    left: -65px;
    padding: 0 55px;
    top: 15px;
    width: 200px;
    height: 33px;
    line-height: 33px;
    transform: rotate(-45deg);
    color: #fff !important;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 700;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    background: #58ba3a;
  }
  /* Mobile responsive */
  @media screen and (max-width: 767px) {
    .mobile-grid {
      padding-left: 30px;
    }
    .image {
      width: 100%;
    }
    .car-meta-top {
      justify-content: space-between;
    }
    .car-title {
      font-size: 14px;
    }
    .normal-price {
      font-size: 14px;
    }
  }

  /* Desktop Version Mobile responsive */
    @media screen and (min-width: 768px) and (max-width: 991px) {
        .image {
          width: 230px !important;
          height: auto;
        }
    }   
    @media screen and (min-width: 992px) and (max-width: 1199px) {
        .image {
          width: 203px !important;
          height: auto;
        }
    }   
    @media screen and (min-width: 1200px) {
        .image {
          width: 243px !important;
          height: auto;
        }
    }   
</style>