<template>
     <div class="boxSendEmail d-flex justify-content-center">
          <input type="text" v-model="email" placeholder="ejemplo@gmail.com_" />
          <a href="javascript:void(0)" @click="sendEmailSunset()" class="d-flex justify-content-center flex-wrap flex-column">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
               <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
               </svg>
          </a>
     </div>
</template>
<script>
export default {
     data() {
          return {
               email: ''
          }
     },
     mounted(){
          // this.resetForm()
     },
     methods: {
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
          async sendEmailSunset(){
               var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/

               if(!(regex.test(this.email.trim())) ) {
                    alert('Email - Incorrecto')
               }else{
                    try{
                         $('.boxSendEmail').fadeOut('slow');
                         let formData = new FormData();
                         formData.append('email', this.email)
                         // formData.append('boolTYC', this.boolLegal)
                         
                         console.log(this.email)
                         // console.log(this.boolLegal)
                         
                         const headers = { 
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                              'Content-Type': 'application/json'
                         }

                         let sendSolicitud = await axios.post('/store-email', formData ,{ headers })
                         // console.log(sendSolicitud)

                         if (sendSolicitud.data.info){
                              alert('Se registro el correo')
                         }else{
                              alert('El correo ya fue registrado')
                         }

                         
                         
                    } catch (error) {
                         console.log(error);
                         
                    } finally{
                         $('.boxSendEmail').fadeIn('slow');
                    }
               }
          },
     }
}
</script>