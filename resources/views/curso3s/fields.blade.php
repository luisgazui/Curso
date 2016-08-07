<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Aula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Aula', 'Aula:') !!}
    {!! Form::number('Aula', null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Seccion', 'Seccion:') !!}
    {!! Form::text('Seccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('curso3s.index') !!}" class="btn btn-default">Cancel</a>
</div>
