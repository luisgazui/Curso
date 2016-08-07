<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Aula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aula', 'Aula:') !!}
    {!! Form::number('aula', null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion', 'Seccion:') !!}
    {!! Form::text('seccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricula', 'Matricula:') !!}
    {!! Form::number('matricula', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('curso1s.index') !!}" class="btn btn-default">Cancel</a>
</div>
