<style lang="sass" src="component/scrollpage.sass" scoped></style>

<template  lang="pug">
  .scroll-page(v-touch:up="handleScroll")
    .videoBG
      video#Video1(autoplay muted webkit-playsinline playsinline)
        source(:src="videourl")
        //- img(:src="imgurl")
      .bg-blue
    .mask-logo
      .production
        img(src="~images/product-logo.svg")
      .main-logo
        img(src="~images/logotype.svg")
        img.a1(src="~images/logotype.svg")
    i.material-icons(@click="handleScroll")
      | keyboard_arrow_down
</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
export default {
  data() {
    return {
      videourl:"http://img.lymma.net/thecomplex/index.mp4",
      imgurl:"assets/images/index.jpg"
    }
  },
  methods: {
    ...mapMutations(['showfirst']),
    handleScroll(el, done) {
      this.showfirst(false);
    },
  },
  created() {
      ["scroll", "mousewheel", "DOMMouseScroll"].forEach(function (event) {
          window.addEventListener(event, this.handleScroll);
      }, this);
  },
  destroyed() {
      ["scroll", "mousewheel", "DOMMouseScroll"].forEach(function (event) {
          window.removeEventListener(event, this.handleScroll);
      }, this);
  },
  mounted() {
    var video = document.getElementById("Video1");
    video.play();
  },
  computed: {
    ...mapGetters(['firstshow'])
  }
}
</script>