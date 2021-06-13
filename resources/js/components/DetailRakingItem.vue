<template>
    <tr>
        <td>{{ user.rank }}</td>
        <td class="respon"><strong>{{ user.id }}</strong></td>
        <td><div class="if-mb">
            <a :href="'https://84race.com/member/' + user.id" target="_blank"><img :src="user.imgUrl" alt=""></a>
            <a :href="'https://84race.com/member/' + user.id" target="_blank">{{ user.name }} </a>
        </div>
        </td>
        <td class="respon">{{ user.sex }}</td>
        <td class="right">{{ user.runDistance }}</td>
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
</style>