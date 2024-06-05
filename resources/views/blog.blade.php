<x-app-layout>
    <div class="flex flex-col">
        @if(Auth::check() && Auth::user()->id == $id)
        <div>My Blog</div>
        <form method="POST" class="flex flex-col" action="{{route('post.store')}}">
            @csrf
            <x-input-label>Contenu</x-input-label>
            <textarea name="content"></textarea>
            <x-primary-button>Poster</x-primary-button>
        </form>
        @endif
        @forelse($posts as $post)
        <div>{{ $post->id}}</div>
        <div>{{ $post->content}}</div>
        <div>{{ $post->updated_at}}</div>
        @empty
        <div> No posts </div>
        @endforelse
    </div>
</x-app-layout>