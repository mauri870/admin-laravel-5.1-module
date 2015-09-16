@extends('admin::layouts.master')

@section('content')

    <h2>Editar Projeto</h2>
    {!! Form::model($gallery, ['route' => ['gallery.post_edit', $gallery->id],'files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('admin::forms.gallery')
@stop