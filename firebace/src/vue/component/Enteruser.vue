<style lang="sass" src="component/enteruser.sass" scoped></style>

<template  lang="pug">
.setuser
  .setcard
    h2 使用者
    input(v-model="name" @keyup.enter="enterUser" placeholder="請輸入名稱")
    button(@click="enterUser")
      | 確認
</template>

<script>
import { mapMutations } from 'vuex';
export default {
  data() {
    return{
      name:''
    }
  },
  create() {},
  methods: {
    ...mapMutations(['setUsername']),
    enterUser(){
      this.setUsername(this.name);
    }
  },
  mounted() {},
  watch:{},
  updated() {},
  computed:{
  },
  components:{},
  destroyed() {}
}
</script>