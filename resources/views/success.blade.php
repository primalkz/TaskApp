<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">
        <div>
            <!-- He who is contented is rich. - Laozi -->
            <h1 class="flex items-center justify-center text-2xl font-bold text-center text-green-900 dark:text-green-400">Login Success</h1>
            <script>
                setTimeout(() => {
                    window.location.href = "{{ url('app') }}";
                }, 2000); // Redirect after 2 seconds
            </script>
        </div>
    </body>
</html>