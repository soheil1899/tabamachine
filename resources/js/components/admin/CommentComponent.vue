<template>

    <div>
        <h4 class="admin-title py-3 px-4"> لیست پیام ها </h4>

        <input type="button" @click="reloadPage" class="btn btn-dark my-2 mr-1" value="بازخوانی">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="20%">نام و نام خانوادگی</th>
                <th scope="col" width="10%">موبایل</th>
                <th scope="col" width="20%">ایمیل</th>
                <th scope="col" width="40%">آدرس</th>
                <th scope="col" class="p-0" width="5%">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in this.commentlist" :key="item.id">
                <td class="py-2">{{item.id}}</td>
                <th class="py-2" scope="row">{{item.name +' '+ item.family}}</th>
                <td class="py-2">{{item.mobile}}</td>
                <td class="py-2">{{item.email}}</td>
                <td class="py-2">{{item.address}}</td>
                <td class="py-1 icons">
                    <i title="متن پیام" class="far fa-edit fa-2x m-1" style="color: #00B2C9;" @click="showmessage(item.message)"  data-toggle="modal" data-target="#Modal"></i>
                </td>
            </tr>
            </tbody>
        </table>




        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-text="'متن پیام'"></h5>
                    </div>

                    <div class="modal-body">
                        <p>{{text}}</p>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>

    export default {
        name: "CommentComponent",
        data() {
            return {
                commentlist: [],
                text: null,
            }
        },
        methods: {

            showmessage(message){
                  this.text = message;
            },

            reloadPage() {
                let that = this;
                axios.post('/dashboard/getcomment')
                    .then(function (response) {
                        that.commentlist = response.data;
                    });
            },




        }
        ,

        mounted() {
            this.reloadPage();
        }


    }


</script>

<style scoped>


</style>