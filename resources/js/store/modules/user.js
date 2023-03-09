export default {
     namespaced: true,
     state: {
          dscto: 0,
          code: '',
          photo: '',
          porcentajeSunset: 0,
          legal: 0, 
          access: false,
          accessHour: false,
          historialId: 0, 
          mensaje: 'PRUEBA CAPTURAR <br> EL ATARDECER EN su <br> <span class="boxBrushText">MEJOR MOMENTO</span>',
          userDscto: {}
     },
     mutations: {
          setDscto(state,payload){
               state.dscto = payload;
          },
          setPorcentajeSunset(state,payload){
               state.porcentajeSunset = payload;
          },
          setCode(state,payload){
               state.code = payload;
          },
          setPhoto(state,payload){
               state.photo = payload;
          },
          setLegal(state,payload){
               state.legal = payload;
          },
          setAccess(state,payload){
               state.access = payload;
          },
          setAccessHour(state,payload){
               state.accessHour = payload;
          },
          setUserDscto(state,payload) {
               state.userDscto = payload
          },
          setHistorialId(state,payload) {
               state.historialId = payload
          },
          setMensaje(state,payload){
               if (payload === 1){
                    // state.mensaje = 'PRUEBA CAPTURAR <br> EL ATARDECER EN su <br> <span class="boxBrushText">MEJOR MOMENTO</span>';
                    state.mensaje = '¡ups! no hemos<br> identificado un sunset<br> vuelve a intentarlo';
               }else{
                    if (payload === 3){
                         state.mensaje = 'POR FAVOR, INTENTA <br>CUANDO SEA LA <br> <span class="boxBrushText color-white">HORA DEL SUNSET</span>';
                    }else{
                         if (payload === 4){
                              state.mensaje = '¡ups! <br> AÚN NO ES HORA DEL SUNSET<br> vuelve DESDE LAS 5:00 PM';
                         }else{
                              state.mensaje = 'YA UTILIZO UN DESCUENTO <br>DEBE ESPERAR <br> <span class="boxBrushText color-white">HASTA MAñANA</span>';
                         }
                    }
               }
          },
          setReset(state, payload){
               state.dscto = 0;
               state.porcentajeSunset = 0;
               state.code = '';
               state.photo = '';
               state.legal = 0;
               state.access = false;
               state.accessHour = false;
               state.historialId = 0,
               // state.mensaje = 'PRUEBA CAPTURAR <br> EL ATARDECER EN su <br> <span class="boxBrushText">MEJOR MOMENTO</span>';
               state.mensaje = '¡ups! no hemos<br> identificado un sunset<br> vuelve a intentarlo';
               //state.mensaje = '¡ups! aún no es hora<br> del sunset';

               

               state.userDscto = {};
          },
     },
     actions: {
          
     },
     getters: {
          getDscto(state){
               return state.dscto;
          },
          getPorcentajeSunset(state){
               return state.porcentajeSunset;
          },
          getCode(state){
               return state.code;
          },
          getPhoto(state){
               return state.photo;
          },
          getLegal(state){
               return state.legal;
          },
          getMensaje(state){
               return state.mensaje;
          },
          getHistorialId(state){
               return state.historialId;
          },
          getAccess(state){
               return state.access;
          },
          getAccessHour(state,payload){
               return state.accessHour;
          },
          getUserDscto(state) {
               return state.userDscto
          }
     }
}