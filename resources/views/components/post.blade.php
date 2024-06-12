@props(['post'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex flex-row justify-between p-4">
        <div>
            <h3>Ecrit par {{ $post->user->name }}</h3>
            <p class="text-gray-600 mb-4">{{ date_format($post->updated_at, "d-M-Y") }}</p>
            <p class="text-gray-700">{{ $post->content }}</p>
        </div>
        @if(Auth::check() && Auth::user()->id == $post->user->id)
        <div class="flex flex-row gap-4">
            <!-- <form method="POST" action="{{route('post.update', $post)}}">
                @csrf
                @method("PUT")
                <div>
                    <x-primary-button>
                        modifier
                    </x-primary-button>
                </div>
            </form> -->
            <a href="{{ route('post.update.page', ['id' => $post->id]) }}">
                <x-primary-button>
                    modifier
                </x-primary-button>
            </a>
            <form method="POST" action="{{route('post.delete', $post)}}">
                @csrf
                @method("DELETE")
                <div>
                    <x-danger-button>
                        Supprimer
                    </x-danger-button>
                </div>
            </form>

        </div>
        @endif
    </div>
</div>