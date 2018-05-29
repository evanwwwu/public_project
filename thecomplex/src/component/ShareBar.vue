<style lang="sass" src="component/sharebar.sass" scoped>
</style>
<template lang="pug">
.sharebar
  p 分享
  .btn(@click="twshare")
    img(src="~images/Twitter-black.svg")
  .btn(@click="fbshare")
    img(src="~images/Facebook-black.svg")
  //- .btn
  //-   img(src="~images/Messenger-black.svg")
</template>
<script>
export default {
  data() {
    return {
    }
  },
  methods: {
    twshare(){
      window.open("http://twitter.com/share?url="+ location.href);
    },
    fbshare(){
      window.open("https://www.facebook.com/sharer.php?u=" + location.href);
    }
  },
  created() {
    
  },
  destroyed() {
  },
  mounted() {
  },
  computed: {
  }
}
</script>