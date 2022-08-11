<?php
	require __DIR__ . '/config.php';
	require __DIR__ . '/vendor/autoload.php';

	$options = array(
	'cluster' => $config['PUSHER_APP_CLUSTER'],
	'useTLS' => false, //set it to false for development
	);
	
	$pusher = new Pusher\Pusher(
	$config['PUSHER_APP_KEY'], //pusher app key
	$config['PUSHER_APP_SECRET'], //pusher app secret
	$config['PUSHER_APP_ID'], //pusher app id
	$options
	);

	$video = isset($_GET['video']) ? $_GET['video'] : rand(1,2).".mp4"; //fetch video url from database e.t.c
	$data['video'] = $video;
	$pusher->trigger('signage-channel', 'update-video', $data); //trigger event that will cause video to change in front-end
?>