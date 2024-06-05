<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-lg font-semibold">
            <a href="/" class="hover:text-gray-300">Accueil</a>
        </div>
        @auth
        <div class="flex space-x-4">
            <a href="{{ route('blog', ['id' => Auth::user()->id]) }}" class="text-white font-semibold hover:text-gray-300">{{ Auth::user()->name }}</a>
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="text-white font-semibold hover:text-gray-300">Se déconnecter</a>
            </form>

        </div>
        @endauth
        @guest
        <div class="flex space-x-4">
            <a href="{{route('login')}}" class="text-white font-semibold hover:text-gray-300">Se connecter</a>
            <a href="{{route('register')}}" class="text-white font-semibold hover:text-gray-300">S'enregistrer</a>
        </div>
        @endguest
    </div>
    </div>
</nav>