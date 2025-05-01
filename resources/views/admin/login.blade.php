<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  @vite('resources/css/app.css')
</head>

<body class="relative ">
  <div id="particles-js" class="fixed w-full"></div>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="z-10 p-8 bg-white rounded-lg shadow-lg w-96">
      <h2 class="mb-6 text-2xl font-semibold text-center text-gray-700">Login Admin</h2>

      <!-- Error Message -->
      @error('error')
        <div class="flex items-center p-3 mb-4 text-sm text-white bg-red-500 rounded-md">
          <iconify-icon icon="ion:warning-outline" width="20" height="20" class="me-2"></iconify-icon>
          {{ $message }}
        </div>
      @enderror


      <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="mb-4">
          <label for="email" class="block font-semibold text-gray-600">Email</label>
          <input type="email" name="email" id="email"
            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
            required autofocus>
        </div>

        <div class="mb-6">
          <label for="password" class="block font-semibold text-gray-600">Password</label>
          <input type="password" name="password" id="password"
            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
            required>
        </div>

        <div>
          <button type="submit"
            class="w-full py-3 font-semibold text-white bg-[#00cba9] rounded-md hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-[#00cba9] hover:cursor-pointer">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>

  @include('partials.js-home')
</body>

</html>
