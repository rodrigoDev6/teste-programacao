@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
        

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

<script>
    function ConfirmDelete() {
        return confirm('Tem certeza que deseja excluir este registro?');
    }
</script>

<a href="{{ URL::to('artigo/create') }}"><button type="button" class="btn btn-block btn-success btn-sm">Criar</button></a>

    <table class="table no-margin">
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Texto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

    @foreach ($artigos as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->titulo }}</td>
            <td>{{ $value->texto }}</td>
            <td><a href="{{ url('artigo/' . $value->id) }}"><button type="button" class="btn btn-block btn-primary btn-sm">Visualizar</button></a></td>
                <td><a href="{{ url('artigo/' . $value->id . '/edit') }}"><button type="button" class="btn btn-block btn-warning btn-sm">Editar</button></a></td>
                <td>
                    {{ Form::open(array('url' => 'artigo/' . $value->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Excluir', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>

        </tr>
    @endforeach

        </tbody>
    </table>

</div>
</div>
</div>
</div>
</div>
@endsection