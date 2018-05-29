<style lang="sass" src="pages/index.sass" scoped>
</style>

<template lang="pug">
.index-page
    Navigation
    .page-main     
        .videoBG
            video#Svideo(:src="videourl" autoplay muted webkit-playsinline playsinline)
                source(:src="videourl")
                //- img(:src="imgurl")
        .main-slide(v-touch:right="pagepre" v-touch:left="pagenext")
            transition(@enter="sliderenter" @leave="sliderleave" :css="false")
                page(v-if="slided" :sIndex="SectionIndex")
            transition(@enter="sliderenter" @leave="sliderleave" :css="false")
                page(v-if="!slided" :sIndex="SectionIndex")
            .controls
                ul
                    li(v-for="(section, index) in sections" @click.prevent="setView(section,index)" :class="{ 'active': section.id == SectionIndex }")
                        .s-title
                            span.date {{section.date}}
                            span.name {{section.name}}
                        .circle
</template>

<script>
import { mapGetters, mapActions , mapMutations } from 'vuex';
import Navigation from './Navigation';
import page from './section/page';

export default{
    data(){
        return {
            slided:true,
            view:'page1',
            videourl:'http://img.lymma.net/thecomplex/hong.mp4',
            imgurl:'assets/images/hong.jpg',
            video:{},
            open:false,
            SectionIndex:0
        }
    },
    head: {
        meta: [
            { property: 'og:title', content: '讓我搭一班會爆炸的電車' },
            { property: 'og:image', content: 'assets/images/Seo_flowing.jpg' },
            { property: 'og:url', content: location.href }
        ],
    },
    computed:{
        ...mapGetters(['firstshow','sections','scrollback','isPage']),        
    },
    methods:{
        ...mapMutations(['setback']),
        sliderenter(el, done) {
            var mainCom = this;
            TweenLite.fromTo(el, 1, {
                x: "100%"
            }, 
            {
                x: "0%",
                ease: Elastic.easeOut.config(1, 1),
                onComplete: function(){
                    mainCom.setback(true);
                    done();
                }
            });
        },
        sliderleave(el, done) {
            var mainCom = this;
            TweenLite.to(el, 1, {
                x: "-100%",
                ease: Elastic.easeOut.config(1, 1),
                onStart: function(){
                    mainCom.setOpen(true);
                },
                onComplete: function(){
                    done();
                }
            });
        },
        setView(section,index) {
            this.slided = false;
            this.open = false;
            // this.view = section.page;
            this.videourl = section.video;
            this.imgurl = section.img;
            this.SectionIndex = index;
        },
        setOpen(val){
            this.open = val;
            this.slided = val;
        },
        pagenext(){
            if (this.SectionIndex < (this.sections.length - 1)) {
                this.setback(false);
                this.SectionIndex++;
                this.setView(this.sections[this.SectionIndex], this.SectionIndex);
            }
        },
        pagepre(){
            if (this.SectionIndex > 0) {
                this.setback(false);
                this.SectionIndex--;
                this.setView(this.sections[this.SectionIndex], this.SectionIndex);
            }
        },
        scrollevent(e){
            if(this.scrollback && !this.isPage){
                if(e.deltaY > 0) {
                    this.pagenext();
                }
                else{
                    this.pagepre();
                }
            }
        }
    },
    created() {
        ["scroll", "mousewheel", "DOMMouseScroll"].forEach(function (event) {
            window.addEventListener(event, this.scrollevent);
        }, this);
    },
    destroyed() {
        ["scroll", "mousewheel", "DOMMouseScroll"].forEach(function (event) {
            window.removeEventListener(event, this.scrollevent);
        }, this);
    },
    mounted(){
       this.video = document.getElementById("Svideo");
       var  svideo = this.video;
       this.video.onloadstart = function(){
           TweenLite.fromTo(svideo, 1, {
               autoAlpha: 0,
           },
           {
               autoAlpha: 1,
               ease: Expo.easeInOut,
               onComplete:function(){
               }
           });
           svideo.play();
       }
    },
    destroyed(){

    },
    watch: {
        open: function (oldV,newV) {
            var mainCom = this;
            if(!this.open){
                TweenLite.to(this.video , 1, {
                    autoAlpha: 0,
                    ease: Expo.easeInOut,
                });
            }
        }
    },
    components:{
        Navigation,
        page,
    }
}
</script>