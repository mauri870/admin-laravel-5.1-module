@extends('admin::layouts.master')

@section('content')

    <h2>Cadastro de ofertas</h2>

    {!! Form::open(['route'=>'admin.post_new_offer','files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('admin::forms.offers')
@stop