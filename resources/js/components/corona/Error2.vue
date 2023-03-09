<template>
     <div class="heightFull notOverflow boxError bgImgBlue">
          <div class="brushTop">
               <img src="/frontend/brush-p1.png" />
          </div>
          <div class="brushBottom">
               <img src="/frontend/brush-p2.png" />
          </div>
          <div class="boxContentCenter d-flex justify-content-center flex-column align-content-center flex-wrap">
               <a href="/">
                    <img src="/frontend/close3.png" />
               </a>
               <div class="boxTitleClose">
                    <!-- <h2 v-html="mensaje"></h2> -->
                    <h2 class="">
                         PRUEBA CAPTURAR <br>
                         EL ATARDECER EN su <br>
                         <span class="boxBrushText bg-yellow color-blue">MEJOR MOMENTO</span>
                    </h2>
               </div>
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     data() {
          return {
          }
     },
     computed: {
          ...mapGetters({
               mensaje: 'user/getMensaje',
          })
     },
     mounted(){
          // this.resetForm()
     },
     methods: {
          
     }
}
</script>