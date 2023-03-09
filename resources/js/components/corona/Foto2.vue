<template>
     <div class="heightFull notOverflow centerBody fondoCamara">
          <div id="loadProccessImage" class="loadProccessImage active">
               <div class="boxCenterLoad d-flex justify-content-center align-content-center flex-column flex-wrap">
                    <div class="boxLogoSunset d-flex justify-content-center">
                         <img src="/frontend/logosunset.svg" alt="Scan The Sunset" />
                    </div>
                    <p class="d-flex justify-content-center mt-2">Procesando su Sunset ...</p>
               </div>
          </div>
          <div class="boxCenterPhoto">
               <div class="boxFooterText">
                    <p>
                         captura <br>
                         el atardecer
                    </p>
               </div>
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
               <div class="boxLogoSunset d-flex justify-content-center">
                    <img src="/frontend/logosunset.svg" alt="Scan The Sunset" />
               </div>
               <div class="boxIconCamara d-flex justify-content-center align-content-center flex-column flex-wrap">
                    <input type="file" name="foto" id="foto" class="SubirFoto" accept="image/*" capture="camera" />
                    <label for="foto">
                         <svg xmlns="http://www.w3.org/2000/svg" for="foto" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                              <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                              <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                         </svg>
                         <p for="foto" class="boxBtn">Click para Usar la Camara</p>
                    </label>
               </div>
               <a href="" id="download-link"></a>
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
          var _this = this
          
          if ($('#loadProccessImage').hasClass('active')){
               $('#loadProccessImage').removeClass('active')
          }
          if ((this.boolTYC === 1) || (this.MayorEdad === 1)){
               // this.boolView = true
               setTimeout(function(){
                    _this.initCamera()
               },2000)
               
          }else{
               top.location.href = '/'
          }
     },
     methods: {
          initCamera(){
               const fileInput = document.getElementById('foto')
               const _this = this
               fileInput.addEventListener('change', function(e){
                    $('#loadProccessImage').addClass('active')
                    /* Simular el proceso */
                    // setTimeout(function(){
                    //      top.location.href = '/resultado'
                    // },3000)
                    _this.processData($('#foto')[0].files[0])
               });
          },
          async processData (imageURL){
               /* 
                    Dato que te paso:

                    Te paso los siguientes:
                         - La foto que ha tomado el usuario,
                         nombre de la variable *imgBase64* 
                         - Variable *boolTYC* => 1 (si acepto)
                         - Variable *MayorEdad* => 1 (es mayor edad)

                    Respuesta:
                         Si es correcto:
                              - Link completo de la imagen.
                              - Descuento
                              - Codigo
                              - True
                         No es correcto:
                              - no se proceso (False)
               */
               try{
                    let formData = new FormData();
                    formData.append('image', imageURL)
                    formData.append('boolTYC', this.boolTYC)
                    formData.append('MayorEdad', this.MayorEdad)

                    console.log(imageURL)
                    console.log(this.boolTYC)
                    console.log(this.MayorEdad)
                    
                    const headers = { 
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                         'Content-Type': 'application/json'
                    }
                    // alert('ss')
                    let sendSolicitud = await axios.post('/read-image', formData ,{ headers })
                    console.log(sendSolicitud.data)
                    // return false
                    // alert(sendSolicitud.data.success)
                    // alert(sendSolicitud.data.data.estado)
                    if ((sendSolicitud.data.success === true) || (sendSolicitud.data.data.estado === 1)){
                         this.$store.commit('user/setDscto', sendSolicitud.data.data.descuento)
                         this.$store.commit('user/setCode', sendSolicitud.data.data.codigo)
                         this.$store.commit('user/setPorcentajeSunset', sendSolicitud.data.data.porcentaje) 
                         this.$store.commit('user/setPhoto', sendSolicitud.data.data.url_image)
                         this.$store.commit('user/setUserDscto', sendSolicitud.data.data.usuario_descuento)
                         this.$store.commit('user/setHistorialId', sendSolicitud.data.data.historial_id)
                         setTimeout(function(){
                              top.location.href = '/preresultado'
                         },500)
                    }else{
                         if ((sendSolicitud.data.success === false) || (sendSolicitud.data.data.estado === 0)){
                              // alert(sendSolicitud.data.data.ip)
                              if (sendSolicitud.data.data.error_message === 'Bloqueado' ){
                                   this.$store.commit('user/setMensaje', 2)
                                   setTimeout(function(){
                                        top.location.href = '/error2'
                                   },1000)
                              }else{
                                   if (sendSolicitud.data.data.error_message === 'hora' ){
                                        this.$store.commit('user/setMensaje', 3)
                                        setTimeout(function(){
                                             // alert(2)
                                             top.location.href = '/error2'
                                        },1000)

                                   }else{
                                        this.$store.commit('user/setMensaje', 1)
                                        setTimeout(function(){
                                             // alert(3)
                                             top.location.href = '/error'
                                        },1000)
                                   }
                              }
                              
                         }
                    }
                    
                    
               } catch (error) {
                    console.log(error);
                    
               } finally{
                    
               }
               
          },
     }
}
</script>