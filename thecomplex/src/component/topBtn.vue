<style lang="sass" scoped></style>

<template lang="pug">
  .topBtn(@click="topclick")
    .material-icons keyboard_arrow_up
</template>

<script>
export default {
    data() {
        return {
            show:false
        }
    },
    methods:{
      topclick(){

      }
    },
    created() {
        ["scroll", "mousewheel", "DOMMouseScroll"].forEach(function (event) {
          // if()
        }, this);
    },
    mounted(){
    },
    watch: {
    },
    computed:{
    },
    components:{}
}
</script>

