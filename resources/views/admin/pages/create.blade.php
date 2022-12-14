@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <h1>Nova Página</h1>
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
            <form action="{{ route('pages.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid   @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control bodyfield">{{ old('body') }}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Criar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/ea91lr07y6pj7gg66tgko222bokb1c4m9ftheg66750s0sl5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea.bodyfield',
            height: 300,
            menubar: false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists', 'emoticons'],
            toolbar: 'undo redo | fontsize bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | table | link image |bullist numlist | emoticons ',
            content_css: [
                '{{ asset('assets/css/content.css') }}'
            ],
            images_upload_url: '{{ route('imageupload') }}',
            images_upload_credentials: true,
            convert_urls: false

        });
    </script>
@endsection
