@extends('layouts.master')
@section('type','Médical')
@section('title','Ajouter un Malade')
@section('content')
    <malade-profile :malade='{{$malade}}'></malade-profile>
@endsection
