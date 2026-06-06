<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgriWeb')</title>
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.navigation')

    {{-- PAGE CONTENT --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- FOOTER --}}

    @include('layouts.footer')
    <script>
        document.querySelectorAll('.js-faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.parentElement.classList.toggle('active');
            });
        });
        </script>
    <script>
        const modal = document.getElementById('askModal');
        
        document
            .getElementById('openAskModal')
            .addEventListener('click', function(e) {
                e.preventDefault();
                modal.classList.add('show');
            });
        
        document
            .querySelector('.close-modal')
            .addEventListener('click', function() {
                modal.classList.remove('show');
            });
        
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
        </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const button = document.getElementById("mobile-menu-button");
            const menu = document.getElementById("mobile-menu");
            const overlay = document.getElementById("mobile-overlay");
            const links = document.querySelectorAll(".mobile-menu a");
        
            function openMenu() {
                menu.classList.add("show");
                overlay.classList.add("show");
            }
        
            function closeMenu() {
                menu.classList.remove("show");
                overlay.classList.remove("show");
            }
        
            button.addEventListener("click", () => {
                menu.classList.contains("show") ? closeMenu() : openMenu();
            });
        
            overlay.addEventListener("click", closeMenu);
        
            // ✅ auto-close when clicking any link
            links.forEach(link => {
                link.addEventListener("click", closeMenu);
            });
        });
        </script>
</body>
</html>