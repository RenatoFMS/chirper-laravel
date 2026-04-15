<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Chirper</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 w-full max-w-md">
        <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold mx-auto mb-4">C</div>
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Entrar no Sistema</h1>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-4 text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-md">Acessar Painel</button>
        </form>
        <a href="/" class="block text-center mt-6 text-gray-500 hover:underline text-sm">← Voltar para a Home</a>
    </div>
</body>
</html>