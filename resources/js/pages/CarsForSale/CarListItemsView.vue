<template>
    <div>
         <div v-for="(car, idx) in cars.slice(9*(currentPage-1), 9*(currentPage))" :key="idx" class="row list">
             <div class="col-md-5 list-car-mobile-image" style="padding: 0px;">
                <div v-if="!car.BILDE">
                    <div v-if="car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">                            
                        <!-- <router-link :to="{ name: 'CarListItem', params: {id: car.ID._text}}"> -->
                            <!-- <img class="car_image" src="/images/empty.jpg" alt /> -->
                            <img class="car_image" :width="50" v-lazy="src" ::data-srcset="src+'?size=50 50w'" alt />
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
                            <!-- <img class="car_image" v-lazy="car.BILDE.URL" alt /> -->
                            <div v-if="index === 'URL' && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                                <img class="car_image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                                <div class="stm-badge-directory heading-font stm-badge-dealer">
                                        {{$t('Sold')}}
                                </div>
                            </div>
                            <div v-else-if="index === 'URL'">
                                <img class="car_image" :width="50" v-lazy="car.BILDE.URL" :data-srcset="car.BILDE.URL+'?size=50 50w'" alt />                            
                            </div>
                            <!-- </router-link> -->
                        </div>
                    </div>
                    <div v-else>
                        <div v-if="index===0 && car.STATUS === 'Til salgs (Solgt)'" style="position: relative; overflow: hidden;">
                            <router-link :to="{ name: 'CarListItem', params: {id: car.ID} }">
                                <!-- <img class="car_image" v-lazy="items.URL" alt /> -->
                                <img class="car_image" data-sizes="auto" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                                <div class="stm-badge-directory heading-font stm-badge-dealer">
                                    {{$t('Sold')}}
                                </div>
                            </router-link>
                        </div>
                        <div v-else-if="index===0">
                            <router-link :to="{ name: 'CarListItem', params: {id: car.ID} }">
                                <!-- <img class="car_image" v-lazy="items.URL" alt /> -->
                                <img class="car_image" data-sizes="auto" :width="50" v-lazy="items.URL" :data-srcset="items.URL+'?size=50 50w'" alt />
                            </router-link>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-7" style="padding: 0px;">
                 <div class="row list-car-price-mobile">
                    <div class="col-md-5">
                        <div class="price">
                            <div v-if="car.SALG.BELOP" class="normal-price">{{formatPrice(car.SALG.BELOP)}}Kr</div>
                            <div v-else class="normal-price">0 Kr</div>
                        </div>
                    </div>
                    <div class="col-md-7 list-car-name-mobile">
                        <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 123">{{itemsInfo.VERDI}}
                            <span v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 160">{{itemsInfo.VERDI}}</span>
                        </span>
                    </div>
                 </div>

                 <div class="row meta-info">
                    <div class="col-md-2 info1">
                        <div style="display: flex;">
                            <div class="icon"><i class="stm-icon-road"></i></div>
                            <div class="name">{{$t('Kilometer')}}</div>
                        </div>
                        <div>
                            <div v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 156" class="value">
                                {{formatPrice(itemsInfo.VERDI)}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2 info1">
                        <div style="display: flex;">
                            <div class="icon"><i class="stm-icon-fuel"></i></div>
                            <div class="name">{{$t('Fuel')}}</div>
                        </div>
                        <div>
                            <div v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 111" class="value">
                                {{itemsInfo.VERDI}}               
                            </div>            
                        </div>
                    </div>

                    <div class="col-md-2 info1">
                        <div style="display: flex;">
                            <div class="icon"><i class="stm-icon-date"></i></div>&nbsp;
                            <div class="name">{{$t('Year')}}</div>
                        </div>
                        <div>
                            <div v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 129" class="value">
                                {{itemsInfo.VERDI}}                          
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 info1">
                        <div style="display: flex;">
                            <div class="icon"><i class="stm-icon-transmission_fill"></i></div>
                            <div class="name">{{$t('Gearbox')}}</div>
                        </div>
                        <div> 
                            <div v-for="(itemsInfo, itemsIndex) in car.INFO" :key="itemsIndex" v-if="itemsInfo.ID == 118" class="value">
                                {{itemsInfo.VERDI}}      
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 info1">
                        <div style="display: flex;">
                            <div class="icon"><i class="stm-icon-drive_2"></i></div>
                            <div class="name">{{$t('Wheel Drive')}}</div>
                        </div>
                        <div>
                            <div v-for="(itemsInfo, itemsIndex) in car.INFO" v-if="itemsInfo.ID == 159" :key="itemsIndex" class="value">
                                {{itemsInfo.VERDI}}                      
                            </div>
                        </div>
                    </div>
                 </div>

                <div class="row info">
                    <ul class="list-unstyled">
                        <li>
                            <div class="stock-num heading-font"><span>stock# </span>{{car.ID}}</div>
                        </li>
                        <li>
                            <!-- <a href="#" class="car-action-unit add-to-compare stm-added " style="display: none;" data-id="1238" data-action="remove">
                                <i class="stm-icon-added stm-unhover"></i>
                                <span class="stm-unhover">in compare list</span>
                                <div class="stm-show-on-hover">
                                    <i class="stm-icon-remove"></i>
                                    Remove from list					</div>
                            </a> -->
                            <!-- <a href="#" class="car-action-unit add-to-compare " data-id="1238" data-action="add">
                                <i class="stm-icon-add"></i>
                                Add to compare				
                            </a> -->
                        </li>
                        <li>
						    <!-- <img class="certified-logo-1" src="images/autocheck.png" alt="Logo 1"> -->
						</li>

                        <li>
						    <!-- <img class="certified-logo-1" src="images/carfax1owner.png" alt="Logo 2"> -->
						</li>
                    </ul>
                </div>
             </div>
         </div>
         <div class="row list" style="justify-content: center;">
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
            perPage: 9,
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
    .list {
        border-bottom: 1px solid #ddd;
        padding-top: 20px; 
        padding-bottom: 20px;
    }
    .car_image {
        width: 248px;
        max-height: 186px;
    }
    .list-car-price-mobile {
        direction: rtl;
    }
    .price {
        position: relative;
        float: right;
        padding: 6px 10px 4px 4px;
        margin-left: 40px;
        background-color:#58ba3a;
        text-align: right;    
        color: #fff;
        font-size: 14px;
        min-width: 130px;
    }
    .price::before {
        position: absolute;
        content: '';
        display: block;
        top: 0;
        left: -11px;
        height: 100%;
        width: 32px;
        background-color: #58ba3a;
        transform: skew(-14deg,0deg);
        z-index: 1;
    }
    .normal-price {
        color: #fff;
        font-size: 18px;
        direction: ltr;
        font-weight: 700;
    }
    .meta-info {
        padding-top: 30px;  
    }
    .info1 {
        padding:0; 
        margin-left: 10px;
        border-right: 1px solid #ddd;
        font-size: 11px;
    }
    .value {
        text-align: center;
    }
    .list-unstyled {
        list-style: none;
        padding-left: 0;
        display: flex;
    }

    .info {
        padding-top: 30px;
    }
    .stock-num {
        padding: 3px 15px;
        background-color: #f0f2f5;
        border-radius: 15px;
        font-size: 14px;
        color: #232628;
    }
    .car-action-unit .add-to-compare {
        padding-right: 10px;
        padding-left: 36px;
        min-width: 158px;
        white-space: nowrap;
    }
    .car-action-unit {
        position: relative;
        display: block;
        padding: 0 15px;
        padding-left: 20px;
        font-size: 11px;
        text-transform: uppercase;
        color: #888;
        border: 1px solid #ddd;
        line-height: 27px;
        border-radius: 15px;
        text-decoration: none !important;
    }
    .certified-logo-1 {
        width: 100px;
    }
    .stock-num.heading-font {
        font-size: 12px !important;
        padding: 5px 15px !important;
    }
    .list-car-name-mobile {
        /* display: flex; */
        overflow-wrap: break-word;
        direction: ltr;
        font-weight: 700;
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
        .car_image {
            width: 100%;
            max-width: none;
            max-height: unset !important;
        }
        .list {
            text-align: center;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0;
        }
        .list-car-price-mobile {
            margin-top: -36px;
        }
        .list-car-name-mobile {
            text-align: left;
            display: flex;
            direction: ltr;
            padding-left: 15px;
        }
        .meta-info {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 0 !important;
        }
        .info1 {
            border-bottom: 1px solid #ddd;
            display: flex;
            font-size: 14px;
            border-right: 0;
            padding: 10px 0;
            margin: 0;
        }
        .info .list-unstyled {
            display: block !important;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 0 !important;
            width: 100%;
        }
        .list-unstyled li {
            padding-bottom: 10px;
        }
    }
    /* Desktop Version Mobile responsive */
    @media screen and (min-width: 768px) and (max-width: 1199px) {
        .certified-logo-1 {
            width: 65px;
        }
        .col-md-5 {
            max-width: 40.666667% !important;
        }
    }    
</style>