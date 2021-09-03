#Development Notes
<hr>

Important changes to standard installation:
<ul>
    <li>Memory requirement sets upload size maximum. Currently the max upload size is defined in <code>.htaccess</code> as 3072M</li>

</ul>

<hr>
Application load cycle (PHP)
<ul>
    <li>Start loading <code>index.php</code>.</li>
    <li>Load <code>_startApp.php</code>.</li>
    <li>Load <code>config.php</code>, <code>functions.php</code>, <code>kint s();</code>, <code>Objects</code>.</li>
    <li>Initiate <code>global $db</code> with new Database connection.</li>
    <li>Load <code>Router.php</code> and allocate <code>$incFile.</code>.</li>
    <li>IF <code>action</code> or <code>ajax</code>, load endpoint and <b>exit</b>.</li>
    <li>ELSE continue <code>index.php</code> load.</li>
    <li>Load sidebar into page.</li>
    <li>Load page into main dashboard.</li>
</ul>

<hr>
Other notes:
<ul>
    <li><code>global $db</code> is available on all pages.</li>
</ul>