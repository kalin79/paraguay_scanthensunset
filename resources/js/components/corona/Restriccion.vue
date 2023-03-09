<template>
     <div class="heightFull notOverflow boxError boxRestriccion">
          <div class="brushTop">
               <img src="/frontend/brush-p1.png" />
          </div>
          <div class="brushBottom">
               <img src="/frontend/brush-p2.png" />
          </div>
          <div class="boxContentCenter d-flex justify-content-center flex-column align-content-center flex-wrap">
               <div class="boxSol">
                    <img src="/frontend/sol.png" />
               </div>

               <div class="boxTitularR1">
                    <h2 class="color-blue" v-html="mensaje"></h2>
               </div>
               
               <!-- <div class="boxBrushText">
                    <p>5 p.m. - 7 p.m.</p>
               </div> -->

               <div class="boxMar">
                    <img src="/frontend/mar.png" />
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
                    <h2 class="color-blue">
                         y participa por
                    </h2>
               </div>

               <div class="d-flex justify-content-center align-content-center mt-3">
                    <div class="boxOlas">
                         <div class="boxBrushTextsmall">
                              <p>cerveza gratis.</p>
                         </div>
                         <div class="boxBrushTextsmall">
                              <p>Por todo el año</p>
                         </div>
                    </div>
                    <div>
                         <div class="boxCoronas">
                              <img src="/frontend/coronas.png" />
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
   
}
</script>