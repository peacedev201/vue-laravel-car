<template>
    <div class="car-menu">
        <form>
            <div class="sidebar">
                <div class="sidebar-header">
                    <i class="stm-icon-car_search"></i>&nbsp;&nbsp;
                    <span class="h4">{{$t('search_options')}}</span>
                </div>
                <div class="menu-list">
                    <div class="row">
                        <!-- <div class="col-md-12 col-md-6 select-item">
                            <v-select 
                                :options="[
                                    {value: 1, text: 'Condition'}, 
                                    {value: 2, text: 'New'}, 
                                ]" 
                                v-model="selectedValueCondition" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                            />
                        </div> -->

                        <div class="col-md-12 col-md-6 select-item" id="Brand">
                            <v-select 
                                :options="[
                                    {value: 1, text: 'Alfa Romeo'}, 
                                    {value: 2, text: 'Audi'}, 
                                    {value: 3, text: 'BMW'}, 
                                    {value: 4, text: 'Chevrolet'},
                                    {value: 5, text: 'Chrysler'}, 
                                    {value: 6, text: 'Citroen'}, 
                                    {value: 7, text: 'Ford'}, 
                                    {value: 8, text: 'Honda'}, 
                                    {value: 9, text: 'Hummer'}, 
                                    {value: 10, text: 'Hyundai'}, 
                                    {value: 11, text: 'Jeep'},
                                    {value: 12, text: 'Kia'}, 
                                    {value: 13, text: 'Lexus'}, 
                                    {value: 14, text: 'Mazda'}, 
                                    {value: 15, text: 'Mercedes-Benz'}, 
                                    {value: 16, text: 'Mitsubishi'}, 
                                    {value: 17, text: 'Nissan'}, 
                                    {value: 18, text: 'Opel'},
                                    {value: 19, text: 'Peugeot'},
                                    {value: 20, text: 'Renault'},
                                    {value: 21, text: 'Saab'},
                                    {value: 22, text: 'Skoda'},
                                    {value: 23, text: 'Subaru'},
                                    {value: 24, text: 'Suzuki'},
                                    {value: 25, text: 'Tesla'}, 
                                    {value: 26, text: 'Toyota'},
                                    {value: 27, text: 'Volkswagen'},
                                    {value: 28, text: 'Volvo'},
                                ]" 
                                v-model="selectedValueBrand" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                                @input="changedBrandLabel"
                            />
                        </div>

                        <!-- <div class="col-md-12 col-md-6 select-item">
                            <v-select 
                                :options="[
                                    {value: 1, text: 'Body'}, 
                                    {value: 2, text: 'Compact'}, 
                                    {value: 3, text: 'Convertible'}, 
                                    {value: 4, text: 'Coupe'}, 
                                    {value: 5, text: 'Off-Road'}, 
                                    {value: 6, text: 'Sedan'}, 
                                    {value: 7, text: 'Station Wagon'}
                                ]" 
                                v-model="selectedValueBody" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                            />
                        </div> -->

                        <!-- <div class="col-md-12 col-md-6 select-item" id="Model">
                            <v-select 
                                :options="[
                                    {value: 1, text: 'Model'}, 
                                    {value: 2, text: '3-serie'}, 
                                    {value: 3, text: '370Z'}, 
                                    {value: 4, text: '5-serie'}, 
                                    {value: 5, text: 'Accord'}, 
                                    {value: 6, text: 'Altima'}, 
                                    {value: 7, text: 'Avalon'},
                                    {value: 8, text: 'C-Class'},
                                    {value: 9, text: 'Camry'},
                                    {value: 10, text: 'Civic'},
                                    {value: 11, text: 'CR-V'}, 
                                    {value: 12, text: 'CX-5'}, 
                                    {value: 13, text: 'Elantra'}, 
                                    {value: 14, text: 'Explorer'}, 
                                    {value: 15, text: 'Focus'}, 
                                    {value: 16, text: 'Genesis'}, 
                                    {value: 17, text: 'Malibu'},
                                    {value: 18, text: 'Model X'},
                                    {value: 19, text: 'Mustang'},
                                    {value: 20, text: 'Optima'},
                                    {value: 21, text: 'Pilot'}, 
                                    {value: 22, text: 'RAV4'}, 
                                    {value: 23, text: 'RDX'}, 
                                    {value: 24, text: 'Rio'}, 
                                    {value: 25, text: 'Sorento'}, 
                                    {value: 26, text: 'Soul'}, 
                                    {value: 27, text: 'Tacoma'},
                                    {value: 28, text: 'Tucson'},
                                    {value: 29, text: 'Veloster'},
                                    {value: 30, text: 'Versa'},
                                ]" 
                                v-model="selectedValueModel" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                            />
                        </div> -->

                        <div class="col-md-12 col-md-6 select-item">
                            <v-select 
                                :options="[
                                    {value: 1, text: '< 10000'}, 
                                    {value: 2, text: '10000-50000'}, 
                                    {value: 3, text: '50000-100000'}, 
                                    {value: 4, text: '100000-150000'}, 
                                    {value: 5, text: '150000-200000'}, 
                                    {value: 6, text: '> 200000'},
                                ]" 
                                v-model="selectedValueKilometer" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                                @input="changedKilometer"
                            />
                        </div>

                        <div class="col-md-12 col-md-6 select-item">
                            <v-select 
                                :options="[
                                    {value: 1, text: '< 2000'}, 
                                    {value: 2, text: '2000-2005'}, 
                                    {value: 3, text: '2005-2010'}, 
                                    {value: 4, text: '2010-2015'}, 
                                    {value: 5, text: '2015-2020'}, 
                                    {value: 6, text: '2020 >'},
                                ]" 
                                v-model="selectedValueYear" 
                                :searchable="true"
                                labelSearchPlaceholder=""
                                @input="changedYear"
                            />
                        </div>

                        <div class="col-md-12 col-md-6 select-item">
                            <v-select 
                                :options="[
                                    {value: 1, text: $t('Automatic')}, 
                                    {value: 2, text: $t('Manually')},
                                ]" 
                                v-model="selectedValueTransmission" 
                                :searchable="false"
                                @input="changedTransmission"
                            />
                        </div>

                        <div class="col-md-12 col-md-6 select-item">
                            <div>
                                <label class='labeltext'>{{$t('Award')}}</label>
                                <ejs-slider id='range' @change="changedPrice(rangevalue)" v-model="rangevalue" type="Range" min="5000" max="900000" step="1"></ejs-slider>
                                <div style="display: flex;">
                                    <b-form-input id="input-none" style="margin-right: 5px; width: 50%;" :state="null" v-bind:value="rangevalue[0]" v-bind:placeholder="$t('No Validation')"></b-form-input>
                                    <b-form-input id="input-none" style="width: 50%;" :state="null" v-bind:value="rangevalue[1]" v-bind:placeholder="$t('No Validation')"></b-form-input>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-12 col-md-6 select-item">
                            <label class='labeltext'>Additional features</label>
                            <b-form-select v-model="selected" :options="options"></b-form-select>
                        </div> -->

                        <!-- <div class="col-md-12 col-md-6 select-item">
                            <b-form-input placeholder="Enter a location"></b-form-input>
                        </div> -->

                        <!-- <div class="col-md-12 col-md-6 select-item">
                            <div>
                                <label for="range-2">Search radius</label>
                                <ejs-slider id='default' v-model="value" min="0" max="100" step="1"></ejs-slider>
                                <b-form-input id="input-none" :state="null" v-bind:value="value" placeholder="No validation"></b-form-input>
                            </div>
                        </div> -->

                        <div class="col-md-12 col-md-6 select-item">
                            <b-button @click="reset" variant="success" style="width: 100%; background: #58ba3a;">{{$t('reset_all')}}</b-button>
                        </div>
                    </div>


                </div>
            </div>
        </form>

        <!-- <div class="sidebar1"> -->
        <!-- <div role="tablist" style="padding-top: 50px;">
            <b-card no-body class="mb-1">
                <b-card-header header-tag="header" class="p-1" role="tab">
                    <div id="btn_collapse">
                        <b-button block href="#" v-b-toggle.accordion-1 variant="light">Exterior Color</b-button>
                    </div>
                </b-card-header>
                <b-collapse id="accordion-1" accordion="my-accordion" role="tabpanel">
                    <b-card-body>
                        <b-card-text>
                            <ul class="list-style-1">
                                <li>Deep Blue Pearl(4)</li>
                                <li>Midnight Silver Metallic(2)</li>
                                <li>Obsidian Black Metallic(2)</li>
                                <li>Pearl White(5)</li>
                                <li>Red Multi-Coat(7)</li>
                                <li>Silver Metallic(2)</li>
                            </ul>
                        </b-card-text>
                    </b-card-body>
                </b-collapse>
            </b-card>
        </div> -->

        <!-- <div role="tablist" style="padding-top: 50px;">
            <b-card no-body class="mb-1">
                <b-card-header header-tag="header" class="p-1" role="tab">
                    <div id="btn_collapse">
                        <b-button block href="#" v-b-toggle.accordion-2 variant="light">Interior Color</b-button>
                    </div>
                </b-card-header>
                <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                    <b-card-body>
                        <b-card-text>
                            <div>
                                <ul class="list-style-1">
                                    <li>Beige(5)</li>
                                    <li>Brown(2)</li>
                                    <li>Grey(5)</li>
                                    <li>Jet Black(12)</li>
                                    <li>Jet Red(4)</li>
                                    <li>Multi-pattern(4)</li>
                                </ul>
                            </div>
                        </b-card-text>
                    </b-card-body>
                </b-collapse>
            </b-card>
        </div>  -->

    </div>
