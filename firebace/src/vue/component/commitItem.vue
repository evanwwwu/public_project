<style lang="sass" src="component/item.sass" scoped>
</style>

<template  lang="pug">
.com
    .detail
        .username {{item.username}}
        .date {{item.datetime}} 說:
    .msg {{item.msg}}
</template>

<script>
export default {
  data() {
    return{}
  },
  props:["item"],
  create() {},
  methods: {},
  mounted() {},
  watch:{},
  updated() {},
  computed:{},
  components:{},
  destroyed() {}
}
</script>