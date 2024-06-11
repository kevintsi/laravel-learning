<x-app-layout>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Derniers posts</h1>
        <div class="flex flex-col gap-4">
            @forelse($posts as $post)
            <x-post :post="$post" />
            @empty
            <div>No posts</div>
            @endforelse
        </div>
    </section>
</x-app-layout>