<template>
     <div class="heightFull notOverflow centerBody backgroundYellow">
          <div id="loadProccessImage" class="loadProccessImage active">
               <div class="boxCenterLoad d-flex justify-content-center align-content-center flex-column flex-wrap">
                    <div class="boxLogoSunset d-flex justify-content-center">
                         <img src="/frontend/logosunset.svg" alt="Scan The Sunset" />
                    </div>
                    <p class="d-flex justify-content-center mt-2">Procesando su Sunset ...</p>
               </div>
          </div>
          <popup-share />
          <div class="brushWhite">
               <img src="/frontend/brushWhite.png" />
          </div>
          <div class="brushBlue">
               <div class="boxLogoWhite d-flex justify-content-center">
                    <img src="/frontend/logoWhite.svg" alt="Scan the Sunset" />
               </div>
               <div class="boxTitleResultado">
                    <h1>Felicidades</h1>
               </div>
          </div>
          <div class="boxResult d-flex justify-content-center align-content-center flex-wrap">
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
               <div class="boxDetailDscto flex-column  d-flex justify-content-center align-content-center flex-wrap">
                    <h3>GANASTE</h3>
                     <p>{{ dscto }}%</p>
                     <h4>DE Dsct. EN cerveza corona</h4>
               </div>
              
          </div>
          <!-- <div class="boxCodeResulta">
               <p @click="copyCode">COD: {{ code }}</p>
          </div> -->
          <div class="boxTituloPre">
                    <h2 class="color-blue">
                         registra tu email para <br>
                         enviarte el código
                    </h2>
               </div>
          <div class="boxSendEmail d-flex justify-content-center">
               <input type="text" v-model="email" placeholder="enviar código via mail:" />
               <a href="javascript:void(0)" @click="sendEmailSunset()" class="d-flex justify-content-center flex-wrap flex-column">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
               </a>
          </div>
          
          <!-- <div class="boxLegalSend d-flex justify-content-center">
               <div class="boxRadio" id="btn-legal" @click="checkLegal()">
                    <div class="boxCheck"></div>
               </div>
               <label>Recibir promociones.<a href="javascript:void(0)" target="_blank"> Ver términos y condiciones</a></label>
          </div> -->
          <!-- <div class="boxTaDa2">
               <a href="https://onelink.tadadelivery.com.pe/0DnW/m06j6j7r" target="_blank">
                    <img src="/frontend/tada2.png" alt="Ta-Da :: Aquiere aqui tu producto con tu Descuento" />
               </a>
          </div>
          <div class="boxAppBackus d-flex justify-content-center ">
               <p>Descarga la App en:</p>
               <a href="https://onelink.tadadelivery.com.pe/0DnW/m06j6j7r" target="_blank" alt="Ta-Da :: Apple">
                    <img src="/frontend/app.png" alt="Ta-Da :: La nueva App de Backus" />
               </a>
               <a href="https://onelink.tadadelivery.com.pe/0DnW/m06j6j7r" target="_blank" alt="Ta-Da :: Google Play">
                    <img src="/frontend/play.png" alt="Ta-Da :: Google Play" />
               </a>
          </div> -->
     </div>
</template>
<script>
import { mapActions, mapState, mapGetters, mapMutations } from 'vuex'
export default {
     data() {
          return {
               boolLegal: 0,
               email: '',
               dscto: 0,
          }
     },
     computed: {
          ...mapGetters({
               boolTYC: 'user/getLegal',
               MayorEdad: 'user/getAccess',
               sunset: 'user/getPorcentajeSunset',
               code: 'user/getCode',
               foto: 'user/getPhoto',
               userDscto: 'user/getUserDscto',
               historialId: 'user/getHistorialId'
          })
          
     },
     mounted(){
          var _this = this
          if ($('#loadProccessImage').hasClass('active')){
               $('#loadProccessImage').removeClass('active')
          }
          if ((this.boolTYC === 1) || (this.MayorEdad === 1)){
               if (this.userDscto.porcentaje_sunset >= 0 && this.userDscto.porcentaje_sunset <= 68){
                    this.dscto = 20
               }else{
                    if (this.userDscto.porcentaje_sunset >= 69 && this.userDscto.porcentaje_sunset <= 86){
                         this.dscto = 25
                    }else{
                         if (this.userDscto.porcentaje_sunset >= 87 && this.userDscto.porcentaje_sunset <= 100){
                              this.dscto = 30
                         }
                    }

               }
          }else{
               top.location.href = '/'
          }
          console.log(this.userDscto)
     },
     methods: {
          viewPopUp(){
               setTimeout(function(){
                    $('.boxPopup').fadeIn('slow')
               },14000)
          },
          // checkLegal(){
          //      if ($('#btn-legal').hasClass('active')){
          //           $('#btn-legal').removeClass('active')
          //           this.boolLegal = 0
          //      }else{
          //           $('#btn-legal').addClass('active')
          //           this.boolLegal = 1
          //           $('.msnLegal').fadeOut('slow')
          //      }
          // },
          async sendEmailSunset(){
               var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/
               if(!(regex.test(this.email.trim())) ) {
                    alert('Email - Incorrecto')
               }else{
                    try{
                         $('#loadProccessImage').addClass('active')
                         let formData = new FormData();
                         formData.append('email', this.email)
                         formData.append('historialId', this.historialId)
                         // formData.append('codigo', this.code)
                         formData.append('usuario_descuento_id', this.userDscto.id)
                         
                         console.log(this.email)
                         
                         // console.log(this.boolLegal)
                         
                         const headers = { 
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                              'Content-Type': 'application/json'
                         }

                         let sendSolicitud = await axios.post('/send-email', formData ,{ headers })
                         console.log(sendSolicitud.data)
                         this.$store.commit('user/setDscto', sendSolicitud.data.descuento)
                         this.$store.commit('user/setCode', sendSolicitud.data.codigo)
                         this.$store.commit('user/setPorcentajeSunset', sendSolicitud.data.porcentaje) 
                         // return false
                         // alert('El correo ha sido enviado. Por favor, revise su bandeja de No deseados si no lo ha recibido.')
                         setTimeout(function(){
                              top.location.href = '/resultado'
                         },500)
                    } catch (error) {
                         console.log(error);
                         
                    } finally{
                         
                    }
               }
          },
          copyCode(){
               navigator.clipboard.writeText(this.code)
               setTimeout(function(){
                    alert('Copio el codigo')
               },1000)

          },
     }
}
</script>