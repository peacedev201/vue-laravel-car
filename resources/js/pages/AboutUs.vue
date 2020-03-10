<template>
    <div>
        <div class="row about-image-mobile" style="margin: 0; position: relative;">
            <img src="images/6.jpg" alt="" class="image_bg"/>
            <div class="container" style="position: absolute; top: 40%; padding: 0;">
                <h1 class="about-text-mobile" style="color: white; text-transform: uppercase;">{{$t('about_us')}}</h1>
            </div>
        </div>

        <!-- <div class="row title">
            <h1 style="color: white; font-size: 40px;"></h1>&nbsp;&nbsp;
            <h1 style="color: green; font-size: 40px; font-weight: 900;"></h1>
        </div> -->
        <!-- <div class="row" style="margin: 0; position: relative;">
                <Media 
                    :kind="'video'"
                    :isMuted="(false)"
                    :src="['images/1.mp4']"
                    :autoplay="true"
                    :controls="true"
                    :loop="true"
                    :ref="'fish'"
                    :style="{width: '100%', height: '400px', background: 'black'}"
                    @pause="handle()"
                    >
                </Media>
        </div>
        <div class="row title">
            <h1 style="color: black; font-size: 40px;">WELCOME TO</h1>&nbsp;&nbsp;
            <h1 style="color: green; font-size: 40px; font-weight: 900;">iAUTO AS</h1>
        </div> -->

        <div class="container" style="margin-top: 40px; position: relative; border-top: 1px solid #ddd;">
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-6">
                    <img src="images/9.jpg" alt="" class="image1"/>
                </div>
                <div class="col-md-6">
                    <div style="display: flex;">
                        <h1 class="text1" style="color: black; font-size: 26px;">{{$t('welcome_to')}}</h1>&nbsp;&nbsp;
                        <h1 class="text1" style="color: #58ba3a; font-size: 26px; font-weight: 900;">iAUTO AS</h1>
                    </div>
                    <h6 style="margin-top: 20px;">
                        {{$t('txt_1')}}    
                    </h6>

                    <h6 style="margin-top: 20px; font-weight: 100;">
                        {{$t('txt_2')}}
                    </h6>

                    <p style="margin-top: 20px;"><span style="color: #888888;"><em>&nbsp;— {{$t('MIKEY DIOKLES, President of Motors')}}</em></span></p>
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <div class="col-md-6">
                    <div style="display: flex;">
                        <h1 style="color: black; font-size: 26px;">{{$t('CORE VALUES')}}</h1>
                    </div>

                    <h6 style="margin-top: 20px; font-weight: 100;">
                        {{$t('txt_3')}}                        
                    </h6>

                    <ul class="list-style-1">
                        <li>{{$t('sub_txt_1')}}</li>
                        <li>{{$t('sub_txt_2')}}</li>
                        <li>{{$t('sub_txt_3')}}</li>
                        <li>{{$t('sub_txt_4')}}</li>
                        <li>{{$t('sub_txt_5')}}</li>
                    </ul>

                </div>
                <div class="col-md-6">
                    <img src="images/10.jpg" alt="" class="image2"/>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0; position: relative; padding-top: 100px; padding-bottom: 100px;">
                <Media 
                    :kind="'video'"
                    :isMuted="(false)"
                    :src="['images/1.mp4']"
                    :autoplay="false"
                    :controls="true"
                    :loop="false"
                    :ref="'fish'"
                    :style="{width: '100%', height: '400px', background: 'black'}"
                    @pause="handle()"
                    >
                </Media>
        </div>
    </div>
</template>

<script>

import Media from '@dongido/vue-viaudio'

export default {
    components: {
        Media
    },
    data() {
        return {

        }
    },
    methods: {
        handle() {
            // setTimeout( () => {
            //     this.$refs.fish.play() 
            // }, 2000)
        }
    }    
}

</script>

<style scoped>
    .image_bg {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
    .image1 {
        width: inherit;
    }
    .image2 {
        width: inherit;
    }
    .title {
        margin: 0px;
        position: relative;
        justify-content: center;
        padding-top: 20px;
        /* background: black; */
    }
    ul.list-style-1 {
        padding: 0;
        list-style: none;
    }

    ul.list-style-1 li {
        position: relative;
        padding-left: 27px;
        margin-bottom: 10px;
    }

    .about-image-mobile {
        justify-content: center;
    }

    ul.list-style-1 li:before {
        position: absolute;
        /* content: ''; */
        display: block;
        font: normal normal normal 14px/1 FontAwesome;
        /* font-size: inherit; */
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        transform: translate(0,0);
        left: 0;
        top: 5px;
        content: "\f00c";
        font-size: 11px;
        color: #cc6119;
    }
    /* Mobile Version Responsive */
    @media (min-width:214px) and (max-width:320px){
        .text1 {
            font-size: 20px !important;
        }
    }
    @media screen and (max-width: 767px) { 
        .image1 {
            width: 100% !important
        }
        .image2 {
            width: 100% !important
        }
        .about-image-mobile {
            padding-top: 100px;
            justify-content: center;
        }
        .about-text-mobile {
            padding-top: 100px;
        }
    }
    /* Desktop Version responsive */
    @media (min-width:769px) and (max-width:1024px){
    
    }
</style>