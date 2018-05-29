<style lang='sass' src="pages/about.sass" scoped>
</style>

<template lang="pug">
section.detail.about
  .top-back(@click='touterPre')
    .back
      i.material-icons
        | close
      span 返回前頁
  .all
    .detail-content
      .top
        h1.title 讓 我 搭 一 班 會 爆 炸 的 電 車
      .text
        .part
          p 在新聞媒體、文學出版……等行業，皆有許多經討論整理的「為與不為」供後輩入行後參考。這次計畫我們邀請了六位設計界大咖前輩與我們討論設計產業的社會責任，在這左右為難的複雜世道中，提供新人處事看事的參考指引。
        .part 
          p.s 「......讓我搭一班會爆炸的飛機 / 去到台灣之前被炸死」——《讓我搭一班會爆炸的飛機》
        .part
          p 計畫名稱取自香港歌曲《讓我搭一班會爆炸的飛機》與經典哲學題目「電車難題」。
          p 既然上了「設計」這台電車，不是被炸死，就是要好好面對為難的困境。
          p 讓我搭一班會爆炸的電車——每週五晚上八點，準時發車！
        ul.members
          li
            img(src="~images/member1.jpg")
            p.name 陳沛恩 Gloria
            p.sub 企劃｜平面設計｜採訪｜攝影｜動畫｜網頁前端
            p.text 香港理工大學傳意設計系三年級學生，喜歡設計，喜歡唱歌，喜歡窮遊旅行，第二身分是業餘賣藝人，空餘時候會即興拿烏克麗麗上街頭賣藝。
            a(href="mailto:aubreycpyg5@gmail.com" target="_blank") aubreycpyg5@gmail.com
          li
            img(src="~images/member2.jpg")
            p.name 曾曉童 Alice
            p.sub 企劃｜平面設計｜採訪｜攝影｜動畫｜網頁前端
            p.text 香港理工大學傳意設計系三年級學生，快要畢業的廢青，現為快要失業的freelancer。希望以自己的設計實實在在為世界發出多一點點的光。沉醉在圖像之中，喜歡收集（與囤積）各種實體紙品，沒有音樂會死掉，閑遐時喜歡亂逛、閱讀和寫字。找不到我的時候我在避靜。
            a(href="mailto:aliceyo919@gmail.com" target="_blank") aliceyo919@gmail.com
          li
            img(src="~images/member3.jpg")
            p.name 魏仁祥
            p.sub 企劃｜平面設計｜採訪｜文字編輯｜網頁前端
            p.text 關注女性主義、轉型正義之類。<br>愛陳冠蒨《欲言又止》、胡淑雯的書，還有社會學。崇拜李桐豪房慧真和V太太，討厭的事比喜歡的還要多很多，軟軟爛爛，對階級流動感到悲觀。受許多POP ICON啟發，想當辣妹 :p <br>drama is everything.
            a(href="mailto:veronpoppy@gmail.com" target="_blank") veronpoppy@gmail.com
        ul.credits
          li
            p 總召集 | 海流設計
            p 設計指導 | 海流設計
            p 
              | 網站設計指導 | 
              a(href="www.lymma.net" target="_blank") www.lymma.net
          li
            p 採訪指導 | Azona Ho、設計發浪、王士源
            p 編輯指導 | 江致潔、王金喵、王士源
            p 
              | 網站架設 | 
              a(href="www.lymma.net" target="_blank") www.lymma.net
          li
            p 感謝 lymma 協助架設網站並給予所有需要的協助。
            p 感謝所有受訪者，以及幫助過我們的所有人
        .lymma-div
          img(src="~images/blue-logo.svg")
          p.text lymma 是全球首個以華人設計師為主的線上社群平台，我們擁有最豐富的華人設計師，不論您是有平面設計、圖像設計、網頁設計、插畫設計等等的設計需求，您都能透過 lymma 快速找到適合您需求的設計師與設計作品。
          p
            | Website:
            a(href="http://www.lymma.net/" target="_blank")  http://www.lymma.net/
          p
            | Facebook:
            a(href="https://www.facebook.com/lymma.net/?fref=ts" target="_blank")  https://www.facebook.com/lymma.net/?fref=ts
          p
            | Instagram:
            a(href="https://www.instagram.com/lymma.tw/" target="_blank")  https://www.instagram.com/lymma.tw/
          p
            | 合作相關事宜請寄件至:
            a(href="mailto:admin@lymma.net" target="_blank")  admin@lymma.net
        .flowing-div
          img(src="~images/flowing.svg")
          p 期許自己能成為默默影響社會的設計團隊，
          p 我們主張任何的設計都應從解決需求開始，並擅長站在業主角度換位思考。
          p 在每個委託中，我們始終與客戶在同一艘船上，並在美感與設計需求間取得平衡。
          p.fb 
            | Facebook:
            a(href="https://www.facebook.com/flowingdesign/?fref=ts" target="_blank")  https://www.facebook.com/flowingdesign/?fref=ts
        ShareBar
        .p-logo
          img(src="~images/product-logo2.svg")
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import ShareBar from './ShareBar';
export default {
    data() {
        return {}
    }, 
    head: {
      // To use "this" in the component, it is necessary to return the object through a function
      title: function () {
        return {
          inner: "OK"
        }
      },
      // Meta tags
      meta: [
        { name: 'application-name', content: 'Name of my application' },
        { name: 'description', content: 'A description of the page', id: 'desc' }, // id to replace intead of create element
        // ...
        // Twitter
        { name: 'twitter:title', content: 'Content Title' },
        // with shorthand
        { n: 'twitter:description', c: 'Content description less than 200 characters' },
        // ...
        // Google+ / Schema.org
        { itemprop: 'name', content: 'Content Title' },
        { itemprop: 'description', content: 'Content Title' },
        // ...
        // Facebook / Open Graph
        { property: 'fb:app_id', content: '123456789' },
        { property: 'og:title', content: 'Content Title' },
        // with shorthand
        { p: 'og:image', c: 'https://example.com/image.jpg' },
        // ...
      ],
    },
    created() {
    },
    computed: {},
    methods: {
        touterPre() {
            this.$router.push('/');
        }
    },
    mounted() { },
    destroyed() { },
    components: {
        ShareBar
    }
}
</script>