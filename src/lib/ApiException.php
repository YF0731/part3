<?php

class ApiException extends Exception
{
}

function getHttpContent(string $url)
{
    try {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if (CURLE_OK !== $errno) {
            throw new ApiException($error, $errno);
        }
        return $body;
    } catch (Exception $e) {
        echo 'エラー発生：' . $e->getMessage() . PHP_EOL;
    } catch (ApiException $e) {
        echo 'APIエラー発生：' . $e->getMessage() . PHP_EOL;
    }
}

getHttpContent('ht://example.com'); // 例外を発生させるために意図的に間違ったURLを指定してます
