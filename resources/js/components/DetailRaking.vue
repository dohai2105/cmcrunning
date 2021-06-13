<template>
    <!--Modal: modalYT-->
    <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body mb-0 p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hạng</th>
                                <th class="respon">BIB</th>
                                <th>Tên thành viên</th>
                                <th class="respon">Giới tính</th>
                                <th class="text-right">Tổng km</th>
                            </tr>
                        </thead>
                        <tbody>
                            <detail-ranking-item v-for="(user) in userList" :user="user" :key="user.id"></detail-ranking-item>
                        </tbody>
                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center flex-column flex-md-row">
                    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            teamId: {
                type: String
            }
        },
        data() {
            return {
                userList: []
            }
        },
        // created() {
        //    this.getDetailRankList()
        // },
        methods: {
            getDetailRankList() {
                axios.get('/detailRanking/' + this.teamId)
                .then(response => {
                    this.userList = response.data
                    $('#modalYT').modal('show');
                    this.$emit('finishGetData')
                })
                .catch(error => {
                    this.errors = error.response.data.errors.name
                })
            }
        },
        watch: {
            teamId : function() {
                this.getDetailRankList();
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