<?php

// Create a constant to store your Slack URL 
define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/x/t/z');

// Make your message 
$username = "OCADbot";
$messageText = "";
$iconEmoji = ":robot:";

$attachments = array([
        'fallback'      => 'fallback',
        'pretext'       => 'pretext',
        'color'         => '#ff6600',
        'fields'        => array(
                [
                        'title' => 'Title',
                        'value' => 'value',
                        'short' => true
                ],
                [
                        'title' => 'Title2',
                        'value' => 'value2',
                        'short' => false
                ]
        )
]);

$message = array('payload' => json_encode(array(
        'username'      => $username,
        'text'          => $messageText,
        'icon_emoji'    => $iconEmoji,
        'attachments'   => $attachments
)));

// Use curl to send your message 
$c = curl_init(SLACK_WEBHOOK);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_POSTFIELDS, $message);
curl_exec($c);
curl_close($c);
