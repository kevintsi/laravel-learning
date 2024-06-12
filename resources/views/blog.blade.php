@php
$hasErrors = $errors->any();
@endphp
<x-app-layout>
    <div class="flex flex-col gap-4">
        @if(Auth::check() && Auth::user()->id == $id)
        <h1 class="text-center text-2xl font-bold p-4">My Blog</h1>

        <form method="POST" class="flex flex-col" action="{{route('post.store')}}">
            @csrf
            <div class="flex flex-col">
                <x-input-label>Contenu</x-input-label>
                <textarea name="content"></textarea>
                <div @class(["flex", "flex-row" , "justify-end"=> !$hasErrors, "justify-between" => $hasErrors, "pt-4"])>
                    @if($errors->any())
                    <div class="flex items-start">
                        @foreach($errors->all() as $error)
                        <div class="text-red-500">{{ $error}}</div>
                        @endforeach
                    </div>
                    @endif
                    <x-primary-button>Poster</x-primary-button>
                </div>

            </div>
        </form>

        @endif
        @forelse($posts as $post)
        <x-post :post="$post" />
        @empty
        <div> No posts </div>
        @endforelse
    </div>
</x-app-layout>