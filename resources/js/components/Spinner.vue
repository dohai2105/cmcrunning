<template>
    <div class="spinner" v-if="showSpinnerCompute">
       <div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
        <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
        <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
        <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
    import data from "./data.json"
    export default {
        props: {
            showSpinnerProp: Boolean
        },
        data() {
            return {
                showSpinnerData
            }
        },
        computed: {
            showSpinnerCompute : function() {
                this.showSpinnerData = this.showSpinnerProp;
                return this.showSpinnerData
            }
        }
        
    }
</script>

<style lang="scss" scoped>
    .tbl-list-user {
        width: 100%;
    }
</style>