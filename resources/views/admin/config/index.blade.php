@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <h1>Confiurações</h1>
@stop

@section('content')

<section class="content-header">
    <h1>
        Configurações
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="#">
              Configurações
          </a>
      </li>
      <li class="active">Listar</li>
    </ol>
</section>

@if (session('status')) 
      <section class="content-header">
        <div class="alert alert-{{ session('status') }}">
            {{ session('retornomensagem') }}
        </div>
      </section>
@endif

<section class="content">
    <div class="row">
        <div class="col-md-12">        
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-hover row-border">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Subtítulo</th>
                                <th>Biografia</th>
                                <th>Ações</th>                  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($config as $c)  
                            <tr>
                                <td>{{ $c->titulo }}</td>
                                <td>{{ $c->sub }}</td>
                                <td>{{ $c->biografia }}</td>
                                <td>
                                    <a class="btn btn-app no-margin" href="{{ route('admin.config.edit', $c->id) }}">
                                         <i class="fa fa-edit"></i> Editar
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