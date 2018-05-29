<style lang="sass" src="component/postbox.sass" scoped></style>

<template lang="pug">
  .post_box
    p {{this.Xusername}} 說 :
    textarea(v-model="content" @keydown="keycheck" placeholder="輸入訊息 ...")
    button(@click="addCommit") 送出
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  data() {
      return {
        content:""
      }
  },
  create() {
    },
  methods: {
    addCommit (){
      if(this.content!=""){
        var firebace_com = firebase.database().ref('commits');
        firebace_com.push({
          username:this.Xusername,
          datetime:new Date().toLocaleString(),
          msg:this.content
        })
        this.content = "";
      }
    },
    keycheck (e) {
      if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        this.addCommit();
      }
    }
    
  },
  mounted() {},
  watch:{},
  updated() {},
  computed:{
    ...mapGetters(['Xusername']),
  },
  components:{},
  destroyed() {}
}
</script>