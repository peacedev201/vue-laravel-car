<template>
  <div>
    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
      <div v-for="(car, idx) in cars.slice().reverse()" :key="idx" v-if="idx <= loopCondition" class="col-md-3 mobile-div">
        <div>
          <div v-if="!car.BILDE">
            <div v-if="car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                  <!-- <img class="image" src="/images/empty.jpg" alt /> -->
                  <img class="image" :width="50" v-lazy="src" :data-srcset="src+'?size=50 50w'" alt />
                  <div class="stm-badge-directory heading-font stm-badge-dealer">
			              {{$t('sold')}}
                  </div>
                <!-- </router-link> -->
            </div>
          </div>
          <div v-else v-for="(items, index) in car.BILDE" :key="index">
            <div v-if="!items.URL">
              <!-- {{car.BILDE.URL._text}} -->
                <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                  <!-- <img class="image" v-if="index === 'URL'" v-lazy="car.BILDE.URL" alt />         -->
                  <div v-if="index === 'URL' && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                    <div class="stm-badge-directory heading-font stm-badge-dealer">
			                {{$t('sold')}}
                    </div>
                  </div>
                  <div v-else-if="index === 'URL'">
                    <img class="image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                  </div>
                <!-- </router-link> -->
            </div>
            <div v-else>
              <div v-if="index===0 && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                <router-link :to="{ name: 'CarListItem', params: {id: car.ID}}">
                  <!-- <img class="image" v-lazy="items.URL" alt /> -->
                  <img class="image" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                  <div class="stm-badge-directory heading-font stm-badge-dealer">
			              {{$t('sold')}}
                  </div>
                </router-link>
              </div>
              <div v-else-if="index===0">
                <router-link :to="{ name: 'CarListItem', params: {id: car.ID}}">
                  <img class="image" data-sizes="auto" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                </router-link>
              </div>
            </div>          
          </div>
        </div>
        <div class="listing-car-item-meta">
          <div class="car-meta-top">
            <div class="car-title">
              <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 123">{{itemsInfo.VERDI}}
                <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 129">{{itemsInfo.VERDI}}</span>
              </span>
            </div>
            <div class="price">
              <div v-if="car.SALG.BELOP" class="normal-price">{{formatPrice(car.SALG.BELOP)}}Kr</div>
              <div v-else class="normal-price">0 Kr</div>
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
    <div
      v-if="loopCondition === 7"
      class="row"
      style="justify-content: center; padding-top: 20px; padding-bottom: 40px;"
    >
      <button
        class="btn-primary"
        style="padding: 10px; background: #58ba3a; border-color: #58ba3a; border-radius: 5px;"
        @click="handleLoopCondition"
      >{{$t('show_all')}}</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["cars"],
  data() {
    return {
      loopCondition: 7,
      src: '/images/empty.jpg'
    };
  },
  methods: {
    handleLoopCondition() {
      // alert(this.loopCondition);
      this.loopCondition = this.cars.length;
    },
    formatPrice(value) {
        // let val = (value/1).toFixed(2).replace('.', '')
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    }
  }
};
</script>
<style scoped>
.image {
  width: 252px;
  height: 170px;
  overflow: hidden;
  position: relative;
  object-fit: cover;
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
  position: relative;
  float: right;
  padding: 0px 3px 0px 3px;
  margin-left: 18px;
  background-color: #58ba3a;
  text-align: right;
  color: #fff;
}
.price::before {
  position: absolute;
  content: "";
  display: block;
  top: 0;
  left: -12px;
  height: 100%;
  width: 32px;
  background-color: #58ba3a;
  transform: skew(-14deg, 0deg);
  z-index: 5;
}
.normal-price {
  color: #fff;
  font-size: 14px;
  position: relative;
  z-index: 6;
  font-weight: 700;
  line-height: 36px;
  width: 85px;
}
.car-title {
  color: #232628;
  overflow: hidden;
  text-transform: uppercase;
  font-size: 14px;
  line-height: 18px;
  font-weight: 700;
}
.car-meta-bottom ul {
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 12px;
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

.mobile-div {
  padding-bottom: 40px;
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

.image-hidden {
  overflow: hidden;
}
/* Mobile Version responsive */
@media (min-width:213px) and (max-width:320px){
  .mobile-div {
    padding: 0;
  }
  .car-title {
    font-size: 8px;
  }
  .normal-price {
    font-size: 8px;
  }
  .price {
    width: 60px;
  }
  .car-meta-bottom ul li {
    font-size: 7px;
  }
  .btn-primary {
    font-size: 10px;
  }
}
@media screen and (max-width: 767px) {
  .image img {
    width: 100% !important;
    overflow: hidden;
  }
  .image {
    overflow: hidden;
    position: relative;
    height: auto;
    object-fit: unset;
  }
}

@media (min-width:768px) and (max-width:991px){
    .image {
      width: 205px !important;
      height: 130px !important;
    }
    .col-md-3 {
      max-width: 33%;
    }
}

</style>