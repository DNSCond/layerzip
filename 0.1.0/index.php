<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <title>LayerZip (ANT.Ractoc.com)</title>
    <base href=/layerzip/0.1.0/>
    <meta name="theme-color" content="#0073a6">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src=https://cdn.jsdelivr.net/npm/temporal-polyfill@0.3.0/global.min.js></script>
    <script>
        globalThis.domContentLoadedPromise = new Promise(function (resolve) {
            if (document.readyState !== 'loading') resolve(document); else {
                window.document.addEventListener('DOMContentLoaded', () => resolve(document), {once: true});
            }
        });
    </script>
    <script data-type=application/json type=importmap>
        {
            "imports": {
                "Datetime_global": "/home/head2/datetime-local-v2/Datetime_global.js",
                "RelativeTimeChecker": "/home/head2/datetime-local-v2/RelativeTimeChecker.js",
                "temporal-polyfill": "data:text/javascript,const%7BTemporal%7D%3DglobalThis%3Bexport%7BTemporal%7D%3B"
            }
        }
    </script>
    <script type=module src="<?= "/home/head2/import-v2.js" ?>"></script>
    <style>
        :root {
            --primaryColor: #00ff00;
            --secondaryColor: #00a600;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --primaryColor: #36393f; /*$borderColor*/
                --secondaryColor: #36393f /*$bgColor*/;
            }
        }

        :root {
            --borderColor: var(--primaryColor);
            --bgColor: var(--secondaryColor)
        }
    </style>
    <style>
        a:visited, a:link {
            color: blue;
        }

        a:hover {
            color: orangered;
        }

        a:active {
            color: black;
        }

        button, input, textarea, .monospace, .ms {
            font-family: monospace;
        }

        html {
            font-family: system-uim, sans-serif;
        }

        .divs {
            background-color: white;
        }

        .ANT-cookie-consent {
            border-top: 8px solid var(--borderColor)
        }
    </style>
    <script>

    </script>
    <link href="<?= "/home/ANTStylesheet.css" ?>" rel=stylesheet>
    <style>
        body {
            background-color: var(--bgColor);
        }

        nav.main.nav-home {
            border-bottom-color: var(--borderColor);
        }

        pre {
            white-space: pre-wrap;
            overflow-wrap: break-word;
            word-break: break-all;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 3px solid #7c7c7c;
            text-align: left;
            padding: 8px;
            box-sizing: border-box;
            height: 100%;
        }
    </style>
    <meta name="theme-color" content="#0073a6">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="/dollmaker1/endpoint.php?bgcolor=%2300a8f3&fgcolor=%238cfffa&L=%23fff200&W=%23000000&LC=%23ff0000&RC=%230000ff&v=1"/>
</head>
<body>
<nav style="color:#424242;background-color:currentColor;box-sizing:content-box;height:calc(4.4em + 4px);border-bottom: 4px solid #00ff00">
    <div style="display:flex;flex-wrap:nowrap;align-items:center;flex-direction:row;height:100%;position:relative;margin:auto;width:88%;/*didnt match*/;box-sizing:border-box;overflow:auto hidden"
         role="none">
        <div style="border-width:4px;border-style:solid;padding:0.2em;width:4em;height:4em;border-color:currentColor;border-bottom:none;background-color:currentColor;">
            <a href="https://ant.ractoc.com" title="Home" aria-current="false"><img
                        src="/dollmaker1/endpoint.php?bgcolor=%2300a8f3&amp;fgcolor=%238cfffa&amp;L=%23fff200&amp;W=%23000000&amp;LC=%23ff0000&amp;RC=%230000ff&amp;v=1"
                        style="width:4em;height:4em;" width="512" height="512" alt="Home"></a></div>
        <div style="border-width:4px;border-style:solid;padding:0.2em;width:4em;height:4em;border-color:#00ff00;border-bottom:none;background-color:#00a600;">
            <a href="/layerzip/" title="LayerZip Spec" aria-current="page"><img
                        src="/dollmaker1/endpoint.php?bgcolor=%23000000&amp;fgcolor=%2300ff00&amp;L=%2300ff00&amp;W=%23000000&amp;LC=%2300ff00&amp;RC=%2300ff00&amp;accessory=lightbar"
                        style="width:4em;height:4em;" width="512" height="512" alt="void ANT"></a></div>
    </div>
