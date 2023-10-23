<?php


use Chungu\Core\Mantle\App;
use Chungu\Core\Mantle\Auth;
use Chungu\Core\Mantle\Logger;
use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Session;

define("BASE_URL",  sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']
));

/**
 * checkCreateView
 * 
 * Create a view for route if it does not exist
 * 
 * @param string $view view to be created
 * 
 * @return void
 */
function checkView(string $filename) {
    if (!file_exists($filename)) {

        if (ENV === 'production') {
            throw new \Exception("The requested view is missing", 404);
        }
        fopen("$filename", 'a');

        $data = "<?php include_once 'base.view.php';?><div class=\"grid place-items-center h-screen\">
       Created {$filename}'s view; please edit</div>";

        file_put_contents($filename, $data);
    }
}

/**
 * View
 * 
 * Loads a specified file along with its data
 * 
 * @param string $filename Page to displayed
 * @param array $data Data to be passed along
 * 
 * @return bool view
 */
function view(string $filename, array $data = []) {
    extract($data);
    $filename = "Views/{$filename}.view.php";

    checkView($filename);

    return require_once $filename;
}

/**
 * Redirect
 * 
 * Redirects to a give page
 * 
 * @param string $path Page to be redirected to
 */
function redirect(string $path) {
    header("location:{$path}");
}
/**
 * Abort
 * 
 * Kills the execution of the script & diplays error page
 * 
 * @param string $message The exception/error msg
 * @param int $code Status code passed with the exception
 * 
 * @return string view
 */
function abort($message, $code) {

    if ($code === 0) {
        $code = 500;
        http_response_code(500);
    } elseif (is_string($code)) {
        http_response_code(500);
    } elseif ($code === "") {
        $code =  substr($message, -5, strpos($message, '!'));
        http_response_code(500);
    } else {
        http_response_code($code);
    }
    logger("Error", $message);
    view('error', [
        'code' => $code,
        'message' => $message
    ]);
    exit;
}

function redirectback($data = []) {
    extract($data);
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
        redirect($_SERVER['HTTP_REFERER']);
    }
    $back = (new Request)->get('back');
    if (!$back) {
        redirect('/');
    }
    redirect($back);
}

function request_uri() {
    return Request::uri();
}

function wp_strip_all_tags($string, $remove_breaks = false) {
    $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
    $string = strip_tags($string);

    if ($remove_breaks) {
        $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
    }

    return trim($string);
}

function lilog(string $msg) {

    $msg = "On " . date('Y-m-d H:i:s', time()) . " " . $msg . PHP_EOL;
    $logFile =  __DIR__ . "/../static/files/li.log";

    $file = fopen($logFile, 'a+', 1);
    fwrite($file, $msg);
    fclose($file);
}
function getLogs() {
    $log = "static/files/li.log";

    if (!file_exists($log)) {
        echo "File Does not exist, call the developer!";
        exit;
    }
    $data = file_get_contents($log);

    $logs = explode(PHP_EOL, $data);

    array_pop($logs);

    return array_reverse($logs);
}

function getRandColor() {
    $rgbColor = [];
    foreach (['r', 'g', 'b'] as $color) {
        //Generate a random number between 0 and 255.
        $rgbColor[$color] = mt_rand(0, 255);
    }
    $colorCode = implode(",", $rgbColor);
    return "rgb($colorCode)";
}
/**
 * subtract_date
 * 
 * Subtracts a number of days from a date
 * 
 * @param  string $days_to_subtract no of days to subtract
 * 
 * @return string the date after subtracting
 */

function subtract_date($days_to_subtract) {
    $date = date_create(date('Y-m-d H:i:s', time()));
    date_sub($date, date_interval_create_from_date_string("2 days"));
    return date_format($date, 'Y-m-d H:i:s');
}

function slug($string) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}


function isAdmin() {
    if (auth() && auth()->role === 'admin') {
        return true;
    }
    return false;
}
/**
 * Auth Helper
 * 
 * Returns the status of login & an object helper
 * 
 * @return bool|object Session
 */
