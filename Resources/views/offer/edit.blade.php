@extends('admin::layouts.master')

@section('content')

    <h2>Editar Oferta</h2>
    {!! Form::model($offer, ['route' => ['offer.post_edit', $offer->id],'files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('admin::forms.offers')
@stop