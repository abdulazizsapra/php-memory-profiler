<?php

/**
 * name: php-memory-profiler
 * author: abdulazizsapra
 * terminal cmds used: top, tasklist  
 * global variables: PHP_OS
 */

/** Linux Compatibility | Start
 */

if (PHP_OS == 'Linux') {
    echo "<center>";
    //  Onload this cmd runs and shows all the processes by default.
    $cmd = shell_exec('/usr/bin/top -b -n1');


    /** Search Functionality | Start
     */

    if (isset($_GET['pid']) && $_GET['pid']) {
        $pid = $_GET['pid'];
        $cmd = shell_exec('/usr/bin/top -p ' . $pid . ' -b -n1');
    }

    /** Search Functionality | End
     */


    /** Format the cmd output | Start
     */
    $cmd = str_replace("      ", " ", $cmd);
    $cmd = str_replace("     ", " ", $cmd);
    $cmd = str_replace("    ", " ", $cmd);
    $cmd = str_replace("   ", " ", $cmd);
    $cmd = str_replace("  ", " ", $cmd);
    $cmd = str_replace(" ", "</td><td>", $cmd);
    $cmd = str_replace("\n", "</td></tr><tr><td>", $cmd);
    $cmd = str_replace("<tr><td></td><td>", "<tr><td>", $cmd);
    $cmd = str_replace("<tr><td>PID", "<tr><td COLSPAN=10 height=50></td></tr><tr bgcolor=e0e0e0><td>PID", $cmd);
    /** Format the cmd output | End
     */

    /** Render Display | Start
     */
    echo "<form>Please Enter Process ID to see details: <input type='number' name='pid' /> <input type='submit'></form>";
    echo '<table width=900 align=middle border=0><tr><td>';
    echo $cmd;
    echo '</td></tr></table>';
    /** Render Display | End
     */
}
/** Linux Compatibility | End
 */

/** Windows Compatibility | Start
 */
if (PHP_OS == 'WINNT') {
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
/** Windows Compatibility | End
 */