function auth() {

    if (Session::get('loggedIn') === NULL || Session::get('loggedIn') === false) {
        return false;
    }

    Session::get('loggedIn');
    $class = new class {

        public $username;
        public $email;
        public $role;
        public $id;

        public function __construct() {

            $this->username = Session::get('user') ?? null;
            $this->email = Session::get('email') ?? null;
            $this->id = Session::get('user_id') ?? null;
            $this->role = Session::get('role') ?? null;
        }
        public function __get($name) {
            return $name;
        }
        public function __set($name, $value) {
            $this->$name = $value;
        }
        public function logout($user) {
            Auth::logout($user);
            redirect('/');
        }
    };

    return $class;
}
/**
 * plural
 * This returns the plural version of common english words
 * --from stackoverflow
 * 
 * @param string $phrase the word to be pluralised
 * @param int $value 
 * 
 * @return string plural 
 */
function plural($phrase, $value) {
    $plural = '';
    if ($value > 1) {
        for ($i = 0; $i < strlen($phrase); $i++) {
            if ($i == strlen($phrase) - 1) {
                $plural .= ($phrase[$i] == 'y') ? 'ies' : (($phrase[$i] == 's' || $phrase[$i] == 'x' || $phrase[$i] == 'z' || $phrase[$i] == 'ch' || $phrase[$i] == 'sh') ? $phrase[$i] . 'es' : $phrase[$i] . 's');
            } else {
                $plural .= $phrase[$i];
            }
        }
        return $plural;
    }
    return $phrase;
}

/**
 * Delete a file
 */
function delete_file(string $path) {
    if (!unlink($path)) {
        logger("Error", "File cannot be deleted due to an error");
        return false;
    } else {
        logger("Info", "A File has been deleted");
        return true;
    }
}

function is_in_Session($key, $session) {
    if (!isset($_SESSION[$session])) {
        return false;
    }
    return in_array($key, Session::get($session));
}
function downloadFile($dir, $file) {

    if (file_exists($file . "uuj")) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        flush(); // Flush system output buffer
        readfile($dir . $file);
        die();
    } else {
        http_response_code(404);
        die();
    }
}


/**
 * dd
 * 
 * dump the results & die
 * 
 * @param mixed $data view to be created
 * 
 * @return string
 */

function dd($var) {
    //to do
    // debug_print_backtrace();

    ini_set("highlight.keyword", "#a50000;  font-weight: bolder");
    ini_set("highlight.string", "#5825b6; font-weight: lighter; ");

    ob_start();
    highlight_string("<?php\n" . var_export($var, true) . "?>");
    $highlighted_output = ob_get_clean();

    $highlighted_output = str_replace(["&lt;?php", "?&gt;"], '', $highlighted_output);

    echo $highlighted_output;
    die();
}
/**
 * url helper
 * 
 * @return string url in relation to where it is called
 * 
 * from https://stackoverflow.com/questions/2820723/how-do-i-get-the-base-url-with-php
 */
function url() {
    if (!is_dev()) {
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    } else {
        return sprintf(
            "%s://%s:%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
             $_SERVER['SERVER_PORT'],
            $_SERVER['REQUEST_URI']
        );
    }
}

function notify($message) {
    echo '<script type="text/javascript">',
    "notify('$message');",
    '</script>';
}
function format_date($date) {
    return date("jS M Y ", strtotime($date));
}

function time_ago($datetime, $full = false) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
/**
 * asset helper
 * 
 * @param $dir director to be returned in respect to the static dir
 * 
 * @return string Path to the requested resource
 */
function asset($dir) {
    if(is_dev()){
        echo BASE_URL.":".$_SERVER['SERVER_PORT']. "/static/$dir";
    }else{
        echo BASE_URL . "/static/$dir";
    }
}
function get_perc($total, $number) {
    if ($total > 0) {
        return round(($number * 100) / $total, 2);
    } else {
        return 0;
    }
}

function logger(string $level, string $message) {
    Logger::log($level, $message);
}

