<template>
  <div class="animated fadeIn">
    <!-- <Tables /> -->
      <div class="row">
        <div class="btn-group mobile" role="group">
          <button @click="remove()" type="button" class="btn btn-success">AuctionRemove</button>
          <button @click="save()" type="button" class="btn btn-success" style="margin-left: 10px;">AuctionPost</button>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Car Image</th>
                <th scope="col">Brand/Model</th>
                <th scope="col">Year</th>
                <th scope="col">Asking price</th>
                <th scope="col">Timer</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(car, index) in auction_ads" :key="index">
                <td>
                  <div class="custom-control custom-checkbox">
                    <input @click="checkedAds($event, car, index)" v-model="car.checked" type="checkbox" class="custom-control-input" :id="index"/>
                    <label class="custom-control-label" :for="index">{{index+1}}</label>
                  </div>
                </td>
                <td>
                  <div v-for="(items, index) in car.BILDE" :key="index">
                    <img class="image" v-if="index===0" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                  </div>
                </td>
                <td>
                  <div v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 123">
                    {{items.VERDI}}
                  </div>
                  <div v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 160">
                    {{items.VERDI}}
                  </div>
                </td>
                <td>
                  <div v-for="(items, index) in car.INFO" :key="index" v-if="items.ID == 129">
                    {{items.VERDI}}
                  </div>
                </td>
                <td>
                  <div>
                    {{car.SALG.BELOP}} Kr
                  </div>
                </td>

                <td>
                  <div>
                    <datetime format="MM/DD/YYYY H:i:s" width="300px" v-model="timer[index]"></datetime>
                  </div>
                </td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</template>

<script>
import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
import datetime from 'vuejs-datetimepicker';
// import Tables from './views/Tables'
Vue.use(VueAxios, axios);
export default {
  data() {
    return {
      car_ads: [],
      auction_ads: [],
      auction_post_ads: [],
      timer: [],
    }
  },
  components: {
    // Tables
    datetime
  },
  async created() {
      let uri = "/api/admin/auction"
      await this.axios.get(uri)
      .then(res => {
        this.car_ads = res.data.car_ads;
        // let items = JSON.parse(this.car_ads[0].BILDE)
        var foo = []
        for (var car of this.car_ads) {
            if(car.STATUS === 'Til salgs') {
               foo.push(car)
            }
        }    
        this.auction_ads = foo

        for(var car of this.auction_ads)
        {
          car.BILDE = JSON.parse(car.BILDE)
          car.INFO = JSON.parse(car.INFO)
          car.KONTAKT = JSON.parse(car.KONTAKT)
          car.SALG = JSON.parse(car.SALG)
          car.UTSTYR = JSON.parse(car.UTSTYR)
        }
      })
      .catch(error => console.log("Error: "+error)) 
    },
    methods: {
      checkedAds(e, car, index) {
        if(typeof this.timer[index] === 'undefined') {
          alert('please set the timer')
          e.preventDefault();
        } else {
          console.log(this.timer)
          car.checked = !car.checked
          if(car.checked){
            car.timer = this.timer[index]
            this.auction_post_ads.push(car)
            console.log(this.auction_post_ads)
          } else {
            for(let item of this.auction_post_ads) 
            {
              if(item.ID === car.ID)
              {
                this.auction_post_ads.splice(this.auction_post_ads.indexOf(item), 1)
              }
            }
          }
        }
      },
      save() {
        if(this.auction_post_ads.length == 0 ) {
          alert("Please select!")
        } else {
          console.log(this.auction_post_ads)
          axios.post('/api/admin/create/auction', {
            body: this.auction_post_ads
          }).then(res => {
            if(res.data.status === 'success') {
              alert("Success!")
              this.$router.push('/dashboard')
            }
          })
        }
      },
      remove() {
        this.$router.push('/auction/remove')
      }
    }
};
</script>

<style scoped>
  .image {
    width: 236px;
    max-height: 242px;
  }
  .mobile {
    margin-left: auto;
    margin-bottom: 10px;
  }
  @media screen and (max-width: 768px) {
        .mobile {
          margin-left: 0;
          margin-bottom: 10px;
        }
    }
</style>
