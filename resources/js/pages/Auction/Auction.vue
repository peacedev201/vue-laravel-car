<template>
    <div>
        <div class="row cars-auction-mobile-header" style="margin: 0;">
            <img src="images/13.jpg" alt="" class="image_bg" />
            <div class="container mobile-header-title" style="position: absolute; padding: 0;">
                <h1 style="color: white; text-transform: uppercase;">{{$t('auction')}}</h1>
            </div>
        </div>
        <div class="container mobile" style="padding-bottom: 100px;">
            <div class="row" style="margin: 0;">
                <div class="col-md-12 col-lg-4" style="padding: 0;">
                    <AuctionCarMenu 
                        @clicked="onClickChild"
                        @clickedTransmission="onClickTransmission"
                        @clickedKilometer="onClickKilometer"
                        @clickedYear="onClickYear"
                        @clickedPrice="onClickPrice"
                    />
                </div>  
                <div class="col-md-12 col-lg-8" style="padding: 0;">
                    <AuctionCarList 
                        :auctionFilterOption="auctionFilterOption" 
                        :auctionTransmissionOption="auctionTransmissionOption"
                        :auctionKilometerOption="auctionKilometerOption"
                        :auctionYearOption="auctionYearOption"
                        :auctionPriceOption="auctionPriceOption"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import AuctionCarMenu from './AuctionCarMenu'
import AuctionCarList from './AuctionCarList'

export default {
    data() {
        return {
            auctionFilterOption: '',
            auctionTransmissionOption: '',
            auctionKilometerOption: '',
            auctionYearOption: '',
            auctionPriceOption: ''
        }
    },
    components: {
        AuctionCarList,
        AuctionCarMenu
    },
    methods: {
        onClickChild(value) {
            this.auctionFilterOption = value
        },
        onClickTransmission(value) {
            this.auctionTransmissionOption = value
        },
        onClickKilometer(value) {
            this.auctionKilometerOption = value
        },
        onClickYear(value) {
            this.auctionYearOption = value
        },
        onClickPrice(value) {
            this.auctionPriceOption = value
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
        .cars-auction-mobile-header {
            padding-top: 100px;
            justify-content: center;
        }
        .mobile {
            padding-right: 15px;
            padding-left: 15px;
        }
        .mobile-header-title {
            top: 200px;
        }
    }

    /* Desktop Version Mobile responsive */
    @media screen and (min-width: 768px){
        .mobile-header-title {
            top: 200px !important;
        }        
        .cars-auction-mobile-header {
            justify-content: center;
        }
    }
    @media screen and (min-width: 1200px){
        .col-lg-4 {
            max-width: 29.333333%;
        }
    }

</style>