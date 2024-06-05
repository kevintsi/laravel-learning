<x-app-layout>
    @forelse($posts as $post)
    <div>{{ $post->id}}</div>
    <div>{{ $post->content}}</div>
    <div>{{ $post->updated_at}}</div>
    @empty
    <div>No posts</div>
    @endforelse
</x-app-layout>