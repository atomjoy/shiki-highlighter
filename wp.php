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
            color: #121212;
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

        code {            
            display: inline-block;            
            width: 100%;
            min-height: 100px;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            font-family: "VT323", system-ui;
            font-family: "JetBrains Mono", system-ui;            
            background: #dbd7ca33;
        }
        pre {
            border-radius: 20px;
            border: 10px solid #fbfbfb;    
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
        body.dark code {
            background: transparent;
        }        
    </style>

</head>
<body>
    <h1>Shiki Highlighter</h1>    
    <div id="foo"></div>
    <button onclick="document.body.classList.toggle('dark')" class="btn-toggle">Toggle theme</button>
    
<script type="module">
    // be sure to specify the exact version
    import { codeToHtml } from 'https://esm.sh/shiki@1.0.0'
    // or
    // import { codeToHtml } from 'https://esm.run/shiki@1.0.0'

    const foo = document.getElementById('foo')
    foo.innerHTML = await codeToHtml(`<?php 
echo addslashes("<?php

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
?>`, {
        lang: 'php',
        // theme: 'vitesse-light',
        themes: {
            light: 'vitesse-light',
            dark: 'vitesse-dark'
        },
        defaultColor: 'light',
    })
</script>
    
</body>
</html>


