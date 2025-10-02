<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php 
    use App\Kipedreiro\Core\flash;
    $mensagemFlash = flash::get();
    if(isset($mensagemFlash)){
        foreach($mensagemFlash as $key => $value){
            if($key == 'tipo'){
                $tipo = $value == 'sucesso' ? 'alert-success' : 'alert-danger';
                echo "<div class='alert $tipo' role='alert'>";
            }else{
                echo $value;
                echo "</div>";
            }
        }
    }
    
