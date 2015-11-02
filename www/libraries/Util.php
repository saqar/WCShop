<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Config.php";

class Util extends Config
{
    public static function send_mail($to, $subject, $message)
    {
        $headers = "From: " . self::$config["email"] . "\r\n" .
        "Reply-To: " . self::$config["email"] . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
        return @mail($to, $subject, $message, $headers);
    }

    public static function is_logged()
    {
        session_start();

        if(isset($_SESSION['username']) && isset($SESSION['password']))
            return true;
        else
            return false;
    }

    public static function login($username, $sha_pass)
    {
        session_start();

        if(!self::is_logged())
        {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $sha_pass;
        }
    }

    public static function logout()
    {
        session_start();
        session_destroy();
    }

    public static function generate_random_password($length)
    {
        $characters = "abcdefghijklmnopqrstuvwxyz0123456789";

        $pass = NULL;
        for ($i = 0; $i < $length; $i++)
        {
            $char = rand(0, strlen($characters) - 1);
            $pass .= $characters[$char];
        }

        return $pass;
    }

    public static function generate_hash($username, $password)
    {
        $password = sha1(strtoupper($username) . ":" . strtoupper($password));
        return strtoupper($password);
    }

    public static function render_time($time)
    {
        $days = floor($time / (60 * 60 * 24));
        $time -= $days * (60 * 60 * 24);

        $hours = floor($time / (60 * 60));
        $time -= $hours * (60 * 60);

        $minutes = floor($time / 60);
        $time -= $minutes * 60;

        $seconds = floor($time);

        $days = ($days == 0) ? '' : $days . ' d : ';
        $hours = ($hours == 0) ? '' : $hours . ' h : ';
        $minutes = ($minutes == 0) ? '' : $minutes . ' m : ';
        $seconds = ($seconds == 0) ? '' : $seconds . ' s';

        return $days . $hours . $minutes . $seconds;
    }

    public static function get_client_ip()
    {
        $ip_address = NULL;
        if (getenv('HTTP_CLIENT_IP'))
            $ip_address = getenv('HTTP_CLIENT_IP');

        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ip_address = getenv('HTTP_X_FORWARDED_FOR');

        else if(getenv('HTTP_X_FORWARDED'))
            $ip_address = getenv('HTTP_X_FORWARDED');

        else if(getenv('HTTP_FORWARDED_FOR'))
            $ip_address = getenv('HTTP_FORWARDED_FOR');

        else if(getenv('HTTP_FORWARDED'))
            $ip_address = getenv('HTTP_FORWARDED');

        else if(getenv('REMOTE_ADDR'))
            $ip_address = getenv('REMOTE_ADDR');

        else
            $ip_address = '0.0.0.0';

        return $ip_address;
    }
}
