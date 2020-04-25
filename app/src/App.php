<?php

namespace TKuni\TwitterOAuthTokenResolver;

use Abraham\TwitterOAuth\TwitterOAuth;

class App
{
    public function run()
    {
        $apiKey = $this->input('Consumer API key');
        if (empty($apiKey)) exit(0);
        $apiSecretKey = $this->input('Consumer API secret key');
        if (empty($apiKey)) exit(0);

        $this->output('');

        $connection       = new TwitterOAuth($apiKey, $apiSecretKey);
        $result           = $connection->oauth("oauth/request_token", [
            "oauth_callback" => "oob"
        ]);
        $oauthToken       = $result['oauth_token'];
        $oauthTokenSecret = $result['oauth_token_secret'];
        $url              = "https://api.twitter.com/oauth/authorize?oauth_token=${oauthToken}";
        $this->output('You need to get PIN code by access this URL: ' . $url);
        $pinCode = $this->input('PIN code');
        if (empty($apiKey)) exit(0);

        $this->output('');

        $connection   = new TwitterOAuth($apiKey, $apiSecretKey, $oauthToken, $oauthTokenSecret);
        $access_token = $connection->oauth("oauth/access_token", [
            "oauth_verifier" => $pinCode
        ]);

        $this->output('User: ' . $access_token['screen_name']);
        $this->output('Access token: ' . $access_token['oauth_token']);
        $this->output('Access token secret: ' . $access_token['oauth_token_secret']);
    }

    private function input(string $label)
    {
        echo $label . ': ';
        return trim(fgets(STDIN));
    }

    private function output(string $msg)
    {
        echo $msg . "\n";
    }
}