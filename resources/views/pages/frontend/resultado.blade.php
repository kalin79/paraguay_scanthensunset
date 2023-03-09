@extends('layouts.frontend.master')
@section('meta_tags')
    <title>Corona: Haz ganado un descuento</title>
    <meta name="title" content="Corona :: Haz ganado tu descuento"  />
    <meta name="description" content="Corona - Scan the Sunset :: Obten tu descuento en Ta-Da" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Corona :: Sunset" >
    <meta itemprop="description" content="Corona - Scan the Sunset :: Obten tu descuento en Ta-Da">
    <meta itemprop="image" content="https://scanthesunset.com/frontend/images/share.png">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Corona :: Sunset" >
    <meta name="twitter:description" content="Corona - Scan the Sunset :: Obten tu descuento en Ta-Da">
    <meta name="twitter:creator" content="@author_handle">
    <!-- Twitter Summary card images must be at least 120x120px  -->
    <meta name="twitter:image" content="https://scanthesunset.com/frontend/images/share.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="Corona :: Sunset"  />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://scanthesunset.com" />
    <meta property="og:image" content="https://scanthesunset.com/frontend/images/share.png" />
    <meta property="og:description" content="Corona - Scan the Sunset :: Obten tu descuento en Ta-Da" />
    <meta property="og:site_name" content="https://scanthesunset.com, Lima Perú" />
    <meta property="article:published_time" content="2023-09-17T05:59:00+01:00" />
    <meta property="article:modified_time" content="2023-09-16T19:08:47+01:00" />
    <meta property="article:section" content="Article Section" />
    <meta property="article:tag" content="Article Tag" />
    <meta property="fb:admins" content="Facebook numberic ID" />
    <script>
        fbq('track', 'CompleteRegistration');
    </script>
@endsection
@section('content')
    <resultado-corona></resultado-corona>
@endsection