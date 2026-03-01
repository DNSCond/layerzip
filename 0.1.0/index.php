<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <title>The LayerZip Specification (ANTRequest.nl)</title>
    <base href=/layerzip/0.1.0/>
    <meta name="theme-color" content="#0073a6">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=description content="<?= "LayerZip is a program independent way to store"
    . " 2d image layers using zip deflate, png, and a json file." ?>">
    <script src="<?= "https://cdn.jsdelivr.net/npm/temporal-polyfill@0.3.0/global.min.js" ?>"></script>
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
                "temporal-polyfill": "/require/head2/temporal.js"
            }
        }
    </script>
    <script type=module src="<?= "/require/head2/import-v2.js" ?>"></script>
    <link href="<?= "/require/head2/ANTStylesheet.css" ?>" rel=stylesheet>
    <link href="<?= "../layerzip.css" ?>" rel=stylesheet>
    <meta name="theme-color" content="#0073a6">
    <link rel=icon
          href="<?= $layerzipIcon = "/dollmaker2/icon/endpoint.php?bgcolor=%23000000&amp;fgcolor=%2300ff00&amp;" .
                  "L=%2300ff00&amp;W=%23000000&amp;LC=%2300ff00&amp;RC=%2300ff00&amp;accessory=lightbar";
          $favicon = "/dollmaker2/icon/endpoint.php?bgcolor=%2300a8f3&amp;fgcolor=%238cfffa&amp;L=%23fff200&amp;" .
                  "W=%23000000&amp;LC=%23ff0000&amp;RC=%230000ff" ?>"/>
    <style><?= array_key_exists('monospace', $_GET) ? 'html{font-family:monospace}' : '' ?></style>
    <link rel=canonical href=https://antrequest.nl/layerzip/0.1.0/>
</head>
<!-- (new Date).toISOString().slice(0,10) -->
<body>
<nav class=topnav>
    <div>
        <div style=border-color:currentColor;background-color:currentColor>
            <a href=https://antrequest.nl title="Home" aria-current="false"><img
                        src="<?= $favicon ?>"
                        width="512" height="512"
                        alt="Home"
                ></a></div>
        <div style=border-color:#00ff00;background-color:#00a600>
            <a href="/layerzip/" title="LayerZip Spec" aria-current="page"><img
                        src="<?= $layerzipIcon ?>"
                        width="512" height="512"
                        alt="void ANT"
                ></a></div>
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
        <time datetime=2026-03-01 data-tolocaltime=date-only>Sun Mar 01 2026</time>
        is the latest LayerZip Specification <a href=https://semver.org/>Semantic version</a> 0.1.0.
    <h2 id=external>This Specification uses external references (<a href=#external>Link to This Section</a>)</h2>
    <ul class=examples>
        <li><a href=https://www.rfc-editor.org/rfc/rfc2119>The keywords "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL
                NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
                interpreted as described in RFC 2119.</a>
        <li><a href=https://en.wikipedia.org/wiki/PNG>PNG (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/ZIP_(file_format)>ZIP (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/DEFLATE>DEFLATE (Wikipedia)</a>
        <li><a href=https://en.wikipedia.org/wiki/JSON>JSON (Wikipedia)</a>
    </ul>
    <h2 id=examples>Examples of LayerZip in use (<a href=#examples>Link to This Section</a>)</h2>
    link to examples, for now, there are none. should be an <code>&lt;ul&gt;</code> of links.
    <ul>
        <li><a href=https://github.com/DNSCond/multiexport-krita-plugin>DNSCond/multiexport-krita-plugi; Reference
                Implementation</a>. note that if it is wrong then check the spec and if they contradict the Reference
            Implementation is at fault. can only export for now.
    </ul>
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
                        $description = $item['description'];
                        $description = htmlspecialchars12($description);
                        $description = preg_replace_callback('/\\{(&quot;|\\{)(.+?)(&quot;|})}/s',
                                fn($matches) => '<code class=sl>' . ($matches[1] === '&quot' ? '&quot' : '') .
                                        $matches[2] . ($matches[3] === '&quot' ? '&quot' : '') . '</code>',
                                $description);
                        $required = (in_array($key, $requiredArray) ? 'True' : 'False');
                        $result[] = "<tr><td><code>$key</code><td><code>{$item['type']}"
                                . "</code><td><code>$required</code><td>$description";
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
    <h3 id=FolderStructure>Folder Structure (<a href=#FolderStructure>Link to This Section</a>)</h3>
    <p class=sl>The LayerZip file requires a specific folder structure. At the root level, all layers that are not in
        groups MUST be placed directly in the root directory. Layers that belong to a group MUST be placed in a
        subdirectory named for that group. Layer paths in <code>layerzip.json</code> MUST exactly match their relative
        paths from the <code>layerzip.json</code> file, using <code>/</code> as the path separator. Implementations
        SHOULD normalize paths (e.g., remove redundant <code>./</code> or <code>../</code> segments), but the exact
        normalization method is implementation-defined. Nested groups are allowed. If a group is referenced in
        <code>layerzip.json</code>, its directory MUST exist in the archive. The directory MAY be empty if no layers are
        currently assigned to that group, and tools SHOULD preserve empty directories to maintain group hierarchy.
    <p>Example folder structure:
    <pre>
/layerzip.json
/background.png
/foreground.png
/characters/hero.png
/characters/enemies/villain.png
/props/           (empty group directory allowed)</pre>
    <p>Layers MUST be ordered by array index; layers with a higher index MUST be displayed in front of layers with lower
        indices.
    <h2 id=Authornotes>Author's Notes (<a href=#Authornotes>Link to This Section</a>)</h2>
    <p>please tell me how i did. it was my first time writing something like this. this is published independently.
</div>
<div style=height:32vh></div>
</body>
</html>
