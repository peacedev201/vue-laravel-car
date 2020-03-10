<template>
  <div>
    <div>
      <div class="row service-header" style="margin: 0;">
        <img src="images/service-center1.jpg" alt class="image_bg" />
        <div class="container service-header-title" style="padding: 0;">
          <h1 style="color: white; text-transform: uppercase;">{{$t('service_center')}}</h1>
        </div>
      </div>

      <div class="container">
        <div class="row service-main">
          <div class="col-md-12 col-lg-8">
            <div style="display: flex;">
              <h1 style="color: black; font-size: 22px;">{{$t('FINANCE GUARANTEE INSURANCE')}} & {{$t('COMMISSION')}}</h1>
            </div>

            <h6 class="service-main-txt">
              {{$t('service_main_txt')}}
              
            </h6>
          </div>
          <div class="col-md-12 col-lg-4">
            <img class="service2-image" src="images/service-2.jpg" alt />
          </div>
        </div>

        <div class="row service-main">
          <div class="col-md-12 col-lg-8">
            <h5 class="serv7ice-main-txt">
              {{$t('serv7ice_main_txt')}}
            </h5>
          </div>
          <div class="col-md-12 col-lg-4">
            <img class="service1-image" src="images/service-1.jpg" alt />
          </div>
        </div>
      </div>
    </div>

    <div class="row parallax-container" style="margin: 0;">
      <div class="container parallax-row" style="position: absolute;">
        <div class="row">
          <div class="col-md-4">
            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon"
              >
                <i class="stm-icon-oil-add"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">OIL CHANGES</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>

            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon1"                
              >
                <i class="stm-icon-brake"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">BRAKE SERVICE</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon2"
              >
                <i class="stm-icon-air_conditioning"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">AIR CONDITIONING</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>

            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon3"                
              >
                <i class="stm-icon-transmission"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">TRANSMISSION</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon4"
              >
                <i class="stm-icon-auto_electric"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">AUTO ELECTRIC</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>

            <div
              class="icon-box"
              style="color:#ffffff"
            >
              <div
                class="icon5"                
              >
                <i class="stm-icon-Tire_Wheel"></i>
              </div>
              
              <div class="icon-text">
                <h4 class="title heading-font" style="color:#ffffff">TIRE & WHEEL SERVICE</h4>
                <p><span class="txt">
                    Lorem ipsum dolor sit amet, adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.&nbsp;
                </span></p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <parallax :speed-factor="0.3" breakpoint="(min-width: 80px)" style="width:100%;">
        <img class="parallax-image" src="images/services.jpg" alt />
      </parallax>
    </div>

    <div class="container" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-bottom: 100px; margin-top:100px;">
        <h2 style="text-align: center; padding: 20px; color: rgb(88, 186, 58);">Our Partners</h2>
        <slick
        ref="slick"
        :options="slickOptions"
        >
            <div class="slider_div">
                <img src="images/dnb.jpg" class="slider_img" alt/>
            </div>
            <div class="slider_div">
                <img src="images/gjensidige.jpg" class="slider_img" alt/>
            </div>
            <div class="slider_div">
                <img src="images/if.jpg" class="slider_img" alt/>
            </div>
            <div class="slider_div">
                <img src="images/autoconcept.jpg" class="slider_img" alt/>
            </div>
            <div class="slider_div">
                <img src="images/asnorsk.jpg" class="slider_img" alt/>
            </div>
        </slick>
    </div>

    <div class="row" style="margin: 0px; background: #fab637;">
        <div class="container">
            <div class="row" style="width: 100%; justify-content: space-between; color: white; padding: 30px 0px;">
                <div class="txt1" style="display: flex; align-items: center;">
                    <i style="font-size: 40px;" class="stm-icon-question icon-logo1"></i>&nbsp;&nbsp;
                    <h2 class="icon-txt1">           
                        Have a Questions? Call Today!
                    </h2>
                </div>
                <div class="txt2" style="display: flex; align-items: center;">
                    <i style="font-size: 40px;" class="stm-icon-phone2 icon-logo2"></i>&nbsp;&nbsp;
                    <h2  class="icon-txt2">
                        +47 40097041
                    </h2>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Parallax from "vue-parallaxy";
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.scss';

