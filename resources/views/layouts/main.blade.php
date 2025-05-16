<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSite</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .hero-bg {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.8), rgba(37, 99, 235, 0.9)),
                url('https://source.unsplash.com/1600x900/?modern-office') center/cover no-repeat;
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .pricing-card {
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
        }

        .testimonial-card {
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -20px;
            right: 20px;
            font-size: 80px;
            color: rgba(59, 130, 246, 0.1);
            font-family: Arial;
        }

        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(45deg, #3B82F6, #2563EB);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>


<body lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-50 text-gray-900">
    @livewire('main.partials.header')

    @yield('content')
    {{ $slot }}


    <script>
        function setupHeaderLinks() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            setupHeaderLinks();
        });


        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', () => {
                setupHeaderLinks();
            });
        });
    </script>

</body>

</html>
