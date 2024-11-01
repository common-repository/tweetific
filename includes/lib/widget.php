<?php

$consumer_key = get_option('wpt_consumer_key');
$consumer_secret = get_option('wpt_consumer_secret');

$settings = array(
    'oauth_access_token'        => get_option('wpt_access_token'),
    'oauth_access_token_secret' => get_option('wpt_access_token_secret'),
    'consumer_key'              => get_option('wpt_consumer_key'),
    'consumer_secret'           => get_option('wpt_consumer_secret')
);

$url           = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield      = '?screen_name=spiritselite';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

$build_request = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

$tweets = json_decode($build_request, true);

// styling options
$wpt_animation_duration = get_option('wpt_animation_duration');
$wpt_colour_picker = get_option('wpt_colour_picker');
$wpt_font_size = get_option('wpt_font_size');
$wpt_font_colour_picker = get_option('wpt_font_colour_picker');
$placement = get_option('wpt_placement');

if (!empty($wpt_animation_duration)){
    $animation = 'animation-duration:' . $wpt_animation_duration . 's;';
} if(!empty($wpt_colour_picker)){
    $bg_color = 'background-color:'. $wpt_colour_picker . ';';
}
if(!empty($wpt_font_size)){
    $font_size = 'font-size:'. $wpt_font_size . 'px;';
}
if(!empty($wpt_font_colour_picker)){
    $font_color = 'color:'. $wpt_font_colour_picker . ';';
}
if(!empty($placement)){
    $wrap_placement = $placement . ':0;';
}
?>
<div class="ticker-wrap" style="<?php echo $wrap_placement . ' ' . $bg_color?>">
    <div class="ticker" style="<?php echo $animation?>">
        <?php foreach ($tweets as $tweet) : ?>
        <div class="ticker__item"><a style="<?php echo $font_size . $font_color?>" target="_blank" href="https://twitter.com/statuses/<?php echo $tweet['id']?>"> <?php echo $tweet['text']?></a></div>
        <?php endforeach; ?>
    </div>
</div>

