
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes</title>
    
</head>
<body>
<a href="{{ route('home') }}"><button class="btn btn-danger">Voltar</button></a>
    <h1>Dados do Teste</h1>
    
    @php
    $i = 1; 
@endphp

@foreach($result as $item)
    <h2>Questão {{ $i }}: {{ $item->descricao }}</h2>
    <div style="display:grid;">
        <label for="">A) {{ $item->textoA }}</label>
        <label for="">B) {{ $item->textoB }}</label>
        <label for="">C) {{ $item->textoC }}</label>
        <label for="">D) {{ $item->TextoD }}</label>
        <label for="">E) {{ $item->TextoE }}</label>
    </div>
    @php
        $i++; // Incrementa $i para a próxima questão
    @endphp
@endforeach
    
</body>
</html>