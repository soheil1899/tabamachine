<template>
    <div class="row" id="dashboard">
        <div class="container">
            <div class="row mt-5 mx-0">
                <div class="col-3 box-item py-4 dashboard-first">
                    <a :href="'/dashboard/setting'">
                        <i class="fas fa-users fa-3x mb-2"></i>
                        تنظیمات
                    </a>
                </div>

                <div class="col-3 box-item dashboard-second py-4">
                    <a :href="'/dashboard/slider'">
                        <i class="fas fa-camera fa-3x mb-2"></i>
                        اسلایدر
                    </a>
                </div>

                <div class="col-3 box-item dashboard-first py-4">
                    <a :href="'/dashboard/article'">
                        <i class="far fa-keyboard fa-3x mb-2"></i>
                        مطالب
                    </a>
                </div>
                <div class="col-3 box-item dashboard-second py-4">
                    <a :href="'/dashboard/tag'">
                        <i class="far fa-keyboard fa-3x mb-2"></i>
                        تگ
                    </a>
                </div>


            </div>



        </div>



    </div>
</template>

<script>
    export default {
        name: "DashboardComponent",

        props: ['useraccess', 'writeraccess'],

        data() {
            return {
                userflag: false,
                writeflag: false,
            }
        },

        methods: {},

        mounted() {
        }
    }
</script>

<style scoped>


</style>
