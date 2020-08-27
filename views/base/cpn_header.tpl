<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{page->meta_desc}">
<meta name="keywords" content="{page->meta_keys}">
<base href="{base}">
<title>{page->title}</title>
<link rel="stylesheet" href="{assets}/font/css/all.min.css?v=1">
<link rel="stylesheet" type="text/css" href="{assets}/css/general.css?v={time}"/>
<link rel="stylesheet" type="text/css" href="{assets}/css/admin.css?v={time}"/>
<link rel="stylesheet" type="text/css" href="{assets}/css/responsive.css?v={time}"/>
{each page->css c}
</head>
<body>
<div class="wrapper">
<input type="hidden" id="root" value="{assets}">
