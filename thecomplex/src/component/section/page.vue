<style lang='sass' src="pages/section.sass" scoped>
</style>

<template lang="pug">
section.content
  transition(name="fade")
    .silde-main(v-show="!isPage")
      .starts
        .line
        .line
        .line
        .line
        .line
      .info
        .num 0{{(sIndex+1)}}
        h2 {{title}}
        p.txt
          | {{info}}
        router-link.link(:to="{path : url}" tag="div" :class="{ 'over': !isOpen }")
          p {{ isOpen ? "展開內容" : "敬請期待" }}
          span
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default{
    data(){
        return {}
    },
    props:['sIndex'],
    created(){
    },
    computed:{
      ...mapGetters(['isPage','sections']),
      title() {
        return this.sections[this.sIndex].data.title;
      },
      info() {
        return this.sections[this.sIndex].data.info;
      },
      url() {
        return this.sections[this.sIndex].data.url;
      },
      isOpen() {
        return this.sections[this.sIndex].data.isOpen;
      }
    },
    methods:{},
    mounted(){
      var link = this.$el.querySelector('.link');
      link.addEventListener("mouseenter", function (e) {
        TweenLite.to(e.target.querySelector('span'), .5, {
          width: ((e.target.querySelector('p').offsetWidth / link.offsetWidth) * 100) + "%",
          ease: Elastic.easeOut.config(1, 0.5)
        });
      });
      link.addEventListener("mouseleave", function (e) {
        TweenLite.to(e.target.querySelector('span'), .5, {
          width: "100%",
          ease: Elastic.easeOut.config(1, 0.5)
        });
      });
    },
    destroyed(){},
    components:{}
}
</script>