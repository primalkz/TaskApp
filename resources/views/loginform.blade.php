<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg px-8 py-6 space-y-6">
                <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white">Welcome Back</h1>
                <form action="/login-user" method="post" class="space-y-4">
                    @csrf
                    <!-- <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-200" required />
                    </div> -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-200" required />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-200" required />
                        <div class="block text-xs font-medium text-red-700 dark:text-red-400">
                            @if(session('error'))
                                {{ session('error') }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sign In
                        </button>
                    </div>
                </form>
                <div class="text-sm text-center">
                    <p class="text-gray-600 dark:text-gray-400">
                        Don't have an account? 
                        <a href="/signup" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Sign up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

