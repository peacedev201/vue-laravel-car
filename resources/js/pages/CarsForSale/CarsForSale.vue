<template>
    <div>
        <div class="row cars-for-sale-mobile-header" style="margin: 0;">
            <img src="images/11.jpg" alt="" class="image_bg"/>
            <div class="container mobile-header-title" style="position: absolute; padding: 0;">
                <h1 class="bg_txt" style="color: white; text-transform: uppercase;">{{$t('cars_for_sale')}}</h1>
            </div>
        </div>
        <div class="container mobile" style="padding-bottom: 100px;">
            <div class="row" style="margin: 0;">
                <div class="col-md-12 col-lg-4" style="padding: 0;">
                    <CarMenu 
                        @clicked="onClickChild"
                        @clickedTransmission="onClickTransmission"
                        @clickedKilometer="onClickKilometer"
                        @clickedYear="onClickYear"
                        @clickedPrice="onClickPrice"
                    />
                </div>  
                <div class="col-md-12 col-lg-8" style="padding: 0;">
                    <CarList 
                        :filterOption="filterOption" 
                        :transmissionOption="transmissionOption"
                        :kilometerOption="kilometerOption"
                        :yearOption="yearOption"
                        :priceOption="priceOption"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import CarMenu from './CarMenu'
import CarList from './CarList'
export default {
    data() {
        return {
            filterOption: '',
            transmissionOption: '',
            kilometerOption: '',
            yearOption: '',
            priceOption: ''
        }
    },
    components: {
        CarList,
        CarMenu
    }, 
    methods: {
        onClickChild(value) {
            this.filterOption = value
        },
        onClickTransmission(value) {
            this.transmissionOption = value
        },
        onClickKilometer(value) {
            this.kilometerOption = value
        },
        onClickYear(value) {
            this.yearOption = value
        },
        onClickPrice(value) {
            this.priceOption = value
        }
    }
}

</script>

<style scoped>
    .image_bg {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .mobile {
        padding: 0;
    }
    
    @media screen and (max-width: 767px) {
        .cars-for-sale-mobile-header {
            padding-top: 100px;
            justify-content: center;
        }
        .mobile-header-title {
            top: 200px;
        }
        .mobile-header-title h1 {
            font-size: 36px;
        }
        .mobile {
            padding-right: 15px;
            padding-left: 15px;
        }
    }
    @media screen and (min-width: 768px) {
        .mobile-header-title {
            top: 200px !important;
        }
        .cars-for-sale-mobile-header {
            justify-content: center;
        }
    }

    @media screen and (min-width: 1200px){
        .col-lg-4 {
            max-width: 29.333333%;
        }
    }
    
</style>