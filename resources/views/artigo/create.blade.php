@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary ">
                <div class="card-header">{{ __('Criar Artigo') }}</div>

                {!! Form::open(['url' => '/artigo/create']) !!}
                <div class="card-body col-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

<div class="row col-12">
    <div class="form-group col-12">
        {{ Form::label('titulo', 'Titulo:') }}
        {{ Form::text('titulo', '', ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-12">
        {{ Form::label('categoria', 'Selecione categoria:') }}
        {{ Form::select('categoria_id', $categorias ,['class' => 'form-select']) }}
    </div>

    <div class="form-group col-12">
        {{ Form::label('texto', 'Texto:') }}
        {{ Form::textarea('texto', '', ['class' => 'form-control']) }}
    </div>

    
    
    <div class="row col-12">
        <div class="form-group col">
            {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
            <a href="{{ url('artigo') }}" class="btn btn-danger ">Voltar</a>

            
        </div>
    </div>



</div>

</div>
</div>
{{-- card card-primary --}}
</div>
</div>
</div>
@endsection