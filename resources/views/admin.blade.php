<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin - Chirper</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen p-10">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold border-l-4 border-indigo-500 pl-4">Painel Administrativo</h1>
            <a href="/" class="bg-slate-800 hover:bg-slate-700 px-4 py-2 rounded text-sm transition">Sair do Painel</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                <span class="text-slate-400 text-sm uppercase font-bold tracking-wider">Total de Chirps</span>
                <p class="text-4xl font-black mt-2">{{ $totalChirps }}</p>
            </div>
            <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                <span class="text-slate-400 text-sm uppercase font-bold tracking-wider">Usuários Ativos</span>
                <p class="text-4xl font-black mt-2">{{ $users->count() }}</p>
            </div>
        </div>

        <h2 class="text-xl font-bold mb-4">Lista de Usuários</h2>
        <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden shadow-2xl">
            <table class="w-full text-left">
                <thead class="bg-slate-750 border-b border-slate-700">
                    <tr>
                        <th class="p-4 font-bold text-slate-300">ID</th>
                        <th class="p-4 font-bold text-slate-300">E-mail</th>
                        <th class="p-4 font-bold text-slate-300 text-center">Mensagens Postadas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-700/50 transition border-b border-slate-700/50">
                        <td class="p-4 text-slate-400">#{{ $user->id }}</td>
                        <td class="p-4 font-medium">{{ $user->email }}</td>
                        <td class="p-4 text-center">
                            <span class="bg-indigo-900/50 text-indigo-300 px-3 py-1 rounded-full text-xs font-bold">{{ $user->chirps_count }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>