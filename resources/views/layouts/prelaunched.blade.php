<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Nereus::course()->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        .space-pattern {
background-color: #4c504b;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='18' viewBox='0 0 100 18'%3E%3Cpath fill='%23465444' fill-opacity='0.4' d='M61.82 18c3.47-1.45 6.86-3.78 11.3-7.34C78 6.76 80.34 5.1 83.87 3.42 88.56 1.16 93.75 0 100 0v6.16C98.76 6.05 97.43 6 96 6c-9.59 0-14.23 2.23-23.13 9.34-1.28 1.03-2.39 1.9-3.4 2.66h-7.65zm-23.64 0H22.52c-1-.76-2.1-1.63-3.4-2.66C11.57 9.3 7.08 6.78 0 6.16V0c6.25 0 11.44 1.16 16.14 3.42 3.53 1.7 5.87 3.35 10.73 7.24 4.45 3.56 7.84 5.9 11.31 7.34zM61.82 0h7.66a39.57 39.57 0 0 1-7.34 4.58C57.44 6.84 52.25 8 46 8S34.56 6.84 29.86 4.58A39.57 39.57 0 0 1 22.52 0h15.66C41.65 1.44 45.21 2 50 2c4.8 0 8.35-.56 11.82-2z'%3E%3C/path%3E%3C/svg%3E");    </style>
    <!-- clarity -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "{{ Nereus::course()->clarity_code }}");
    </script>
    <!-- /clarity -->
</head>
<body class="bg-gray-900 text-white space-pattern">

    <div class="flex flex-col space-y-8 items-center justify-center min-h-screen">
        <h1 class="text-4xl font-bold mb-6">{{ Nereus::course()->name }}</h1>

        <div class="p-6 rounded-lg bg-gray-800 bg-opacity-80">
            @isset($message)
                {{ $message }}
            @else
            <p class="text-center text-lg mb-4">Subscribe for Early Access</p>
            <form method="POST" target="_self" action="{{ route('prelaunched.subscribe') }}">
                @csrf
                <div class="flex flex-col items-center w-full max-w-sm px-4 space-y-4">
                    <div class="w-full flex items-center bg-gray-700 p-3 rounded-md">
                        <i data-feather="mail" class="text-gray-400 mr-3"></i>
                        <input type="email" name="email" class="w-full bg-transparent border-none focus:outline-none placeholder-gray-400" placeholder="Enter your email">
                    </div>
                    @error('email')<span class="text-red-500"> {{ $message }} </span>@enderror
                    <button class="w-full flex items-center justify-center bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i data-feather="send" class="text-white mr-2"></i>
                        Subscribe
                    </button>
                </div>
            </form>
            @endif
            <p class="text-green-500 text-right pt-4 pr-4 text-xs">pre-launch scope</p>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
