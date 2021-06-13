<template>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hạng</th>
                <th class="respon">Tên thành viên</th>
                <th>Số km</th>
                <th class="respon">Hạng mục</th>
                <th class="text-right">Team</th>
                <th class="text-right">Hoàn thành</th>
            </tr>
        </thead>
        <tbody>
            <individual-ranking-item v-for="(user) in userList" :user="user" :key="user.id"></individual-ranking-item>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                userList: []
            }
        },
        created() {
           this.getIndividualRankingList()
        },
        methods: {
            getIndividualRankingList() {
                axios.get('/individualRaking')
                .then(response => {
                    this.userList = response.data
                })
                .catch(error => {
                    this.errors = error.response.data.errors.name
                })
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