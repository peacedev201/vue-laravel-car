<template>
  <!-- <div class="container-fluid" style="padding: 0px; background: black; height: 250px;"> -->
    <div>
    <div class="row" style=" padding-top: 30px; background: black; margin: 0px;">
      <div class="col-md-3 subscribe" style="text-align: center;">
          <h6 style="color: white;">{{$t('subscribe')}}</h6>
          <div class="input-group mb-3" style="width: 70%; margin-left: auto; margin-right: auto;">
            <input type="email" class="form-control" placeholder="..." aria-label="" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" style="background: #58ba3a;">
                    <i style="color: white;" class="fas fa-rss"></i>
                </button>
            </div>
          </div>
      </div>
      <div class="col-md-3" style="text-align: left;">
          <h6 style="color: white;">{{$t('sales_hours')}}</h6>
          <ul style="padding: 0px; color: grey; list-style-type: none;">
            <li>{{$t('Monday')}} - {{$t('Friday')}}: 10:00AM - 18:00PM</li>
            <li>{{$t('Saturday')}}: 10:00AM - 16:00PM</li>
            <li>{{$t('Sunday')}}: {{$t('Closed')}}</li>
          </ul>
      </div>
      <div class="col-md-3" style="text-align: left;">
          <h6 style="color: white;">{{$t('service_hours')}}</h6>
          <ul style="padding: 0px; color: grey; list-style-type: none;">
            <li>{{$t('Monday')}} - {{$t('Friday')}}: 10:00AM - 18:00PM</li>
            <li>{{$t('Saturday')}}: 10:00AM - 16:00PM</li>
            <li>{{$t('Sunday')}}: {{$t('Closed')}}</li>
          </ul>
      </div>
      <div class="col-md-3" style="text-align: left;">
          <h6 style="color: white;">{{$t('parts_hours')}}</h6>
          <ul style="padding: 0px; color: grey; list-style-type: none;">
            <li>{{$t('Monday')}} - {{$t('Friday')}}: 10:00AM - 18:00PM</li>
            <li>{{$t('Saturday')}}: 10:00AM - 16:00PM</li>
            <li>{{$t('Sunday')}}: {{$t('Closed')}}</li>
          </ul>
      </div>
    </div>
    <div class="row" style="padding-top: 10px; background: black; margin: 0px; justify-content: center;">
      <ul style="list-style-type: none; display: flex;">
        <li style="padding-left: 10px; padding-right: 10px;"><a href="#"><i style="color: #58ba3a;" class="fab fa-facebook-f"></i></a></li>
        <li style="padding-left: 10px; padding-right: 10px;"><a href="#"><i style="color: #58ba3a;" class="fab fa-twitter"></i></a></li>
        <li style="padding-left: 10px; padding-right: 10px;"><a href="#"><i style="color: #58ba3a;" class="fab fa-instagram"></i></a></li>
      </ul>
    </div>
    <div class="row footer-copy-txt">
        <h6 style="color: grey;">@ 2019 | {{$t('txt_footer')}}</h6>
    </div>

    </div>
  <!-- </div> -->
</template>

<script>
export default {
  
};
</script>

<style scoped>
  .footer-copy-txt {
    padding-top: 10px; 
    background: black; 
    margin: 0px; 
    justify-content: center;
  }
  @media screen and (max-width: 768px) { 
    .subscribe {
      text-align: left !important;
    }
    .subscribe .input-group {
      margin: 0 !important;
      padding-bottom: 15px !important;
    }
    .footer-copy-txt {
      padding-right: 15px;
      padding-left: 15px;
    }
  }
</style>
