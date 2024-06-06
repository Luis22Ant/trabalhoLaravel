<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Criar teste    
</button>
<a href="{{ route('logout') }}">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    <button type="submit">Logout</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Pontuação Mínima</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testes as $teste)
            <tr>
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
                            <!-- Campo oculto para armazenar o ID do teste -->
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
                                <!-- Botão de envio do formulário -->
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>




<!-- Modal -->
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
    <label for="pontuacao">Pontuação</label>
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













            