export default {
  components: {
    Parallax,
    Slick
  },
  data() {
      return {
          slickOptions: {
            arrows: false,
            slidesToShow: 3,
            dots: false,
            infinite: true,
            autoplaySpeed: 3000,
            autoplay: true,
            swipeToSlide: true,
            speed:1500,
            variableWidth: true,
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
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
		    },
      }
  }
};
</script>
<style scoped>
.image_bg {
  width: 100%;
  height: 300px;
  object-fit: cover;
}
.service-header {
  position: relative;
  justify-content: center;
}
.service-header-title {
  position: absolute;
  top: 35%;
  z-index: 2;
}
.service-header::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0) 0%,
    rgba(0, 0, 0, 1) 100%
  );
  z-index: 1;
}
.service-main {
  margin-top: 50px;
  border-top: 1px solid #ddd;
  padding-bottom: 50px;
  padding-top: 50px;
}
.service-main-txt {
  margin-top: 20px;
  font-weight: 100;
  line-height: 1.5;
}
.parallax-container {
  position: relative;
  justify-content: center;
  align-items: center;
  /* height: 500px; */
}
.icon-box {
    position: relative;
    padding: 46px 0px 0px 34px;
    z-index: 10;
    display: flex;
    align-items: flex-start;
}
.icon {
    font-size: 20px;
    color: #ffffff;
    background-color: #f2b930;
    padding: 10px 5px;
    margin-right: 20px;
}

.icon-txt {
    font-weight: 700;
    width: 100%;
}
.title.heading-font {
    font-size: 16px;
    margin-bottom: 11px;
    line-height: 1.2;
}
.txt {
    font-size: 13px;
    color: #aaaaaa;
}
.txt:hover {
    color: white;
}
.icon1 {
    background: #ef2929; 
    font-size: 36px;
    padding: 0px 10px;
    margin-right: 20px;
}
.icon2 {
    background: #6c98e1; 
    font-size: 36px;
    padding: 0px 13px;
    margin-right: 20px;
}
.icon3 {
    background: #44a8b4; 
    font-size: 36px;
    padding: 0px 10px;
    margin-right: 20px;
}
.icon4 {
    background: #d93ad0; 
    font-size: 37px;
    padding: 0px 13px;
    margin-right: 20px;
}
.icon5 {
    background: #17c655; 
    font-size: 34px;
    padding: 2px 8px;
    margin-right: 20px;
}
.parallax-image {
  object-fit: cover !important;
}
.slider_img {
    max-height: 100px;
}
.slider_div {
    padding: 12px;  
}
@media screen and (min-width: 768px){
    .Masthead {
        min-height: 0px;
    }
}
/* Mobile Version Responsive */
@media (min-width:214px) and (max-width:320px){
  .service-header-title h1 {
    padding: 0 !important;
  }
}
@media screen and (max-width: 767px) {
  .parallax-row {
    position: relative !important;
  }
  .heading-font{
    color: black !important;
  }
  .txt1 {
    font-size: 25px !important;
  }
  .txt2 {
    font-size: 25px !important;
  }
  .icon-txt1 {
    font-size: 20px !important;
  }
  .icon-txt2 {
    font-size: 25px !important;
  }
  .icon-logo1 {
    font-size: 25px !important;
  }
  .icon-logo2 {
    font-size: 25px !important;
  }
  .service-header {
    padding-top: 100px;
  }
  .service-header-title h1 {
    padding-top: 100px;
    padding-left: 15px;
  }
  .service-main {
    margin: 0;
  }
  .service1-image {
    width: 100%; 
  }
  .service2-image {
    width: 100%;
  }
}
@media screen and (min-width: 768px) {
  .col-md-4 {
    padding: 0;
  }
}
</style>