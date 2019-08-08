<template>

    <div>
        <h4 class="admin-title py-3 px-4"> لیست زیرمنوها </h4>

        <input type="button" @click="addmenu" class="btn btn-success my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن منو جدید">
        <input type="button" @click="reloadPage" class="btn btn-dark my-2 mr-1" value="بازخوانی">
        <input type="button" @click="goback" class="btn btn-secondary my-2 mr-1" v-if="parentid != 0" value="بازگشت">
        <a :href="'/dashboard/menu'" class="btn btn-secondary my-2 mr-1" v-else>بازگشت</a>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="10%">#</th>
                <th scope="col" width="20%">نام</th>
                <th scope="col" width="20%">آدرس</th>
                <th scope="col" width="20%">زیرمنو</th>
                <th scope="col" class="p-0" width="30%">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in this.menulist" :key="item.id">
                <th class="py-2" scope="row">{{item.id}}</th>
                <td class="py-2">{{item.name}}</td>
                <td class="py-2" dir="ltr">{{item.url}}</td>
                <td class="py-2 pointer" @click="gonext(item.id)">
                    زیرمنو
                </td>
                <td class="py-1 icons">
                    <i title="ویرایش" class="far fa-edit fa-2x m-1" @click="editmenu(item.id, item.name, item.icon, item.url)"
                       data-toggle="modal" data-target="#Modal"></i>
                    <i title="حذف" @click="deletesubmenu(item.id)" class="fas fa-trash fa-2x m-1"></i>
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
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش منو'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن منو جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>

                        <form>
                            <div class="form-group mb-1">
                                <input type="text" v-model="menu" class="form-control" name="title"
                                       placeholder="نام منو">
                            </div>
                            <div class="form-group mb-1">
                                <input type="text" v-model="icon" class="form-control" name="title"
                                       placeholder="آیکن منو">
                            </div>
                            <div class="form-group mb-1">
                                <input type="text" v-model="url" dir="ltr" class="form-control text-left" name="title"
                                       placeholder="URL Address">
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="savemenu" class="btn btn-primary">ذخیره</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>

    export default {
        name: "SubmenuComponent",
        data() {
            return {
                menulist: [],
                error: [],
                editflag: false,
                menuid: null,
                menu: null,
                url: null,
                icon: null,
                parentid: 0,
                backid: [],

            }
        },
        props:['groupid'],
        methods: {

            deletesubmenu(id){
                let that = this;
                let data= {
                    id: id,
                };
                axios.post('/dashboard/deletesubmenu', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },

            goback(){
                this.parentid = this.backid[this.backid.length-1];
                this.backid.pop();
                this.reloadPage();
            },
            gonext(id){
                this.backid.push(this.parentid);
                this.parentid = id;
                this.reloadPage();
            },

            reloadPage() {
                let that = this;
                let data= {
                    parentid: this.parentid,
                    groupid: this.groupid,
                };
                axios.post('/dashboard/getsubmenu', data)
                    .then(function (response) {
                        that.menulist = response.data;
                    });
            },

            editmenu(id, name, icon, url) {
                this.error = [];
                this.editflag = true;
                this.menuid = id;
                this.menu = name;
                this.icon = icon;
                this.url = url;
            },

            addmenu() {
                this.error = [];
                this.editflag = false;
                this.menuid = null;
                this.menu = null;
                this.url = null;
                this.icon = null;
            },

            savemenu() {

                let that = this;

                    let data = {
                        editflag: this.editflag,
                        menuid: this.menuid,
                        groupid: this.groupid,
                        parentid: this.parentid,
                        name: this.menu,
                        icon: this.icon,
                        url: this.url,
                    };
                    axios.post('/dashboard/savesubmenu', data)
                        .then(function (response) {
                            $('#Modal').modal('hide');
                            that.reloadPage();
                        }).catch((error) => {
                        that.error = error.response.data.errors;
                    });

            },

        }
        ,

        mounted() {
            this.reloadPage();
            // console.log(this.groupid);
        }


    }


</script>

<style scoped>


</style>
