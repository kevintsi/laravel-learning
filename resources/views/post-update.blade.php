@props(['post'])
@php
    $hasErrors = $errors->any();
@endphp
<x-app-layout>
    <h1 class="text-center text-2xl font-bold p-4">Mise à jour du post</h1>

    <form method="POST" class="flex flex-col" action="{{route('post.update', $post)}}">
        @method('PUT')
        @csrf
        <div class="flex flex-col">
            <x-input-label>Contenu</x-input-label>
            <textarea name="content">{{ $post->content }}</textarea>
            <div @class(["flex", "flex-row" , "justify-end"=> !$hasErrors, "justify-between" => $hasErrors, "pt-4"])>
                @if($errors->any())
                <div class="flex items-start">
                    @foreach($errors->all() as $error)
                    <div class="text-red-500">{{ $error}}</div>
                    @endforeach
                </div>
                @endif
                <x-primary-button>Mettre à jour</x-primary-button>
            </div>

        </div>
    </form>
</x-app-layout>