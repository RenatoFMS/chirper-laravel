<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Chirper - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white border-b py-4 px-6 flex justify-between items-center shadow-sm">
        <span class="font-bold text-xl text-indigo-600 tracking-tight">Chirper</span>
        <div class="flex gap-4 items-center text-sm">
            @auth
                @if(Auth::user()->email === env('ADMIN_EMAIL'))
                    <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 font-bold hover:underline">Painel Admin</a>
                @endif
                <span class="text-gray-600">Logado como: <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-500 font-bold">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 font-bold">Entrar</a>
                <a href="{{ route('register.view') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Cadastrar</a>
            @endauth
        </div>
    </nav>

    <main class="max-w-2xl mx-auto mt-10 p-4">
        {{-- Área de Postagem --}}
        @auth
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-8">
                <form action="{{ route('chirps.store') }}" method="POST">
                    @csrf
                    <textarea name="message" placeholder="No que você está pensando?" class="w-full border rounded-lg p-3 outline-none focus:ring-2 focus:ring-blue-500 resize-none h-24" required></textarea>
                    <div class="flex justify-end mt-2">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">Postar Chirp</button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-indigo-50 border border-indigo-100 p-6 rounded-xl text-center mb-8">
                <p class="text-indigo-900">Você precisa estar logado para postar mensagens.</p>
            </div>
        @endauth

        {{-- Listagem de Mensagens --}}
        <div class="space-y-4">
            @forelse ($chirps as $chirp)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase">{{ $chirp->user->name ?? $chirp->user->email }}</p>
                        <p class="text-gray-800 text-lg mt-1">{{ $chirp->message }}</p>
                        <small class="text-gray-400 text-[10px]">{{ $chirp->created_at->diffForHumans() }}</small>
                    </div>
                    
                    @auth
                        {{-- Botão de Excluir: Só aparece para o dono ou para o Admin --}}
                        @if(Auth::id() === $chirp->user_id || Auth::user()->email === env('ADMIN_EMAIL'))
                            <form action="{{ route('chirps.destroy', $chirp) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="text-red-300 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-gray-400 italic">Nenhuma mensagem por aqui ainda...</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>