<template>
<div>
    <div class="row contact-image" style="margin: 0;">
        <img src="images/contactus.jpg" alt="" class="image_bg"/>
    </div>
    <div class="contact-form-div">
        <div class="container bg">
            <div class="row">
                <div class="col-md-8 col-lg-5 contactus_title">
                    <h1 style="text-transform: uppercase;">
                        {{$t('contact_us')}}
                    </h1>
                </div>
            </div>
            <form>
                <div class="row mobile-form" style="padding-left: 40px; padding-right: 40px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="InputFirstName">{{$t('first_name')}}*</label>
                            <input type="text" class="form-control" id="InputFirstName" aria-describedby="" v-bind:placeholder="$t('Enter your first name')">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">{{$t('email')}}*</label>
                            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="email@domain.com">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="InputLastName">{{$t('last_name')}}*</label>
                            <input type="text" class="form-control" id="InputLastName" aria-describedby="" v-bind:placeholder="$t('Enter your last name')">
                        </div>
                        <div class="form-group">
                            <label for="InputPhoneNumber">{{$t('phone')}}</label>
                            <input type="number" class="form-control" id="InputPhoneNumber" aria-describedby="" v-bind:placeholder="$t('Phone Number')">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="InputFormControlTextarea">{{$t('comment')}}</label>
                            <textarea class="form-control" id="InputFormControlTextarea" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mobile-check" style="padding: 40px;">
                    <div class="col-md-8">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{$t('Subscribe and Get latest updates and offers by Email')}}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary submit_btn" style="background: #58ba3a; border: #58ba3a;">{{$t('submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container google-map-div">
        <GmapMap
            :center="{lat:59.962553, lng:11.048484}"
            :zoom="18"
            map-type-id="roadmap"
            style="height: 500px"
        >
            <GmapMarker
                :key="index"
                v-for="(m, index) in markers"
                :position="m.position"
                :clickable="true"
                :draggable="true"
                @click="center=m.position"
            />
        </GmapMap>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            markers: [],
        }
    },
    methods: {
        addMarker() {
            const marker = {
                lat: 59.962553,
                lng: 11.048484
            }
            this.marker.push({ position: marker})
            this.center = marker;
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
    .bg {
      -webkit-box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.6);
      -moz-box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.6);
      box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.6);
      background: white;
    }
    .contactus_title {
        padding: 50px;
    }
    input {
        background: #eceff3;
    }
    textarea {
        background: #eceff3;
    }
    .contact-form-div {
        top: 250px; 
        z-index: 1; 
        position: absolute; 
        max-width: 100%; 
        width: 100%;
    }
    .google-map-div {
        margin-top: 300px; 
        padding: 0; 
        padding-bottom: 100px;
    }
    /* Mobile Version Responsive */
    @media (min-width:214px) and (max-width:320px){
        .contactus_title h1 {
            font-size: 25px !important;
        }
        .mobile-form {
            padding: 0 !important;
        }
        .mobile-check {
            padding: 0 !important;
        }
    }

    @media screen and (max-width: 767px) { 
        .contact-form-div {
            max-width: 100%;
        }
        .bg {
            width: 90%;
        }
        .contactus_title h1 {
            font-size: 30px;    
        }
        .google-map-div {
            margin-top: 700px; 
            padding: 0; 
            padding-bottom: 100px;
        }
        .form-check {
            font-size: 13px;
        }
        .submit_btn {
            margin-top: 20px;
        }
        .contact-image {
            padding-top: 100px;
        }
    }
</style>