</template>

<script>
import Vue from "vue";
import { SliderPlugin } from '@syncfusion/ej2-vue-inputs'
import VSelect from '@alfsnd/vue-bootstrap-select'
import { BFormSelect, BButton, BCollapse, VBToggle } from 'bootstrap-vue'
Vue.component('b-collapse', BCollapse)
Vue.component('b-form-select', BFormSelect)
Vue.component('b-button', BButton)
Vue.directive('b-toggle', VBToggle)
Vue.use(SliderPlugin);

export default {
  components: {
    VSelect
  },
  data() {
    return {
      selectedValueBrand: "Merke",    
      selectedValueKilometer: "Kilometer",
      selectedValueYear: "Årsmodell",
      selectedValueTransmission: "Girkasse",    
      rangevalue: [5000,900000],
    };
  },
//    mounted() {
//     this.$root.$on('bv::collapse::state', (collapseId, isJustShown) => {
//       console.log('collapseId:', collapseId)
//       console.log('isJustShown:', isJustShown)
//     })
//   }
    methods: {
        changedBrandLabel(event) {
            this.$emit('clicked', event.text)
        },
        changedKilometer(event) {
            this.$emit('clickedKilometer', event.value)
        },
        changedYear(event) {
            this.$emit('clickedYear', event.value)
        },
        changedTransmission(event) {
            this.$emit('clickedTransmission', event.text)
        },
        changedPrice(value) {
            this.$emit('clickedPrice', value)
        },
        reset() {
            this.selectedValueBrand="Merke"
            this.selectedValueKilometer="Kilometer"
            this.selectedValueYear="Årsmodell"
            this.selectedValueTransmission="Girkasse"
            this.rangevalue = [5000, 900000]
        }
    },
}
</script>

