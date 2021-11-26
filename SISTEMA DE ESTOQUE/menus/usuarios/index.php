<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/usuario.class.php';

echo $head;
echo $header;

echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
     
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li class="active">Usuários</li>
      </ol>
      </h1>
    </section>
    <section class="content">
    ';
    require '../../layout/alert.php';
    echo '
      <div class="row">
        <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista de Usuários</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                
              <thead>
              <tr role="row">
                <th>#</th>
                <th aria-label="Nome" style="width: 182px;">Nome</th>
          
                <th>Edit</th>
              </tr>
              </thead>
              <tbody>
              ';

               $resp = $usuario->index();
               $resps = json_decode($resp, true);
               
               foreach ($resps as $row) {
                 
                if(isset($row['ID']) != NULL){
                echo '<tr>';
                echo '<td>'.$row['ID'].'</td>';
                echo '<td>'.$row['USERNAME'].'</td>';

                echo '<td>';
                
                echo'<a href="editusuario.php?q='.$row['ID'].'"><button>Edit</button></a>';

                echo '</td>';
                echo '</tr>';
              }

               }

        echo '</tbody>
        </table>
            </div>
            <div class="box-footer clearfix no-border">
             <a href="Adicionarusuario.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Usuários</a>
            </div>
          </div>
   
';
echo '</div>';
echo '</section>';
      
       
    

echo '</div>';

echo $javascript;
?>