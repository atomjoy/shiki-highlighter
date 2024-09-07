<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiki Highlighter</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=VT323&display=swap');

        :root {
            --shiki-dark: #dbd7caee;
        }

        body {
            color: #3c3c43;
            font-family: Poppins, monospace;
        }

        h1 {
            font-size: 40px;
        }

        .btn-toggle {
            font-size: 16px;
            font-weight: 300;
            letter-spacing: 1px;
            color: #fff;
            background: #B8A965;
            border-radius: 15px;
            padding: 15px 25px;
            border: none;
            cursor: pointer;
        }

        .code {            
            display: inline-block;            
            padding: 0px !important;
            margin-bottom: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            font-family: "VT323", system-ui;
            font-family: "JetBrains Mono", system-ui;            
            border: 5px solid #dbd7ca66;
        }

        code {
            font-size: 16px;
            display: inline-block;            
            padding: 20px;
            width: 100%;
            min-height: 100px;
            box-sizing: border-box;
            border-radius: 20px;
            background: #dbd7ca33;
        }

        pre {
            margin: 0px;
            border-radius: 20px;
        }

        body.dark .shiki,
        body.dark .shiki span {
            color: var(--shiki-dark) !important;
            background-color: var(--shiki-dark-bg) !important;
            /* Optional, if you also want font styles */
            font-style: var(--shiki-dark-font-style) !important;
            font-weight: var(--shiki-dark-font-weight) !important;
            text-decoration: var(--shiki-dark-text-decoration) !important;
        }
        body.dark code, body.dark .code {
            background: transparent;
        }
    </style>

</head>
<body>
    <h1>Shiki Highlighter</h1>
    <p>A beautiful yet powerful syntax highlighter</p>

<h2>Example 1</h2>

<code class="code" data-lang="php"><?php 
echo htmlentities("<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;        

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    public function index(): View
    {
        \$users = DB::select('select * from users where active = ?', [1]);

        return view('user.index', ['users' => \$users]);
    }
}
"); 
?>
</code>

<h2>Example 2</h2>

<code class="code" data-lang="js"><?php echo htmlentities("const { createApp, ref } = Vue

createApp({
    setup() {
        const message = ref('Hello vue!')
        return {
            message
        }
    }
}).mount('#app')

<script>alert('Hello booo')</script>
"); ?>
</code>

<h2>Example 3</h2>

<code class="code" data-lang="php">&#x3C;?php
&#x9;echo &#x22;Hello&#x22;;

&#x9;class Home {
&#x9;&#x9;function dojob($place) {
&#x9;&#x9;&#x9;return $place;
&#x9;&#x9;}
&#x9;}

&#x9;$h = new Home();
&#x9;echo $h-&#x3E;dojob(&#x27;miasto&#x27;);
?&#x3E
</code>

    <button onclick="document.body.classList.toggle('dark')" class="btn-toggle">Toggle theme</button>

<script type="module">
    // be sure to specify the exact version
    import { codeToHtml } from 'https://esm.sh/shiki@1.0.0'    
    // import { codeToHtml } from 'https://esm.run/shiki@1.0.0'
    
    // Code
    document.querySelectorAll('code').forEach(async (i) => {
        i.innerHTML = await codeToHtml(decodeHtml(i.innerHTML), {
            // theme: 'vitesse-light',
            lang: i.dataset.lang ?? 'php',
            themes: {
                light: 'vitesse-light',
                dark: 'vitesse-dark'
            },
            defaultColor: 'light',
        })
    })

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
</script>
    
</body>
</html>
