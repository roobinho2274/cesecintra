<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de professores</title>
    </head>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/Professor.css" >
    <body>
	
		<div class = "container ">
            <h2 class="text-center strong mt-2 mb-2">Professores</h2>
            <form class="text-center mt-3 bg-danger p-2 ">
                 <input type="submit" class="mt-5 btn btn-secondary btn-block strong" value="Cadastrar novo Professor" formaction="CadastraProf.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block strong" value="Consultar os Professores" formaction="listaProfessor.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block strong" value="Alterar os dados dos Professores" formaction="alteraProf.php"/><br><br>
                 <input type="submit" class="btn btn-secondary btn-block strong" value="Deletar Professor" formaction="#"/><br><br>
				 
				 <a class="btn btn-secondary text-light strong" href="../paginaInicialAdm.php"> Voltar</a>
            </form>
			
            <script src="../js/jquery-3.3.1.slim.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </div>
		
    </body>
</html>
