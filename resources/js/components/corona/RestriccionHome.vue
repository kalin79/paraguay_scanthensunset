<template>
     <div class="heightFull notOverflow boxError boxRestriccion bg3">
          <a href="javascript:void(0)" class="closeBtn" @click="cerrarRestriccion()">
               <img src="/frontend/close4.png" />
          </a>
          <div class="brushTop tp0">
               <img src="/frontend/nube3.png" />
          </div>
          <div class="brushBottom b0">
               <img src="/frontend/nube4.png" />
          </div>
          <div class="boxContentCenter d-flex justify-content-center flex-column align-content-center flex-wrap">
               <div class="boxSol">
                    <img src="/frontend/sunWhite.png" />
               </div>

               <div class="boxTitularR1">
                    <h2 class="" v-html="mensaje"></h2>
               </div>
               
               <!-- <div class="boxBrushText">
                    <p>5 p.m. - 7 p.m.</p>
               </div> -->

               <div class="boxMar">
                    <img src="/frontend/marWhite.png" />
               </div>

               <div class="boxTitularR1">
                    <h2 class="boxBrushText color-white small">
                         déjanos tu correo aquí
                    </h2>
               </div>

               <corona-email />

               <!-- <div class="boxLegal d-flex justify-content-center align-content-center">
                    <div class="boxRadio" id="btn-legal" @click="checkLegal()">
                         <div class="boxCheck blueCheck"></div>
                    </div>
                    <label class="color-blue">Acepto <a href="/frontend/TERMINOS-Y-CONDICIONES-SCAN-THE-SUNSET.pdf?v=3" target="_blank" class="color-blue">términos y condiciones</a></label>
               </div> -->

               <div class="boxTitularR1 mt-4">
                    <h2 class="">
                         y participa por
                    </h2>
               </div>

               <div class="d-flex justify-content-center align-content-center mt-3">
                    <div class="boxOlas blanco">
                         <div class="boxBrushTextsmall">
                              <p class="color-white">cerveza gratis.</p>
                         </div>
                         <div class="boxBrushTextsmall">
                              <p class="color-white">Por todo el año</p>
                         </div>
                    </div>
                    <div>
                         <div class="boxCoronas">
                              <img src="/frontend/botellaWhite.png" />
                         </div>
                    </div>
               </div>
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     data() {
          return {}
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
          cerrarRestriccion(){
               this.$store.commit('user/setAccessHour', true)
          }
     }
   
}
</script>