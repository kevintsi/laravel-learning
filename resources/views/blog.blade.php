<x-app-layout>
    <div class="flex flex-col gap-4">
        @if(Auth::check() && Auth::user()->id == $id)
        <h1 class="text-center text-2xl font-bold p-4">My Blog</h1>

        <form method="POST" class="flex flex-col" action="{{route('post.store')}}">
            @csrf
            <div class="flex flex-col">
                <x-input-label>Contenu</x-input-label>
                <textarea name="content"></textarea>
                <div class="flex justify-end pt-4">
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