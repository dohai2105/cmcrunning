<template>
    <div>
        <vueper-slides :touchable="false" fixed-height="700px">
            <vueper-slide
                v-for="i in 2"
                :key="i">

                <template v-slot:arrow-left>
                    <i class="icon icon-arrow-left" />
                </template>

                <template v-slot:arrow-right>
                    <i class="icon icon-arrow-right" />
                </template>

                <template v-slot:content>
                    <div class="container">
                        <div class="row" v-if="i == 1">
                            <h4>BXH Team</h4>
                            <team-ranking @showDetail="showDetail" @startGetData="startGetData" @finishGetData="finishGetData"></team-ranking>
                        </div>
                        <div class="row" v-if="i == 2">
                            <h4>Bảng xếp hạng cá nhân</h4>
                            <individual-ranking></individual-ranking>
                        </div>
                    </div>
                </template>
            </vueper-slide>
        </vueper-slides>
        <detail-ranking :teamId="teamId" @finishGetData="finishGetData"></detail-ranking>

        <spinner :showSpinnerProp="showSpinner"></spinner>

    </div>

    
</template>

<script>
    import { VueperSlides, VueperSlide } from 'vueperslides'
    import 'vueperslides/dist/vueperslides.css'
    export default {
        components: { VueperSlides, VueperSlide },
        data() {
            return {
                teamId: '',
                showSpinner: false
            }
        },
        methods: {
            showDetail(teamId) {
                this.teamId = teamId;
                this.startGetData();
            },
            finishGetData(){
                this.showSpinner = false;
            },
            startGetData(){
                this.showSpinner = true
            }
        }
    }
</script>

<style lang="scss">
    .vueperslides__arrow {
        color: blue;
    }
    .vueperslide--loading .vueperslide__content-wrapper {
        display: none !important;
    }
    .container {
        overflow-y: scroll; height:600px;
        margin-top: 40px;
    }
    .container thead th { position: sticky; top: 0; }
</style>