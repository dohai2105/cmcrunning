<template>
    <tr>
        <td class="text-center">{{ team.rank }}</td>
        <td><div class="if-mb"><a href="#" :data-id="team.teamId" @click="showDetail(team.teamId)">{{ team.teamName }}</a></div></td>
        <td>{{team.memNums}}
        </td>
        <td align="right">{{ team.sumDistance }}</td>
        <td align="right">{{ team.averageDistance }}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            team: {
                type: Object
            }
        },
        methods: {
            // This line below
            showDetail(teamId) {
                this.$emit('showDetail', teamId)
            }
        }
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