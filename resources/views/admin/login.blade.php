<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login Admin</h2>

    <!-- Error Message -->
    @if (session('error'))
      <div class="bg-red-500 text-white p-3 mb-4 rounded-md">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
      @csrf

      <div class="mb-4">
        <label for="email" class="block text-gray-600">Email</label>
        <input type="email" name="email" id="email"
          class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          required autofocus>
      </div>

      <div class="mb-6">
        <label for="password" class="block text-gray-600">Password</label>
        <input type="password" name="password" id="password"
          class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          required>
      </div>

      <div>
        <button type="submit"
          class="w-full py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Login
        </button>
      </div>
    </form>
  </div>

</body>

</html>
