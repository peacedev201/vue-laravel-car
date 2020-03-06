<template>
    <div class="animated fadeIn">
    <!-- <Tables /> -->
      <div class="row">
        <div class="btn-group mobile" role="group">
          <button @click="remove()" type="button" class="btn btn-success">AuctionRemove</button>
          <button @click="back()" type="button" class="btn btn-success" style="margin-left: 10px;">Back</button>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Car Image</th>
                <th scope="col">Brand</th>
                <th scope="col">Year</th>
                <th scope="col">Asking price</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(car, index) in cars" :key="index">
                <td>
                  <div class="custom-control custom-checkbox">
                    <input @click="checkedAds(car, index)" type="checkbox" class="custom-control-input" :id="index" v-model="car.checked"/>
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
Vue.use(VueAxios, axios);

export default {
    data() {
      return {
          cars: [],
          auction_post_ads: []
      }
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
        }
        console.log(this.cars)
      })
      .catch(error => console.log("Error: "+error)) 
    },
    methods: {
      checkedAds(car, index) {
        car.checked = !car.checked
        if(car.checked){
          this.auction_post_ads.push(car)
        } else {
          for(let item of this.auction_post_ads) 
          {
            if(item.ID === car.ID)
            {
              this.auction_post_ads.splice(this.auction_post_ads.indexOf(item), 1)
            }
          }
        }
      },
      remove() {
         this.axios.post('/api/admin/remove/auction', {body: this.auction_post_ads})
            .then(res => {
                if(res.data.status === 'success') {
                    this.cars = res.data.auction_ads
                    for(var car of this.cars)
                    {
                        car.BILDE = JSON.parse(car.BILDE)
                        car.INFO = JSON.parse(car.INFO)
                        car.KONTAKT = JSON.parse(car.KONTAKT)
                        car.SALG = JSON.parse(car.SALG)
                        car.UTSTYR = JSON.parse(car.UTSTYR)
                    }
                } else {
                    alert("ERROR!")
                }
            })
      },
      back() {
          this.$router.push('/auction')
      }
    }
}

</script>

<style scoped>
  .image {
    width: 200px;
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