<template>
     <div class="boxPopup heightFull">
          <div class="brushTop">
               <div class="boxRelative">
                    <img src="/frontend/brush-18.png" />
                    <a href="javascript:void(0)" @click="closePopup()" class="boxClose">
                         <img src="/frontend/close.png" />
                    </a>
               </div>
          </div>
          <div class="height90 boxRelative">
               
               <div class="brushBottom">
                    <div class="boxRelative">
                         <img src="/frontend/brush-110.png" />
                         <h2>¡COMPARTE y gana!</h2>
                    </div>
               </div>
               <div class="boxCenterVertical">
                    
                    <div class="boxShareCamera d-flex justify-content-center flex-column align-content-center flex-wrap">
                         <div class="boxVector v1">
                              <img src="/frontend/v1.png" />
                         </div>
                         <div class="boxVector v2">
                              <img src="/frontend/v2.png" />
                         </div>
                         <div class="boxVector v3">
                              <img src="/frontend/v3.png" />
                         </div>
                         <div class="boxVector v4">
                              <img src="/frontend/v4.png" />
                         </div>
                         <div class="titlePopup">
                              <h2>además <span class="color-yellow">gana cervezas corona</span> <br>PARA TODO EL AÑO</h2>
                         </div>
                         <div class="boxIconCamera d-flex justify-content-center">
                              <div class="boxNumberIcon">
                                   <span class="numberClass">1.</span>
                                   <img src="/frontend/mobile.png" />
                              </div>
                         </div>
                         <div class="boxBrushTitle">
                              <p>SUBE</p>
                         </div>
                         <div class="boxSubTitlePopup">
                              <h2>esta FOTO A TUS STORIES</h2>
                         </div>
                         <div class="boxIconInstagram d-flex justify-content-center">
                              <div class="boxNumberIcon p2">
                                   <span class="numberClass">2.</span>
                                   <img src="/frontend/instagram.png" />
                              </div>
                         </div>
                         <div class="boxBrushTitle">
                              <p>ETIQUÉTANOS</p>
                         </div>
                         <div class="boxSubTitlePopup">
                              <h2>@CORONA_NATURAL_PE <br>con el <span class="color-yellow">#scanthesunset</span></h2>
                         </div>
                         <div class="boxTitleLegal">
                              <p>*Si tu cuenta es privada envía un pantallazo al DM</p>
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
          return {
               
          }
     },
     computed: {
          ...mapGetters({
               boolTYC: 'user/getLegal',
               MayorEdad: 'user/getAccess',
          })
     },
     mounted(){
          
     },
     methods: {
          closePopup(){
               $('.boxPopup').fadeOut('slow')
          },
     }
}
</script>