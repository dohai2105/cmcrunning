<template>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hạng</th>
                <th class="respon">Team</th>
                <th>Thành viên</th>
                <th class="respon">Tổng</th>
                <th class="text-right">Km TB </th>
            </tr>
        </thead>
        <tbody>
            <team-rank-item v-for="(team) in teamList" :team="team" :key="team.teamId" @showDetail="showDetail"></team-rank-item>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                teamList: []
            }
        },
        created() {
           this.getTeamRankList()
        },
        methods: {
            getTeamRankList() {
                this.startGetData();
                axios.get('/teamRanking')
                .then(response => {
                    this.teamList = response.data
                    this.finishGetData();
                })
                .catch(error => {
                    this.errors = error.response.data.errors.name
                })
            },
            showDetail(teamId) {
                this.$emit('showDetail', teamId)
            },
            startGetData() {
                this.$emit('startGetData')
            },
            finishGetData() {
                this.$emit('finishGetData')
            }
        }
    }
</script>

<style lang="scss" scoped>
tr th {
    padding: 10px 20px;
    background-color: #eef3f4;
    font-size: 16px;
    font-family: "SFUFutura", sans-serif;
    font-weight: 400;
    border: none;
}
</style>