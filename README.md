# Shiki Highlighter Php

Shiki code highlighter example html, php, js with cdn and wordpress.

## Code

- <https://github.com/atomjoy/shiki-highlighter/blob/main/wp.php>
- <https://github.com/atomjoy/shiki-highlighter/blob/main/wp-foreach-code.php>

## Toggle theme

<img src="https://raw.githubusercontent.com/atomjoy/shiki-highlighter/main/shiki-highlighter.png" width="100%">
<img src="https://raw.githubusercontent.com/atomjoy/shiki-highlighter/main/shiki-highlighter-dark.png" width="100%">

## Shiki page

<https://shiki.matsu.io>

## Html example

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel validation </title>

    <script>
        function decodeHTMLEntities(text) {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = text;
            return textArea.value;
        }

        function encodeHTMLEntities(text) {
            var textArea = document.createElement('textarea');
            textArea.innerText = text;
            return textArea.innerHTML;
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=VT323&display=swap');

        :root {
            --shiki-dark: #dbd7ca;
            --shiki-dark-bg: #f23;
        }

        body {
            padding-inline: 50px;
            color: #000;
            background: #fff;
            font-family: Poppins, monospace;
        }

        h1 {
            float: left;
            width: 100%;
            font-size: 40px;
            margin-top: 50px;
        }

        p {
            float: left;
            width: 100%;
        }

        .btn-toggle {
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 1px;
            color: #fff;
            background: #131313;
            border-radius: 15px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        pre {
            float: left;
            width: 100%;
            border-radius: 5px;
            border: 10px solid #fbfbfb;
        }

        code {
            float: left;
            width: 100%;
            min-height: 100px;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 5px;
            font-family: "VT323", system-ui;
            font-family: "JetBrains Mono", consolas, system-ui;
            background-color: #dbd7caee;
            background-color: #f6f6f6;
            overflow: auto;
            scrollbar-width: thin;
        }

        .shiki {
            float: left;
            width: 100%;
        }

        body.dark .shiki,
        body.dark .shiki span {
            color: var(--shiki-dark) !important;
            background-color: var(--shiki-dark-bg) !important;

            font-style: var(--shiki-dark-font-style) !important;
            font-weight: var(--shiki-dark-font-weight) !important;
            text-decoration: var(--shiki-dark-text-decoration) !important;
        }

        body.dark code {
            background-color: var(--shiki-dark-bg) !important;
        }
    </style>
</head>

<body>
    <button onclick="document.body.classList.toggle('dark')" class="btn-toggle">Toggle theme</button>

    <h1>How to get the first error from Request Validation in Laravel</h1>

    <p>Jeżeli chcesz wyświetlić tylko pojedyńczy błąd validacji danych wejściowych użyj parametru bail.</p>
    <div id="c1"></div>

    <p>Wyświetlaj tylko pojedyńczy błąd validacji z FormRequest.</p>
    <div id="c2"></div>

    <script type="module">
        import { codeToHtml } from 'https://esm.sh/shiki@1.0.0'
        // import { codeToHtml } from 'https://esm.run/shiki@1.0.0'

        document.getElementById('c1').innerHTML = await codeToHtml(`<?php

class UserController extends Controller {

    public function uploadAvatar(Request $request) {
        $request->validate([
            'avatar' => 'bail|required|image|mimes:png|max:2048|dimensions:max_width=256,max_height=256',
        ]);
    }
}`, {
            lang: 'php',
            // theme: 'vitesse-light',
            themes: {
                light: 'vitesse-light',
                dark: 'vitesse-dark'
            },
            defaultColor: 'light',
        });

        document.getElementById('c2').innerHTML = await codeToHtml(`<?php

class UploadRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize() {
        return true; // Allow all
    }

    public function rules() {
        return [
            'avatar' => 'required|image|mimes:png|max:2048|dimensions:max_width=512,max_height=512',
        ];
    }
}`, {
            lang: 'php',
            // theme: 'vitesse-light',
            themes: {
                light: 'vitesse-light',
                dark: 'vitesse-dark'
            },
            defaultColor: 'light',
        });
    </script>

    <p><a href="https://textmate-grammars-themes.netlify.app/?theme=github-light&grammar=javascript" target="_blank">Theme styles</a></p>
</body>

</html>
```
