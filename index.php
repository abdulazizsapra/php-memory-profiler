<?php






if (PHP_OS == 'Linux') {
    echo "<center>";
    $cmd = shell_exec('/usr/bin/top -b -n1');
    if (isset($_GET['pid']) && $_GET['pid']) {
        $pid = $_GET['pid'];
        $cmd = shell_exec('/usr/bin/top -p ' . $pid . ' -b -n1');
    }
    $cmd = str_replace("      ", " ", $cmd);
    $cmd = str_replace("     ", " ", $cmd);
    $cmd = str_replace("    ", " ", $cmd);
    $cmd = str_replace("   ", " ", $cmd);
    $cmd = str_replace("  ", " ", $cmd);
    $cmd = str_replace(" ", "</td><td>", $cmd);
    $cmd = str_replace("\n", "</td></tr><tr><td>", $cmd);
    $cmd = str_replace("<tr><td></td><td>", "<tr><td>", $cmd);
    $cmd = str_replace("<tr><td>PID", "<tr><td COLSPAN=10 height=50></td></tr><tr bgcolor=e0e0e0><td>PID", $cmd);


    echo '<table width=900 align=middle border=0><tr><td>';
    echo $cmd;
    echo '</td></tr></table>';
}

if (PHP_OS == 'WINNT') {
    // echo PHP_OS;
    $output = null;
    $resultCode = null;
    $cmd = "tasklist";
    if (isset($_GET['pid']) && $_GET['pid']) {
        $pid = $_GET['pid'];
        $cmd .= '/FI "PID eq ' . $pid . '"';
    }
    exec($cmd, $output, $resultCode);
    echo "<pre>";
    echo "<form><input type='number' name='pid' /> <input type='submit'></form>";
    for ($i = 0; $i < sizeof($output); $i++) {
        if ($i == 2) {
            $output[$i] = str_replace('=', " ", $output[$i]);
        }
        echo $output[$i];

        echo "<br>";
    }
    echo "</pre>";
}
