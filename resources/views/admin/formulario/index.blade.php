@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <h1>Contato</h1>
@stop

@section('content')

<section class="content-header">
    <h1>
        Contato
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="#">
              Contato
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
                                <th>Nome do Contato</th>
                                <th>E-mail</th>
                                <th>Texto</th>
                                <th>Ações</th>                  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contatos as $c)  
                            <tr>
                                <td>{{$c->nome}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->texto}}</td>
                                <td>
                                   <a class="btn btn-app no-margin" href="{{ route('admin.formulario.destroy', $c->id) }}">
                                        <i class="fa fa-trash-o"></i> Excluir</a>
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