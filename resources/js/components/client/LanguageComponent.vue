<template>
    <div>

        <img @click="changelang('en')" v-if="locale['lang'] != 'en'" title="English" src="/media/cite/english.png" width="24px" height="24px" class="mr-2 pointer">
<!--        <img @click="changelang('ar')" v-if="locale['lang'] != 'ar'" title="العربیه" src="/media/cite/arabi.png" width="24px" height="24px" class="mr-2 pointer">-->
        <img @click="changelang('fa')" v-if="locale['lang'] != 'fa'" title="فارسی" src="/media/cite/farsi.png" width="24px" height="24px" class="mr-2 pointer">

    </div>
</template>

<script>
    export default {
        name: "LanguageComponent",
        props:['locale'],
        methods:{
            changelang(lang){
                console.log(lang);
                let data={
                    location: window.location.href,
                    language: lang,
                };
                axios.post('/'+this.locale['lang'] +'/changelanguage', data)
                    .then(function (response) {
                        window.location = response.data;
                });
            }
        },
        mounted() {
            this.$setLang(this.locale['lang']);
        }
    }
</script>

<style scoped>

</style>
