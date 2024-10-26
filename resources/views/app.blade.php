<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Meta Title -->
        <title inertia>{{ config('app.name', 'Shantaty') }}</title>

        <!-- Meta Description for SEO -->
        <meta name="description" content="Discover exclusive premium bags at Shantaty. Handcrafted with care, and versatile designs that reflect elegance and sustainability.">

        <!-- Arabic Meta Description -->
        <meta name="description" lang="ar" content="اكتشف مجموعة شنتاتي الحصرية من الحقائب اليدوية الفاخره. تصميمات أنيقة ومواد مستدامة لأناقة دائمة.">

        <!-- Keywords for SEO -->
        <meta name="keywords" content="premium bags, eco-friendly bags, sustainable fashion, handcrafted bags, timeless designs, Shantaty">

        <!-- Arabic Keywords -->
        <meta name="keywords" lang="ar" content="حقائب فاخرة, حقائب صديقة للبيئة, موضة مستدامة, حقائب يدوية, تصميمات خالدة, شنتاتي">

        <!-- Open Graph (OG) for social media (Facebook, WhatsApp) -->
        <meta property="og:title" content="Shantaty - Premium, Eco-friendly Bags">
        <meta property="og:description" content="Explore Shantaty's exclusive collection of handcrafted, eco-friendly bags designed for style and sustainability.">
        <meta property="og:image" content="{{ asset('storage/app/public/app.webp') }}">
        <meta property="og:url" content="https://alhababsah.me">
        <meta property="og:type" content="website">

        <!-- Arabic Open Graph (OG) -->
        <meta property="og:title" content="شنتاتي - حقائب فاخرة">
        <meta property="og:description" content="اكتشف مجموعة شنتاتي الحصرية من الحقائب المصنوعة يدويًا ، مصممة لأناقة واستدامة.">
        <meta property="og:image" content="{{ asset('storage/app/public/app.webp') }}">
        <meta property="og:url" content="https://alhababsah.me">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Shantaty - Premium, Eco-friendly Bags">
        <meta name="twitter:description" content="Discover our eco-friendly, handcrafted bags designed for timeless elegance and functionality.">
        <meta name="twitter:image" content="{{ asset('storage/app/public/app.webp') }}">

        <!-- WhatsApp Sharing -->
        <meta property="og:image" content="{{ asset('storage/app/public/app.webp') }}">
        <meta name="twitter:image" content="{{ asset('storage/app/public/app.webp') }}">
        <meta property="og:site_name" content="Shantaty">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <!-- Structured Data (Schema Markup) -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Store",
          "name": "Shantaty",
          "url": "https://alhababsah.me/",
          "logo": "https://alhababsah.me/storage/app/public/app.webp",
          "description": "Exclusive handcrafted, eco-friendly premium bags.",
          "sameAs": [
            "https://www.facebook.com/shantaty",
            "https://www.instagram.com/shantaty",
            "https://wa.me/00962782445888"
          ]
        }
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
