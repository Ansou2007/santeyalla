
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Boulangerie</title>

<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/feather/feather.css')}}">

<link rel="stylesheet" href="{{asset('plugins/icons/flags/flags.css')}}">

<link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
<link href="{{asset('plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

</head>
<body>

<div class="main-wrapper">

    
@include('components.head')
@include('components.sidebar')



<!--debut content-->
<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-sm-12">

@yield('contenu')

</div>
</div>
</div>
</div>
<!--Fin Content-->

@include('components.footer')