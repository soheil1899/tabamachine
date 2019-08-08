<template>
    <div id="contactus" class="col-12 col-lg-7 col-md-10 mt-5 mx-auto border-right border-left text-c">

        <div class="row mb-2 px-3">
            <div class="col-3">
                <strong>
                    <i class="fas fa-phone mx-2"></i>

                    {{$lang.telephone}}
                    :</strong>
            </div>
            <div class="col-9">
                {{setting['tellphone']}}
            </div>
        </div>
        <div class="row mb-2 px-3">
            <div class="col-3">
                <strong>
                    <i class="fas fa-mobile-alt mx-2"></i>
                    {{$lang.mobile}}
                    :</strong>
            </div>
            <div class="col-9">
                {{setting['mobile']}}
            </div>
        </div>
        <div class="row mb-2 px-3">
            <div class="col-3">
                <strong>
                    <i class="far fa-envelope mx-2"></i>

                    {{$lang.email}}
                    :</strong>
            </div>
            <div class="col-9">
                {{setting['email']}}
            </div>
        </div>
        <div class="row mb-5 pb-5 px-3">
            <div class="col-3">
                <strong>
                    <i class="fas fa-map-marked-alt mx-2"></i>

                    {{$lang.address}}
                    :</strong>
            </div>
            <div class="col-9">
                {{setting['address']}}
            </div>
        </div>




        <error :error="error"></error>

        <div class="row mb-2">
            <div class="col-6">
                <input type="text" v-model="name" class="form-control" :placeholder="$lang.name">
            </div>
            <div class="col-6">
                <input type="text" v-model="family"  class="form-control" :placeholder="$lang.family">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-6">
                <input type="text" v-model="email" class="form-control" :placeholder="$lang.email">
            </div>
            <div class="col-6">
                <input type="text" v-model="mobile" class="form-control" :placeholder="$lang.mobile">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <input type="text" v-model="address" class="form-control" :placeholder="$lang.address">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <textarea class="form-control" v-model="message" rows="10" :placeholder="$lang.yourmessage"></textarea>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <input type="button" class="btn btn-outline-success px-4 float-left mt-3" @click="savemessage" :value="$lang.send">
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "ContactusComponent",
        data() {
            return {
                name: null,
                family: null,
                email: null,
                mobile: null,
                address: null,
                message: null,
                error: [],
            }
        },
        props:['setting', 'locale'],
        methods:{
            savemessage(){
                let that = this;
                this.error = [];

                let data = {
                    name: this.name,
                    family: this.family,
                    email: this.email,
                    mobile: this.mobile,
                    address: this.address,
                    message: this.message
                };

                axios.post('/savemessage', data)
                    .then(function (response) {

                    }).catch((error) => {
                    that.error = error.response.data.errors;
                });
            },
        },
        mounted() {
            this.$setLang(this.locale['lang']);
        }
    }
</script>

<style scoped>

</style>