</nav>
<div class="divs nav-home">
    <h1><?= "The LayerZip Specification";
        /*ob_start(function (string $string) {return preg_replace(
        '/\\b((?:MUST|REQUIRED|SHALL|SHOULD|RECOMMENDED|MAY|OPTIONAL)(?:\\s+NOT)?)\\b/',
        '<span class=monospace>\\1</span>', $string);})*/ ?></h1>
    <p><dfn>LayerZip</dfn> is a program independent way to store 2d image layers using zip deflate, png, and a json
        file. it intentionally avoids any proprietary features that only 1 program supports for maximum
        interoperability.
    <h2 id=documentStatus>Status of this document (<a href=#documentStatus>Link to This Section</a>)</h2>
    <p>this document written on
        <time datetime=2026-02-17 data-tolocaltime=date-only>Tue Feb 17 2026</time>
        is the latest LayerZip Specification <a href=https://semver.org/>Semantic version</a> 0.1.0.
    <h2 id=external>This Specification uses external references (<a href=#external>Link to This Section</a>)</h2>
    <ul>
        <li><a href=https://www.rfc-editor.org/rfc/rfc2119>The keywords "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL
                NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
                interpreted as described in RFC 2119.</a>
        <li><a href=https://en.wikipedia.org/wiki/PNG>PNG (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/ZIP_(file_format)>ZIP (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/DEFLATE>DEFLATE (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/JSON>JSON (Wikipedia)</a>
    </ul>
    <h2 id=examples>Examples of LayerZip in use (<a href=#examples>Link to This Section</a>)</h2>
    link to examples, for now, nothing. should be an ul of links.
    <h2 id=zipstruct>The Zip Structure (<a href=#zipstruct>Link to This Section</a>)</h2>
    <!--<?= "XPHP";
    function htmlspecialchars12(string $value): string
    {
        $html = str_replace('"', '&quot;',
                str_replace('>', '&gt;',
                        str_replace('<', '&lt;',
                                str_replace('\'', '&#39;',
                                        str_replace('&', '&amp;',
                                                "$value")))));
        return ($html);
    }

    function json_fromArray(mixed $json, bool|int $JSON_PRETTY_PRINT = true): false|string
    {
        $options = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        if (is_int($JSON_PRETTY_PRINT) && $JSON_PRETTY_PRINT >= 0) {
            $options |= JSON_PRETTY_PRINT;
            $json = json_encode($json, $options);
            return preg_replace_callback('/^ +/m', (function (array $matches)
            use ($JSON_PRETTY_PRINT): string {
                return str_repeat(' ', (strlen($matches[0]) / 4) * $JSON_PRETTY_PRINT);
            }), $json);
        } elseif (is_bool($JSON_PRETTY_PRINT) && $JSON_PRETTY_PRINT) {
            $options |= JSON_PRETTY_PRINT;
        }
        return json_encode($json, $options);
    } ?>-->
    <ul>
        <li>at the top level, the all LayerZip files MUST have a directory. this is called the <dfn>root directory</dfn>
        <li>inside that directory there MUST be a file called <code>layerzip.json</code> <a
                    href=#layerzipJSON>with content described in The Configuration JSON</a>.
        <li>There MUST be exactly 1 <code>layerzip.json</code> file and it must be in the root directory
    </ul>
    <h3 id=layerzipJSON>The Configuration JSON (<a href=#layerzipJSON>Link to This Section</a>)</h3>
    <details>
        <summary>Formal JSON Schema</summary>
        <pre><code><?= htmlspecialchars12(json_fromArray($jsonContent = json_decode(
                        file_get_contents('schema.json'),
                        true), 2));
                function createTBody(array $jsonContent): string
                {
                    $result = array();
                    $requiredArray = $jsonContent['required'];
                    foreach ($jsonContent['properties'] as $key => $item) {
                        $description = htmlspecialchars12($item['description']);
                        $required = (in_array($key, $requiredArray) ? 'True' : 'False');
                        $result[] = "<tr><td class=ms>$key<td class=ms>{$item['type']}"
                                . "<td class=ms>$required<td>$description";
                    }
                    return "<thead><tr><th scope=col>Field Name<th scope=col>Type<th scope=col>Required<th scope=col>"
                            . "Field Description</thead><tbody>\n" . implode("\n", $result) . "\n</tbody>";
                } ?></code></pre>
    </details>
    <h4 id=RootLevelObject>Root Level Object (<a href=#RootLevelObject>Link to This Section</a>)</h4>
    <div style=overflow-x:scroll;margin-top:1em>
        <table><?= createTBody($jsonContent) ?></table>
    </div>
    <h4 id=LayerObject>Layer Object (<a href=#LayerObject>Link to This Section</a>)</h4>
    <div style=overflow-x:scroll;margin-top:1em>
        <table><?= createTBody($jsonContent['definitions']['layer']) ?></table>
    </div>
</div>
<div style=height:32vh></div>
</body>
</html>
