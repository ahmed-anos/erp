<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title' , 'DanaElawasme')</title>
 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@if(request()->is('page_with_table'))
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endif
     <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
     @livewireStyles
</head>
<style>
    .submenu-hover , .assets{
     display: none;
     position: fixed;
     width: 300px;
     background: #e1e1e1;
     top: 10%;
     right: 15%;
     list-style: none;
     margin: 0;
     padding: 0;
  }
  .assets{
    top: 40%;
  }
  .submenu-hover li ,.assets li{
    margin: 1px;
    padding: 0px
  }
  #accounts:hover .submenu-hover {
   display: block !important;
 } 
 </style>
<body class="app sidebar-mini">