<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

<link href="https://fonts.googleapis.com/css?family=Wire+One" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Galeria de obras</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="topo">
                <h1 class="titulo">{{$config[0]->titulo}}</h1>
                <h3 class="sub">{{$config[0]->sub}}</h3>
                <hr>
            </div>
        </div>
        <div class="row">

            <div class="col-md-9">
                <h3 class="hh3">Galeria</h3>
                <br>
                @foreach($obras as $obra)
                    <div class="col-md-3">
                        <div class="card" style="width: 12rem;">
                            <img id="image" class="card-img-top" src="{{ asset('storage/'.$obra->fotoObra->caminho)}}" alt="Foto da Obra" 
                            >
                            <div class="card-body">
                                <h4 class="card-title">{{$obra->titulo}}</h4>
                                <p class="card-text">{{$obra->descricao}}</p>
                            </div>
                        </div>    
                    </div>
                @endforeach
            </div>

            <div class="col-md-1" id="linha-vertical"></div>

            <div class="col-md-2">
                <hr id="hr">
                <h3 class="hh3">Biografia</h3>
                <p class="text">{{$config[0]->biografia}}</p>
            </div>
            
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="col-md-12">
            <h3 class="hh3"> Contato </h3>
            <br>
            <form action="{{route('site.galeria.store')}}" method="post">
            {{ csrf_field() }}

                <div class="col-md-12">

                    <div class="form-group">
                            <label for="text" class="text"> Nome </label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                    <div class="form-group">
                        <label for="text" class="text"> Seu E-mail </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="text" class="text">Digite sua mensagem: </label>
                            <textarea class="form-control" name="texto" 
                            rows="6" required></textarea>
                    </div>

                    <div class="box-footer" id="save">
                        <div class="box-tools pull-right">
                            <button type="submit" class="btn btn-app bg-green btn-flat" id="save">
                                <i class="fa fa-save"></i> Salvar
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <footer>
                <div class="col-md-12">
                    
                </div>
            </footer>

        </div>
    </div>
</body>
</html>