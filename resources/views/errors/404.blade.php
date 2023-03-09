@extends('layouts.frontend.master')
@section('meta_tags')
    <title>Armoni :: Error</title>
    <meta name="title" content="Armoni :: Discoteca"  />
    <meta name="description" content="Armoni :: Registrante y ten tu entrada , no te lo pierdas" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Armoni :: Discoteca" >
    <meta itemprop="description" content="Armoni :: Registrante y ten tu entrada , no te lo pierdas">
    <meta itemprop="image" content="https://armoni.club/frontend/images/share.png">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Armoni :: Discoteca" >
    <meta name="twitter:description" content="Armoni :: Registrante y ten tu entrada , no te lo pierdas">
    <meta name="twitter:creator" content="@author_handle">
    <!-- Twitter Summary card images must be at least 120x120px  -->
    <meta name="twitter:image" content="https://armoni.club/frontend/images/share.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="Armoni :: Discoteca"  />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://armoni.club" />
    <meta property="og:image" content="https://armoni.club/frontend/images/share.png" />
    <meta property="og:description" content="Armoni :: Registrante y ten tu entrada , no te lo pierdas" />
    <meta property="og:site_name" content="https://armoni.club, Lima Perú" />
    <meta property="article:published_time" content="2023-09-17T05:59:00+01:00" />
    <meta property="article:modified_time" content="2023-09-16T19:08:47+01:00" />
    <meta property="article:section" content="Article Section" />
    <meta property="article:tag" content="Article Tag" />
    <meta property="fb:admins" content="Facebook numberic ID" />
     
@endsection
@section('content')
     <div class="container pageError">
          <div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
               <div class="boxLogoError">
                    <img src="{{ asset('/frontend/logo.svg') }}" alt="">
               </div>
               <h3>No se ha encontrado esta p&aacute;gina</h3>
          </div>
     </div>
@endsection


{{-- 
@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
