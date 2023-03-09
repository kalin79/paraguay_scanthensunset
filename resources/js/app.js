import './bootstrap';
import '../sass/frontend/main.sass';
// import 'jquery-validation/dist/jquery.validate.js'
import jQuery from 'jquery';

window.$ = jQuery;

// try {
//     require('jquery-validation/dist/jquery.validate.js');
//  } catch (e) {}

import {createApp} from 'vue/dist/vue.esm-bundler'
import  store  from './store/index';

import Home from './components/home/Index.vue';
import HaderMain from './components/header/Main.vue';
import FooterMain from './components/footer/Main.vue';

import Participar from './components/corona/Participar.vue';
import Foto from './components/corona/Foto2.vue';
import Resultado from './components/corona/Resultado.vue';
import PopShare from './components/corona/PopShare.vue';
import Error from './components/corona/Error.vue';
import Error2 from './components/corona/Error2.vue';
import Restriccion from './components/corona/Restriccion.vue';
import RestriccionHome from './components/corona/RestriccionHome.vue';
import PreResultado from './components/corona/PreResultado.vue';
import FormEmail from './components/corona/FormEmail.vue';
// import FormRegister from './components/register/Register.vue';
// import FormThank from './components/register/ThankYou.vue';
// import FormError from './components/register/ErrorForm.vue';

const app = createApp({});

app.component('home-page',Home);
app.component('header-main',HaderMain);
app.component('footer-main',FooterMain);

app.component('participar-corona',Participar);
app.component('foto-corona',Foto);
app.component('resultado-corona',Resultado);
app.component('popup-share',PopShare);
app.component('error-corona',Error);
app.component('error2-corona',Error2);
app.component('restriccion-corona',Restriccion);
app.component('restriccion-home',RestriccionHome);
app.component('corona-email',FormEmail);
app.component('preresultado-corona',PreResultado);
// app.component('form-register',FormRegister);
// app.component('form-thank',FormThank);
// app.component('form-error',FormError);
app.use(store);
app.mount('#app');
