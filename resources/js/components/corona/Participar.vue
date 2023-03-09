<template>
     <div>
          <div class="heightFull notOverflow" v-if="accessScan">
               <div class="bgSunnet pageParticipar">
                    <div class="container">
                         <div class="d-flex justify-content-center boxLogo">
                              <picture>
                                   <img src="/frontend/logo.svg" alt="Corona :: Sunset" />
                              </picture>
                         </div>

                         <div class="d-flex justify-content-center boxSunset">
                              <picture>
                                   <img src="/frontend/sunset.svg" alt="Corona :: Scan the Sunset" />
                              </picture>
                         </div>
                         <div class="introInit">
                              <div class="boxBlanket d-flex justify-content-center align-content-center">
                                   <img src="/frontend/camera2.svg" alt="TÓMALE UNA FOTO al atardecer">
                                   <p>TÓMALE UNA FOTO al atardecer</p>
                              </div>
                         </div>
                         <div class="d-flex justify-content-center">
                              <h1 class="boxTitleHidden">SCAN THE SUNSET</h1>
                              <h2>Y OBTÉN un DESCUENTO en</h2>
                         </div>
                         <div class="boxTada d-flex justify-content-center align-content-center">
                              <img src="/frontend/logo_tadaBackus.svg" alt="Ta*Da :: Delivery de Bebidas" />
                         </div>
                    </div>
               </div>
               <div class="fondoFooterBg"></div>
               <div class="bgSun morado">
                    <form name="formUserAccess" id="formUserAccess">
                         <div class="boxDescriptionSun d-flex flex-column justify-content-center align-content-center">
                              <h3>SOY MAYOR DE EDAD:</h3>
                              <div class="boxOption radioUserVery d-flex justify-content-center align-content-center">
                                   <div class="boxRadio d-flex justify-content-center align-content-center" id="check-1" @click="verifyUser(1,1)">
                                        <div class="boxCheck"></div>
                                        <label>S&iacute;</label>
                                   </div>

                                   <div class="boxRadio d-flex justify-content-center align-content-center" id="check-2" @click="verifyUser(2,0)">
                                        <div class="boxCheck"></div>
                                        <label>No</label>
                                   </div>
                              </div>
                              <div class="boxMessageError mt-2 msnUserVery">
                                   <p class="d-flex justify-content-center">Es un campo obligatorio</p>
                              </div>
                         </div>
                         <div class="boxLegal d-flex justify-content-center align-content-center">
                              <div class="boxRadio" id="btn-legal" @click="checkLegal()">
                                   <div class="boxCheck"></div>
                              </div>
                              <label>Acepto <a href="/frontend/TERMINOS-Y-CONDICIONES-SCAN-THE-SUNSET.pdf?v=4" target="_blank">términos y condiciones</a></label>
                         </div>
                         <div class="boxMessageError mt-2 msnLegal">
                              <p class="d-flex justify-content-center">Es un campo obligatorio</p>
                         </div>
                         <div class="boxButtom d-flex justify-content-center align-content-center">
                              <button type="button" v-on:click="processData">continuar</button>
                         </div>
                    </form>
               </div>
          </div>
          <div v-else>
               <restriccion-home />
          </div>
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     data() {
          return {
               boolUser: -2,
               boolLegal: 0
          }
     },
     computed: {
          ...mapGetters({
               boolTYC: 'user/getLegal',
               accessScan: 'user/getAccessHour',
          })
     },
     mounted(){
          const _date= new Date()
          const hora = _date.getHours()
          this.resetForm()
          if (hora >= 17 && hora < 20){
               // this.accessScan = true
               this.$store.commit('user/setAccessHour', true)
               this.getAccess
          }else{
               this.$store.commit('user/setMensaje', 4)
               // this.accessScan = false
               this.$store.commit('user/setAccessHour', false)
          }
          console.log(hora)
          
     },
     methods: {
          resetForm(){
               this.$store.commit('user/setReset', '')
          },
          checkLegal(){
               if ($('#btn-legal').hasClass('active')){
                    $('#btn-legal').removeClass('active')
                    this.boolLegal = 0
               }else{
                    $('#btn-legal').addClass('active')
                    this.boolLegal = 1
                    $('.msnLegal').fadeOut('slow')
               }
          },
          verifyUser(id,value) {
               if ($(`#check-${id}`).hasClass('active')){
                    $(`#check-${id}`).removeClass('active')
                    this.boolUser = -2
               }else{
                    this.boolUser = value
                    $('.radioUserVery .boxRadio').removeClass('active')
                    $(`#check-${id}`).addClass('active')
                    $('.msnUserVery').fadeOut('slow')
               }
          },
          async processData (event){
               event.preventDefault()
               
               if (this.boolUser === -2){
                    $('.msnUserVery').fadeIn('slow')
                    return false
               }else{
                    if (this.boolLegal === 0){
                         $('.msnLegal').fadeIn('slow')
                         return false
                    }else{
                         
                         if (this.boolUser === 0 ){
                              alert('No puede participar, no es mayor de Edad')
                              return false
                         }else{
                              if ((this.boolUser === 1) && (this.boolLegal === 1)){
                                   this.$store.commit('user/setLegal', this.boolLegal)
                                   this.$store.commit('user/setAccess', this.boolUser)
                                   top.location.href = '/foto'
                              }else{
                                   alert('No puede participar, no es mayor de Edad')
                                   return false
                              }

                         }
                    }
               }

               // try{
               //      let formData = new FormData();
               //      formData.append('codigo', this.form.code.toUpperCase())
                    
               //      const headers = { 
               //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               //           'Content-Type': 'application/json'
               //      }

               //      let sendSolicitud = await axios.post('/cliente/validar-codigo', formData ,{ headers })
               //      console.log(sendSolicitud.data)

               //      if ( sendSolicitud.data.code === 200 ){
               //           this.$store.commit('user/setCode', this.form.code)   
               //           this.$store.commit('user/setBoolCode', true)   
               //      }else{

               //      }
                    
               // } catch (error) {
               //      console.log(error);
               //      if (error.response.data.code === 404){
               //           this.errorMessage(error.response.data.data)
               //      }
               // } finally{
               //      this.boolSend = false
               //      // this.messageError('Hubo problemas intentelo m&aacute;s tarde !')
               // }
          },
     }
}
</script>