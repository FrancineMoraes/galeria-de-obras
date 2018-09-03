@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <h1>Galeria</h1>
@stop

@section('content')
<section class="content-header">
    <h1>
        <i class="far fa-image"></i> Obras
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-image"></i> Obras </a></li>
        <li class="active">Novo</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit</h3>
        </div>
        
        <div class="box-body">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{route('admin.galeria.store', $obra->id)}}" method="post" 
            enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="idtitulo"> Título </label>
                        <input type="text" id="idtitulo" required name="titulo" value="{{$obra->titulo}}" class="form-control">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box-body">
                            <div class="form-group">
                                <label for="caminho">Imagem da Obra</label>
                                <input type="file" id="caminho" name="caminho">
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="iddescricao"> Descrição </label>
                        <br>
                    <textarea rows="4" cols="40" id="iddescricao" name="descricao">{{$obra->descricao}}</textarea>
                    </div>
                </div>
            
                <div class="box-footer">
                    <div class="box-tools pull-right">
                        <a class="btn btn-app btn-flat" href="">
                            <i class="fa fa-reply"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-app bg-green btn-flat">
                            <i class="fa fa-save"></i> Salvar
                        </button>
                    </div>
                </div>

            </form>        
          </div>        
        </div>
      </div>
    </div>
</section>
@endsection
