<template>
    <div>
        <img :src="machineimage" width="100%" height="400px" class="mb-2">

        <div class="row mb-5">
            <div id="machine-attrs" class="mx-auto">
                <label v-for="item in machine['attributes']" :key="item.id" class="machine-attr py-2 px-3 ml-3">
                    <label class="d-block m-0">{{item.title}}</label>
                    <strong dir="ltr">{{item.value}}</strong>
                </label>
            </div>

        </div>


        <div class="row text-box-machine my-2" v-for="item in contents" :key="item.id">

            <div v-if="item.article_type_id == 1" class="machine-title row mx-4 my-4 px-3 py-2">
                <h4 class="m-0"><strong>
                    {{item.text}}
                </strong></h4>
            </div>
            <div class="px-3 machine-text" v-if="item.article_type_id == 2" v-html="item.text">

            </div>

        </div>

        <div v-if="galleryflag">
            <div class="row machine-gallery mx-4 my-4 px-3 py-2">
                <h4 class="m-0"><strong>
                    {{$lang.gallery}}
                </strong></h4>
            </div>
            <div class="row px-3 gallery-image">
                <img class="image mx-2" v-for="(image, i) in images" width="100px" :src="image" @click="onClick(i)">
                <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>
            </div>
        </div>
        <div v-if="catalogflag" class="machine-catalog pt-5 my-5">

            <a class="btn btn-info px-5 py-2" :href="pdffile">
                {{$lang.catalog}}
            </a>
        </div>

        <div v-if="videoflag" id="70451723624" class="my-5 col-12 col-lg-8 mx-auto">
            <script type="text/JavaScript" :src="videosource">
            </script>
        </div>
    </div>
</template>

<script>

    import VueGallerySlideshow from 'vue-gallery-slideshow';


    export default {
        name: "MachineComponent",
        props:['machine', 'gallery', 'pdf', 'locale'],
        data(){
            return{
                contents: [],
                images: [],
                index: null,
                galleryflag: false,
                catalogflag: false,
                pdffile: null,
                videosource: null,
                videoflag: false,
                machineimage: null,
            }
        },
        components: {
            VueGallerySlideshow
        },
        methods: {
            onClick(i) {
                this.index = i;
            },
        },
        mounted() {
            this.$setLang(this.locale['lang']);

            this.machineimage = '/media/article/'+ this.machine['id'] + '_original.png';

            this.contents = this.machine['contents'];
            if (this.pdf.length != 0){
                this.catalogflag = true;
                this.pdffile = '/media/pdfs/' + this.pdf[0]['name'];
            }

            if(this.machine['articlevideo'] != null){
                this.videoflag = true;
                this.videosource = 'https://www.aparat.com/embed/'+ this.machine['articlevideo'] +'?data[rnddiv]=70451723624&data[responsive]=yes';
            }

            if (this.gallery.length > 0){
                this.galleryflag = true;
            }
            for (var i=0 ; i<this.gallery.length ; i++){
                var path = '/media/gallery/'+ this.gallery[i]['article_id'] + '/gallery_' + this.gallery[i]['image'] + '.png';
                this.images.push(path);
            }
        }
    }
</script>

<style scoped>
    p > img{
        text-align: left !important;
    }

</style>
