<template>
<div>
  <div v-if="loadingItem" style="width: 100%;">
    <!-- <div class="container"> -->
      <div class="row mobile-grid" style="padding-top: 20px; padding-bottom: 20px;">
        <div v-for="(car, idx) in cars.slice(12*(currentPage-1), 12*(currentPage))" :key="idx" class="col-md-4">
          <div v-if="!car.BILDE">
            <div v-if="car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">                            
              <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                <!-- <img class="image" src="/images/empty.jpg" alt /> -->
                <img class="image" :width="50" v-lazy="src" :data-srcset="src+'?size=50 50w'" alt />
                <div class="stm-badge-directory heading-font stm-badge-dealer">
                   {{$t('Sold')}}
                </div>
              <!-- </router-link> -->
           </div>
          </div>
          <div v-else v-for="(items, index) in car.BILDE" :key="index">
            <div v-if="!items.URL">
              <div v-if="index === 'URL' && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                    <div class="stm-badge-directory heading-font stm-badge-dealer">
			                {{$t('Sold')}}
                    </div>
                  </div>
                  <div v-else-if="index === 'URL'">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                  </div>
            </div>
            <div v-else>
              <div v-if="index===0 && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                <router-link :to="{ name: 'AuctionCarListItem', params: {id: car.ID} }">
                  <img class="image" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                  <div class="stm-badge-directory heading-font stm-badge-dealer">
			              {{$t('Sold')}}
                  </div>
                </router-link>
              </div> 
              <div v-else-if="index===0">
                <router-link :to="{ name: 'AuctionCarListItem', params: {id: car.ID} }">
                  <img class="image" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                </router-link>
              </div>  
            </div>
          </div>

          <div class="listing-car-item-meta">
            <div class="car-meta-top">
              <div class="car-title">
                <span v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 123">
                    {{items.VERDI}}
                    <span v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 160">
                      {{items.VERDI}}
                    </span>
                </span>
                <!-- <div v-if="car.SALG.BELOP" class="car-auction-price">{{formatPrice(car.SALG.BELOP)}}Kr</div>
                <div v-else class="car-auction-price">0 Kr</div> -->
              </div>
              <div class="price">
                <button type="button" class="btn btn-success price-btn">{{$t('Bid')}}</button>
                <button type="button" class="btn btn-success price-btn">{{$t('Auto Bid')}}</button>
              </div>
            </div>
            <div class="car-meta-bottom">
              <ul>
                <li>
                  <span v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 156">
                    {{formatPrice(items.VERDI)}}
                  </span>
                  <i class="fas fa-road"></i>
                </li>
                <li>
                  <span v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 111">
                    {{items.VERDI}}
                  </span>
                  <i class="fas fa-gas-pump"></i>
                </li>
                <li>
                  <span v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 118">
                    {{items.VERDI}}
                  </span>
                  <i class="stm-icon-transmission_fill"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>     
      </div>
      <div class="row" style="padding-top: 20px; padding-bottom: 20px; justify-content: center;">
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
  <div v-else style="margin-top: 20px; margin-bottom: 20px;">
    {{$t('txt_information')}}
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
              perPage: 12,
              currentPage: 1,
              src: '/images/empty.jpg',
              loadingItem: true
          }
      },
      methods: {
        formatPrice(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        }
      },
      mounted() {
        if(this.cars.length === 0) {
            this.loadingItem = false
        } else {
            this.loadingItem = true
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
    display: flex;
    border-bottom: 1px solid #ccc;
    justify-content: space-between;
  }
  .price {
    display: block;
    text-align: right;
  }
  .price-btn {
    font-size: 11px;
    margin-bottom: 10px;
    background: #58ba3a;
    width: max-content;
  }
  .car-title {
    color: #232628;
    overflow: hidden;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 18px;
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

  /* .car-auction-price {
        position: relative;    
        background-color:#58ba3a;
        text-align: center;
        font-size: 12px;
        line-height: 25px;
        color: white;
        margin:0;
        margin-top: 5px;
        padding: 0px 5px;
  } */

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

  @media screen and (max-width: 768px) {
    .mobile-grid {
      padding-left: 30px;
    }
    .image {
      width: 100%;
    }
    .car-meta-top {
      justify-content: space-between
    }
    .car-title {
      font-size: 14px;
      font-weight: 900;
    }
    .price-btn {
      font-size: 14px;
      font-weight: 900;
      width: auto;
    }
    /* .car-auction-price {
      font-size: 14px;
      font-weight: 900;
    } */
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