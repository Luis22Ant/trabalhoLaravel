<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tableTeste th{
            border:1px solid black;
        }
        #tableTeste td{
            border:1px solid black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Barra de navegação -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="col-md-6">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Criar teste    
</button>
      </li>
    </ul>
    </div>
    <div class="col-md-6" style="    display: flex;
    justify-content: end;">
    <ul class="navbar-nav">
      <li class="nav-item">
      <a href="{{ route('logout') }}"><button type="button" class="btn btn-danger">
 Logout    
</button></a>
      </li>
    </ul>
</div>

  </div>
</nav>
    



<div class="col-md-6" style="margin-top:7%;">
<table class="table" id="tableTeste">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th>ID</th>
            <th>Descrição</th>
            <th>Pontuação Mínima</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testes as $teste)
            <tr>
            <td>
            <form action="{{ route('teste.view', ['id' => $teste->id]) }}" method="GET">
    <a href="{{ route('teste.view', ['id' => $teste->id]) }}" id="visualizarTeste{{ $teste->id }}" style="color:black;">
        <i class="fas fa-eye"></i>
    </a>
</form>
           
                </td> 
                <td>
                <form action="{{ route('teste.delete', ['id' => $teste->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="border: none; background: none; color: black;">
        <i class="fas fa-trash"></i>
    </button>
</form>
           
                </td>
                
                <td>{{ $teste->id }}</td>
                <td>{{ $teste->descricao }}</td>
                <td>{{ $teste->pontuacao }}</td>
                <!-- Coluna para o botão "Adicionar Questão" -->
                <td>
                    <button type="button" class="btn btn-primary btn-adicionar-questao" data-toggle="modal" data-target="#modalAdicionarQuestao{{ $teste->id }}" data-teste-id="{{ $teste->id }}">
                        Adicionar Questão
                    </button>
                </td>    
                  
            </tr>

            <!-- Modal para adicionar questões -->
            <div class="modal fade" id="modalAdicionarQuestao{{ $teste->id }}" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarQuestaoLabel{{ $teste->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nova Questão</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('questao.store') }}" method="POST">
                            @csrf
                         
                            <input type="hidden" name="teste_id" id="teste_id" value="{{ $teste->id }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="pontuacao">Descrição da questão</label>
                                    <input type="text" name="descricao" class="form-control" id="descricao">
                                    <label for="pontuacao">Alternativa A</label>
                                    <input type="text" name="alterA" class="form-control" id="alterA">
                                    <label for="pontuacao">Alternativa B</label>
                                    <input type="text" name="alterB" class="form-control" id="alterA">
                                    <label for="pontuacao">Alternativa C</label>
                                    <input type="text" name="alterC" class="form-control" id="alterA">
                                    <label for="pontuacao">Alternativa D</label>
                                    <input type="text" name="alterD" class="form-control" id="alterA">
                                    <label for="pontuacao">Alternativa E</label>
                                    <input type="text" name="alterE" class="form-control" id="alterA">
                                    <label for="pontuacao">Resposta Correta</label>
                                    <input type="text" name="respCorreta" class="form-control" id="respCorreta">
                                    <label for="pontuacao">Valor da questão</label>
                                    <input type="text" name="valorQuestao" class="form-control" id="valorQuestao">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>

</div>


<!-- Modal de criação do teste -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salvar Teste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('teste.store') }}" method="POST">
      @csrf
      <div class="modal-body">
      <label for="pontuacao">Descrição</label>
    <input type="text" name="descricao" class="form-control" id="descricao">
    <label for="pontuacao">Pontuação mínima</label>
    <input type="text" name="pontuacao" class="form-control" id="pontuacao">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>













            