function request(string $key) {
    return htmlspecialchars(trim($_REQUEST[$key])) ?? NULL;
}

function get_notifications() {
    if (empty(Session::get("notifications"))) {
        return [];
    }
    return Session::get("notifications");
}
function delete_notifications() {
    return Session::unset("notifications");
}
function session_get($value) {
    return Session::get($value);
}



function is_dev() {
    if (ENV === 'development') {
        return true;
    } elseif (ENV === 'production') {
        return false;
    }
}

/**
 * singularize
 * This returns the singular version of common english words
 * --from https://www.kavoir.com/2011/04/php-class-converting-plural-to-singular-or-vice-versa-in-english.html
 * 
 * @param string $phrase the word to be pluralised
 * @param int $value 
 * 
 * @return string plural 
 */

function singularize($word) {
    $singular = array(
        '/(quiz)zes$/i' => '\1',
        '/(matr)ices$/i' => '\1ix',
        '/(vert|ind)ices$/i' => '\1ex',
        '/^(ox)en/i' => '\1',
        '/(alias|status)es$/i' => '\1',
        '/([octop|vir])i$/i' => '\1us',
        '/(cris|ax|test)es$/i' => '\1is',
        '/(shoe)s$/i' => '\1',
        '/(o)es$/i' => '\1',
        '/(bus)es$/i' => '\1',
        '/([m|l])ice$/i' => '\1ouse',
        '/(x|ch|ss|sh)es$/i' => '\1',
        '/(m)ovies$/i' => '\1ovie',
        '/(s)eries$/i' => '\1eries',
        '/([^aeiouy]|qu)ies$/i' => '\1y',
        '/([lr])ves$/i' => '\1f',
        '/(tive)s$/i' => '\1',
        '/(hive)s$/i' => '\1',
        '/([^f])ves$/i' => '\1fe',
        '/(^analy)ses$/i' => '\1sis',
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
        '/([ti])a$/i' => '\1um',
        '/(n)ews$/i' => '\1ews',
        '/s$/i' => '',
    );

    $uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

    $irregular = array(
        'person' => 'people',
        'man' => 'men',
        'child' => 'children',
        'sex' => 'sexes',
        'move' => 'moves'
    );

    $lowercased_word = strtolower($word);
    foreach ($uncountable as $_uncountable) {
        if (substr($lowercased_word, (-1 * strlen($_uncountable))) == $_uncountable) {
            return $word;
        }
    }

    foreach ($irregular as $_plural => $_singular) {
        if (preg_match('/(' . $_singular . ')$/i', $word, $arr)) {
            return preg_replace('/(' . $_singular . ')$/i', substr($arr[0], 0, 1) . substr($_plural, 1), $word);
        }
    }

    foreach ($singular as $rule => $replacement) {
        if (preg_match($rule, $word)) {
            return preg_replace($rule, $replacement, $word);
        }
    }

    return $word;
}
function truncate($text, $limit) {
    return mb_strlen($text, 'UTF-8') > $limit ? mb_substr($text, 0, $limit, 'UTF-8') . "…" : $text;
}


function class_basename($class) {
    $class = is_object($class) ? get_class($class) : $class;
    return basename(str_replace('\\', '/', $class));
}

function build_table($array) {
    // start table
    $html = "<table class=\"w-full text-sm text-left text-gray-500 dark:text-gray-400\">";
    // header row
    $html .= "<thead class=\"sticky top-0  text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400\">";
    $html .= '<tr>';
    foreach ($array[0] as $key => $value) {
        $html .= '<th  scope="col" class="sticky top-0  px-6 py-3" >' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';
    $html .= "</thead>";
    // data rows
    $html .= ' <tbody class="overflow-y-auto">';
    foreach ($array as $key => $value) {
        $html .= '<tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">';
        foreach ($value as $key2 => $value2) {
            $html .= '<td class="px-6 py-4">' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= ' </tbody>';
    // finish table and return it

    $html .= '</table>';

    return $html;
}