<style>
    .v-select-toggle {
        line-height: 2 !important;
    }
    .car-menu {
        margin-left: 0;
        margin-right: 30px;
        margin-top: -60px;
    }
    .sidebar {
        padding: 0 22px 30px;
        background-color: #fff;
        box-shadow: 0 5px 18px rgba(0,0,0,.18);
    }

    .sidebar1 {
        margin-top: 30px;
        padding: 0px;
        background-color: #fff;
        box-shadow: 0 5px 18px rgba(0,0,0,.18);
    }
    .sidebar-header {
        position: relative;
        min-height: 40px;
        padding: 20px;
        margin: 0 -22px;
        background-color: #232628;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 29px;
    }
    .car-menu .sidebar-header .h4 {
        color: #fff;
        font-weight: 700;
        letter-spacing: -.3px;
    }
    .menu-list {
        padding-top: 24px;
    }
    .select-item {
        padding-bottom: 20px;
    }
    .default .content-wrapper {
        width: 40%;
        margin: 0 auto;
        min-width: 185px;
    }

    .e-bigger .content-wrapper {
        width: 80%;
    }

    .sliderwrap label {
        font-size: 13px;
        font-weight: 500;
    }
    .e-control-wrapper.e-slider-container .e-slider .e-handle {
        background-color: #22b24b;
        border-color: #22b24b;
    }

    .e-control-wrapper.e-slider-container .e-slider .e-range {
        background-color: #58ba3a;
    }
    #Model ul {
        height: 280px;
        overflow-y: auto;
    }
    #Brand ul {
        height: 280px;
        overflow-y: auto;
    }

    ul.list-style-1 {
        padding: 0;
        list-style: none;
        padding-left: 20px;
    }

    ul.list-style-1 li {
        position: relative;
        padding-left: 27px;
        margin-bottom: 10px;
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
    #btn_collapse {
        background-color: #fff;
        /* box-shadow: 0 5px 18px rgba(0,0,0,.18); */
        border-top: 2px solid #58ba3a;
    }

     @media screen and (max-width: 768px) {
        .car-menu {
            margin-left: 0;
            margin-right: 0;
        }
        .sidebar-header .h4 {
            font-size: 22px;
        }
        .container {
            padding: 0 !important;
        }
    }
    
</style>>
