@extends('admin::layouts.master')

@section('content')

    <h2>Projetos</h2>
    @if($projects->count() == 0)
        <h2 class="btn-lg label-warning">Você não tem nenhum projeto cadastrado!</h2>
        <a  href="{{ route('gallery.add') }}"><button class="btn btn-info"><i class="fa fa-plus"></i> Novo Projeto</button></a>
    @endif
    @foreach($galleries as $gallery)
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="img-responsive" style="width: auto; height:300px !important" src="{{ asset('img/gallery/'.$gallery->id.'.'.$gallery->img_ext) }}"
                     alt=""/>

                <div class="caption" style="word-wrap: break-word;">
                    <h4 class="list-group-item-heading">
                        {{ $gallery->name }}</h4>

                    <p class="group inner list-group-item-text">
                        {{ $gallery->body }}</p>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="btn-group">
                                <a href="{{ route('gallery.edit',$gallery->id) }}"><button type="button" class="btn btn-default">Editar</button></a>
                                <a onclick="click_del('{{ route('gallery.delete',$gallery->id) }}')"><button type="button" class="btn btn-danger">Excluir</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop