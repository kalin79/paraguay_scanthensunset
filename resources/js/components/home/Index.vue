<template>
     <div class="heightFull notOverflow">
          <div class="bgSunnet pageInicio">
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
                    <div class="boxFormHome">
                         <h1 class="boxTitleHidden">SCAN THE SUNSET</h1>
                         <form name="formUserAccess" id="formUserAccess" v-on:submit="sendData" method="POST">
                              <div class="boxCenterText">
                                   <h2>ingresa tu FECHA DE NACIMIENTO PARA PARTICIPAR</h2>
                              </div>
                              <div class="boxBirthDate d-flex justify-content-center align-content-center">
                                   <select name="day" id="day" v-model="day">
                                        <option value="0">DD</option>
                                        <option value="01">01</option>
                                   </select>
                                   <select name="month" id="month" v-model="month">
                                        <option value="0">MM</option>
                                        <option value="01">01</option>
                                   </select>
                                   <select name="year" id="year" v-model="year">
                                        <option value="0">AAAA</option>
                                        <option value="1979">1979</option>
                                        <option value="2000">2000</option>
                                        <option value="2019">2019</option>
                                   </select>
                              </div>
                              <div class="boxButtom d-flex justify-content-center align-content-center">
                                   <button type="submit">continuar</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <div class="bgSun">
               <div class="boxDescriptionSun d-flex flex-column justify-content-center align-content-center">
                    <h3>Cuando te conectas con la hora mágica,</h3>
                    <h2>siempre ganas</h2>
                    <div class="boxBlanket d-flex justify-content-center align-content-center">
                         <img src="/frontend/camera.svg" alt="TÓMALE UNA FOTO al atardecer">
                         <p>TÓMALE UNA FOTO al atardecer</p>
                    </div>
                    <h4>Y OBTÉN UN MÁGICO DESCUENTO</h4>
               </div>
          </div>
     </div>
</template>
<script>
export default {
     data: function () {
          return {
               day: "0",
               month: "0",
               year: "0",
          }
     },
     mounted: function() {
         
          // this.resetForm()
     },
     methods: {
          resetForm(){
               // console.log(1)
               this.$store.commit('user/setReset', '')
          },
          async sendData(event) {
               event.preventDefault()
               if ($('#day').val().trim() === '' || $('#day').val() === "0"){
                    alert("Debe elegir Dia")
                    return false
               }
               if ($('#month').val().trim() === '' || $('#month').val() === "0"){
                    alert("Debe elegir Mes")
                    return false
               }
               if ($('#year').val().trim() === '' || $('#year').val() === "0"){
                    alert("Debe elegir A&ntilde;o")
                    return false
               }
               let formData = new FormData()
               let d = new Date()
               let fullYear = d.getFullYear()
               if (fullYear - parseInt($('#year').val()) >= 18){
                    this.$store.commit('user/setDay', parseInt( $('#day').val()))
                    this.$store.commit('user/setMonth', parseInt( $('#month').val()))
                    this.$store.commit('user/setYear', parseInt( $('#year').val()))
                    this.$store.commit('user/setAccess', true)
                    // formData.append("nombres", this.form.nombres)
                    // try{
                    //      let sendSolicitud = await axios.post('/api/v1/store-finaciamiento',formData)
                    //      console.log(sendSolicitud)
                         
                    // }catch (error) {
                    //      console.log('error')
                    // } finally {
                    //      console.log('final')
                    // }
               }else{
                    alert('No puede acceder, es menor de edad')
                    return false
               }
               
               
          }
     }
}
</script>
