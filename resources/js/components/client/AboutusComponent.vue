<template>
    <div class="about-us" v-html="about_us">



    </div>
</template>

<script>
    export default {
        name: "AboutusComponent",
        props: ['aboutus', 'locale'],
        data(){
            return{
                about_us: null,
            }
        },
        mounted() {
            this.about_us = this.aboutus['aboutus_all'];
            this.$setLang(this.locale['lang']);

            // console.log(this.aboutus);
        }
    }
</script>

<style scoped>

</style>
