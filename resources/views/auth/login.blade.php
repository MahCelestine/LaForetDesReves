<x-layout>
    <form action="{{ route('login') }}" method="POST" class="space-y-5 width-[50%]">
        @csrf
        <div>
            <label>Adresse Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@exemple.com" required autofocus>
        </div>

        <div>
            <label>Mot de passe</label>
            <input type="password" name="password"placeholder="••••••••" required>
        </div>

        <div>
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember" >Se souvenir de moi</label>
        </div>

        <button type="submit">
            Se connecter
        </button>
    </form>
</x-layout>