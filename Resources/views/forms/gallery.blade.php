<div class="form-group">
    {!! Form::label('name','Nome:',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('name',null,['placeholder'=>'Nome do Projeto','class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('body','Descrição',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('body',null,['placeholder'=>'Breve descrição do projeto','class'=>'form-control']) !!}
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