<template>
    <div class="user-dashboard">
       <div class="user-dashboard">
        <div class="list-user-comp">
            <h4>List User</h4>
            <ListUser @userSelected="childrenSelectUser"></ListUser>
        </div>
        <hr>
        <div class="user-detail-comp">
            <h4>User Detail</h4>
            <UserDetail :userDetailInfo="userSelectedFromChild"></UserDetail>
        </div>
<vueper-slides class="no-shadow" arrows-outside bullets-outside transition-speed="250">
  <vueper-slide
    v-for="i in 6"
    :key="i"
    :title="i.toString()"
    :style="'background-color: ' + ['#ff5252', '#42b983'][i % 2]" />
</vueper-slides>
    </div>
    </div>
</template>

<script>
    import { VueperSlides, VueperSlide } from 'vueperslides'
    import 'vueperslides/dist/vueperslides.css'
    import ListUser from './ListUser.vue'
    import UserDetail from './UserDetail.vue'
    export default {
        components: {
            ListUser,
            UserDetail,
            VueperSlides,
            VueperSlide
        },
        data() {
            return {
                userSelectedFromChild: {}
            }
        },
        methods: {
            childrenSelectUser(user) {
                console.log(user);
                this.userSelectedFromChild = user;
            },
            onClose (e) {
                // prevent close and wait
                e.wait = true
                // close after 3 seconds
                setTimeout(() => {
                    // assign true to close, do nothing or assign false to cancel close.
                    e.close = true
                }, 3000)
            }
        }
        
    }
</script>

<style lang="scss" scoped>
 
</style>