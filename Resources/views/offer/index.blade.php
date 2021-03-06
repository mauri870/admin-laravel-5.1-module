@extends('admin::layouts.master')

@section('content')

    <h2>Ofertas Cadastradas</h2>
    @if($offers->count() == 0)
        <h2 class="btn-lg label-warning">Você não tem nenhuma oferta cadastrada!</h2>
        <a  href="{{ route('offer.add') }}"><button class="btn btn-info"><i class="fa fa-plus"></i> Nova Oferta</button></a>
    @endif
    @foreach($offers as $offer)
    <div class="item  col-xs-4 col-lg-4">
        <div class="thumbnail">
            <img class="img-responsive" style="width: auto; height:300px !important" src="{{ asset('img/offers/'.$offer->id.'.'.$offer->img_ext) }}"
                 alt=""/>

            <div class="caption" style="word-wrap: break-word;">
                <h4 class="list-group-item-heading">
                    {{ $offer->name }}</h4>

                <p class="group inner list-group-item-text">
                    {{ $offer->body }}</p>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <p class="lead" style="color: red;">
                            <s class="text-left">
                                @if($offer->base_value)
                                R${{ $offer->base_value }}
                                @endif
                            </s>
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-12 text-center">
                        <p class="lead" style="font-size:30px;color: green">
                            @if($offer->promo_value)
                                R${{ $offer->promo_value }}
                            @endif
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="btn-group">
                            <a href="{{ route('offer.edit',$offer->id) }}"><button type="button" class="btn btn-default">Editar</button></a>
                            <a onclick="click_del('{{ route('offer.delete',$offer->id) }}')"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@stop