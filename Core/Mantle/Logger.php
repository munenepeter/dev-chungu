<?php

namespace Chungu\Core\Mantle;

use Chungu\Core\Mantle\Request;
use Chungu\Core\Mantle\Cache;

class Logger {

    protected static $logBuffer = [];
    protected static $cachedUserInfo = null;

    public static function log(string $level, string $msg) {
        $userinfo = self::getUserInfo();
        $log = [
            'id' => md5(time()),
            'level' => $level,
            'time' => date("D, d M Y H:i:s"),
            "more" => [
                "method" => Request::method(),
                "uri" => '/' . Request::uri(),
                "remote_addr" => $_SERVER['REMOTE_ADDR'],
                "region" => $userinfo->region_name ?? "N/A",
                "country" => $userinfo->country_name ?? "N/A",
                "city" => $userinfo->city ?? "N/A",
                "provider" => $userinfo->organisation ?? "N/A",
                "time_zone" => $userinfo->time_zone ?? "N/A",
                "agent" => $_SERVER['HTTP_USER_AGENT']
            ],
            "description" => nl2br($msg)
        ];
        self::$logBuffer[] = json_encode($log);
        self::writeBufferToFile();
    }

    protected static function getUserInfo() {
        if (self::$cachedUserInfo === null) {
            // Check if cached user info exists
            $cachedUserInfo = Cache::get('user_info');

            if ($cachedUserInfo !== null) {
                self::$cachedUserInfo = json_decode($cachedUserInfo);
            } else {
                // Fetch user info from API
                $response = @file_get_contents(
                    'http://ip-api.io/json/' . $_SERVER['REMOTE_ADDR'],
                    false,
                    stream_context_create([
                        'http' => [
                            'ignore_errors' => true,
                        ],
                    ])
                );

                // Cache user info for future requests
                self::$cachedUserInfo = json_decode($response);
                Cache::put('user_info', $response, 3600); // Cache for 1 hour

            }
        }

        return self::$cachedUserInfo;
    }

    protected static function writeBufferToFile() {
        $logFile = __DIR__ . "/Logs/logs.log";

        if (!file_exists($logFile)) {
            mkdir(__DIR__ . "/Logs");
        }

        $file = fopen($logFile, 'a+', 1);
        fwrite($file, implode(PHP_EOL, self::$logBuffer) . PHP_EOL);
        fclose($file);

        // Clear the buffer after writing
        self::$logBuffer = [];
    }

    public static function flush() {
        if (!empty(self::$logBuffer)) {
            self::writeBufferToFile();
        }
    }
}
