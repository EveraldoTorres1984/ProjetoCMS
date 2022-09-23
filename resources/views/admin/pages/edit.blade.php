@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <h1>Editar Página</h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h4><i class="icon fas fa-ban">
                        Ocorreu um erro:</h4></i>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pages.update', ['page' => $page->id]) }}" class="form-horizontal" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">

                    <label for="" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ $page->title }}" class="form-control @error('title') is-invalid   @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <label for="" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control">{{$page->body}}</textarea>                       
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection