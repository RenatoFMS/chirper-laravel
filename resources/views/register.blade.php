<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Chirper</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Criar sua Conta</h1>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nome" required class="w-full border p-3 rounded-lg">
            <input type="email" name="email" placeholder="E-mail" required class="w-full border p-3 rounded-lg">
            <input type="password" name="password" placeholder="Senha" required class="w-full border p-3 rounded-lg">
            <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700">Cadastrar</button>
        </form>
        <p class="text-center mt-4 text-sm text-gray-600">Já tem conta? <a href="{{ route('login') }}" class="text-blue-600">Entrar</a></p>
    </div>
</body>
</html>