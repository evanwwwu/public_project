<style lang="sass" src="style.sass"></style>

<template lang="pug">

#app.app
    Loading
    transition(@leave="scrollleave")
        ScrollPage(v-if="firstshow" key="first")    
    transition(@enter="scrollenter")
        .container(v-if="!firstshow" key="index")
            Homepage(:class="{'pageOpen':this.isPage}")
            transition(@enter="pageEnter" @leave="pageLeave" :css="false")
                router-view
</template>

<script>
import { mapGetters, mapActions , mapMutations } from 'vuex';
import ScrollPage from './ScrollPage';
import Loading from './Loading';
import Navigation from "./Navigation";
import Homepage from "./Index";
export default {
    data() {
        return {
            detail:false
        }
    },
    methods:{
        ...mapMutations(['setback']),
        scrollenter(el, done) {
            var main = this;
            TweenLite.fromTo(el, 2, {
                y:window.innerHeight
            },{
                y: "0%",
                ease: Elastic.easeOut.config(1, 0.7),
                onComplete: function(){
                    done();
                    main.setback(true);
                }
            });
        },
        scrollleave(el,done){
            TweenLite.to(el, 2, {
                top: "-100%",
                ease: Elastic.easeOut.config(1, 0.7),
                onComplete: done
            });
        },
        pageEnter(el,done){
            var index = this.$el.querySelector('.index-page');
            var t1 = new TimelineLite({
                onComplete:done
            });
            t1.add([
                TweenLite.fromTo(el,1,{
                    css:{paddingTop:"100vh",opacity:0},
                },{
                    css:{paddingTop:"40vh",opacity:1},
                    ease: Elastic.easeOut.config(1, 1),
                }),
                TweenLite.to(index,1,{
                    height:"40vh",
                    ease: Elastic.easeOut.config(1, 1)
                })
            ]);
        },
        pageLeave(el,done) {
            var index = this.$el.querySelector('.index-page');
            var t1 = new TimelineLite({
                onComplete:done
            });
            t1.add([
                TweenLite.fromTo(el,1,{
                    css:{paddingTop:"40vh",opacity:1},
                },{
                    css:{paddingTop:"100vh",opacity:0},
                    ease: Elastic.easeOut.config(1, 1),
                }),
                TweenLite.to(index,1,{
                    height:"100vh",
                    ease: Elastic.easeOut.config(1, 1)
                })
            ]);
        }
    },
    mounted(){
    },
    watch: {
    },
    computed:{
        ...mapGetters([
            'firstshow','isPage','scrollback'
        ])
    },
    components:{
        Loading,
        ScrollPage,
        Homepage
    }
}
</script>

