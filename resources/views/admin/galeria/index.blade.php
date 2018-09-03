@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <h1>Galeria</h1>
@stop

@section('content')

<section class="content-header">
    <h1>
        Obras
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="#">
              Produtos
          </a>
      </li>
      <li class="active">Listar</li>
    </ol>
            <a class="btn btn-block btn-primary btn-sm btn-adicionar" href="{{ url('admin/galeria/create') }}">
                <i class="far fa-image"></i>Adicionar
            </a>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">        
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover row-border">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Ações</th>                  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obras as $obra)  
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$obra->fotoObra->caminho)}}"
                                            style="width: 200px; height: 200px" 
                                            alt="Sem foto"> 
                                </td>
                                <td>{{ $obra->titulo }}</td>
                                <td>{{ $obra->descricao }}</td>
                                <td>
                                    <a class="btn btn-app no-margin" href="{{ route('admin.galeria.edit', $obra->id) }}">
                                         <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a class="btn btn-app no-margin" href="{{ route('admin.galeria.destroy', $obra->id) }}">
                                         <i class="fa fa-trash-o"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                            @endforeach                
                        </tbody>               
                    </table>    
                </div>
                <!-- /.box-body -->           
            </div>
        </div>
    <!-- /.box -->
    </div>
</div>
<!-- /.row -->
</section>

@stop