<?php

$config['upload_path'] = './uploads/';
$config['allowed_types'] = '*'; //specific file types don't work. jpg|png fails when uploading a jpg or png file so we have to use *
$config['max_size'] = '500';
$config['max_width'] = '200';
$config['max_height'] = '200';
