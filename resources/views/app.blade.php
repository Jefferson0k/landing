<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://sign.keynua.com/widgets/widget.js"></script>
        {{--<script src="https://slate.keynua.com/sdk/v1/slate.js"></script>
            Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.cdnfonts.com/css/lato" rel="stylesheet">

        @routes
        @vite(['resources/js/app.ts'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let chatbotElement = null;

            function initializeChatbot() {
                return new Promise((resolve) => {
                    chatbotElement = document.createElement('script');
                    chatbotElement.onload = function() {
                        window.voiceflow.chat.load({
                            verify: {
                                projectID: '66bb0ec5e0206cda3c1a32b6',
                            },
                            url: 'https://general-runtime.voiceflow.com',
                            versionID: 'production',
                        });
                        resolve();
                    };
                    chatbotElement.src = 'https://cdn.voiceflow.com/widget/bundle.mjs';
                    chatbotElement.type = 'text/javascript';
                    document.body.appendChild(chatbotElement);
                });
            }

            function showChatbot() {
                const voiceflowContainer = document.getElementById('voiceflow-chat');
                if (voiceflowContainer) {
                    voiceflowContainer.style.display = 'block';
                } else if (!chatbotElement) {
                    initializeChatbot().then(() => {
                        document.getElementById('voiceflow-chat').style.display = 'block';
                    });
                }
            }

            function hideChatbot() {
                const voiceflowContainer = document.getElementById('voiceflow-chat');
                if (voiceflowContainer) {
                    voiceflowContainer.style.display = 'none';
                } else {
                    //console.log('El contenedor del chatbot no se encontró');
                }
            }
            // Escuchar eventos emitidos desde Vue.js
            window.addEventListener('show-chatbot', function() {
                showChatbot();
            });
            window.addEventListener('hide-chatbot', function() {
                hideChatbot();
            });
        });
    </script>
    </body>
</html>
