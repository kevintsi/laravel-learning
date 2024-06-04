<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans flex flex-col antialiased dark:bg-black dark:text-white/50">

    @include("layouts.navigation")

    <div class="w-full flex justify-center">
        <div class="container">
            @forelse($posts as $post){
            <div>{{ $post->id()}}</div>
            <div>{{ $post->content()}}</div>
            }
            @empty
            <div>No posts</div>
            @endforelse
        </div>
    </div>
</body>
<html>