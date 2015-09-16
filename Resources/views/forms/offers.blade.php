<div class="form-group">
    {!! Form::label('name','Nome:',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('name',null,['placeholder'=>'Nome do produto em oferta','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('body','Descrição',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('body',null,['placeholder'=>'Escreva aqui a descrição e detalhes do produto','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('base_value','Preço normal (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            {!! Form::text('base_value',null,['placeholder'=>'Valor normal','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('promo_value','Preço em oferta (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            {!! Form::text('promo_value',null,['placeholder'=>'Valor com desconto','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('link_offerr','Link para a oferta (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
            {!! Form::text('link_offer',null,['placeholder'=>'Link para a oferta','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('image','Imagem',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
            {!! Form::file('image',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-blue btn-effect text-light-blue"><i
                    class="fa fa-paper-plane-o"></i> Enviar
        </button>
    </div>
</div>
{!! Form::close() !!}