<template>

    <div>
        <h4 class="admin-title py-3 px-4"> لیست گروه منوها </h4>

        <input type="button" @click="addgroup" class="btn btn-success my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن گروه جدید">
        <input type="button" @click="reloadPage" class="btn btn-dark my-2 mr-1" value="بازخوانی">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="10%">#</th>
                <th scope="col" width="20%">نام گروه</th>
                <th scope="col" width="20%">زبان</th>
                <th scope="col" width="20%">زیرمنو</th>
                <th scope="col" class="p-0" width="30%">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in this.grouplist" :key="item.id">
                <th class="py-2" scope="row">{{item.id}}</th>
                <td class="py-2">{{item.name}}</td>
                <td class="py-2">{{item.lang['title']}}</td>
                <td class="py-2">
                    <a :href="'submenu/'+item.id">
                    زیرمنو
                    </a>
                </td>
                <td class="py-1 icons">
                    <i title="ویرایش" class="far fa-edit fa-2x m-1" @click="editgroup(item.id, item.name, item.lang)"
                       data-toggle="modal" data-target="#Modal"></i>
                    <i title="حذف" @click="daletemenu(item.id)" class="fas fa-trash fa-2x m-1"></i>
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
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش گروه'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن گروه جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>

                        <form>
                            <div class="form-group mb-1">
                                <input type="text" v-model="group" class="form-control" name="title"
                                       placeholder="نام گروه">
                            </div>
                            <div class="form-group mb-1">
                                <div>
                                    <v-select v-model="langselect" :options="langs" label="title"
                                              :clearable="false"
                                              placeholder="یکی از زبان ها را انتخاب کنید" class="mb-2"></v-select>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="savegroup" class="btn btn-primary">ذخیره</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>

    export default {
        name: "MenuComponent",
        data() {
            return {
                grouplist: [],
                error: [],
                editflag: false,
                groupid: null,
                group: null,
                langs: [],
                langselect: {
                    'id': null,
                    'title': null,
                    'lang': null,
                },
            }
        },
        methods: {

            daletemenu(id){
                let that = this;
                let data= {
                    id: id,
                };
                axios.post('/dashboard/deletegroupmenu', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },

            reloadPage() {
                let that = this;
                axios.post('/dashboard/getmenugroup')
                    .then(function (response) {
                        that.grouplist = response.data[0];
                        that.langs = response.data[1];
                    });
            },

            editgroup(id, name, lang) {
                this.error = [];
                this.editflag = true;
                this.groupid = id;
                this.group = name;
                this.langselect = lang;
            },

            addgroup() {
                this.error = [];
                this.editflag = false;
                this.groupid = null;
                this.group = null;
                this.langselect = {
                    'id': null,
                    'title': null,
                    'lang': null,
                };
            },

            savegroup() {

                let that = this;
                if(this.langselect['id'] != null) {
                    let data = {
                        editflag: this.editflag,
                        groupid: this.groupid,
                        name: this.group,
                        langselect: this.langselect,
                    };
                    axios.post('/dashboard/savegroupmenu', data)
                        .then(function (response) {
                            $('#Modal').modal('hide');
                            that.reloadPage();
                        }).catch((error) => {
                        that.error = error.response.data.errors;
                    });
                }
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
