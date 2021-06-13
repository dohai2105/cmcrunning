<template>
    <tr>
        <td>
            <i class="ic ic-no1" v-if="user.rank == '01'"></i>
            <i class="ic ic-no2" v-else-if="user.rank == '02'"></i>
            <i class="ic ic-no3" v-else-if="user.rank == '03'"></i>
            <template v-else>{{ user.rank }} </template>
        </td>
        <td><div class="if-mb">
            <a :href="user.idLink" target="_blank"><img alt="" :src="user.imgUrl"></a>
            <a :href="user.idLink" target="_blank"> {{ user.name }} </a>
        </div>
        </td>
        <td>{{user.selfDistance}}</td>
        <td>{{user.contestDistance}}</td>
        <td class="respon">{{user.team}}</td>
        <td>{{user.finishPercent}}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object
            }
        },
    }
</script>

<style lang="scss" scoped>
    .if-mb img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 32px;
        flex: 0 0 32px;
        max-width: 32px;
        border-radius: 50%;
        margin-right: 18px;
    }
    .ic-no1 {
        width: 36px;
        height: 32px;
        background-image: url(https://84race.com/public/images/no1.png);
    }
    .ic-no2 {
        width: 36px;
        height: 32px;
        background-image: url(https://84race.com/public/images/no2.png);
    }
    .ic-no3 {
        width: 36px;
        height: 32px;
        background-image: url(https://84race.com/public/images/no3.png);
    }
    .ic {
        display: inline-block;
        vertical-align: middle;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }
</style>