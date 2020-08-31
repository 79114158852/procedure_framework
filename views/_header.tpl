<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $vars['sys_page_meta_desc']; ?>">
<meta name="keywords" content="<?php echo $vars['sys_page_meta_keys']; ?>">
<base href="<?php echo web_get_url();?>">
<title><?php echo $vars['sys_page_title']; ?></title>
<link rel="stylesheet" href="/assets/font/css/all.min.css?v=1">
<link rel="stylesheet" type="text/css" href="/assets/css/general.css?v=<?php echo time(); ?>"/>
<link rel="stylesheet" type="text/css" href="/assets/css/admin.css?v=<?php echo time(); ?>"/>
<link rel="stylesheet" type="text/css" href="/assets/css/responsive.css?v=<?php echo time(); ?>"/>
<?php template_add_css($vars); ?>
</head>
<body>
<div class="wrapper">