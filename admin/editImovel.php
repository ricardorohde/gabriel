<?php
include('verifica.php');
include('cabecalho.php');
include('menu.php');
include('../conexao.php');
$idImovel = $_GET['id'];
$sql = "SELECT * FROM imoveis WHERE id = $idImovel";
$sql2 = "SELECT * FROM bairros";
$result2 = $mysqli->query($sql2);
$result = $mysqli->query($sql);
$dados = $result->fetch_assoc();
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                <small>Gabriel Chaves Imóveis</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Início</a></li>
                <li><a href="imoveis.php">Imoveis</a></li>
                <li class="active">Editando imóvel</li>
            </ol>
        </section>
        <section >

            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Editar imóvel</h3>
                            </div>
                            <div class="box-body">
                                <form action="crud.php" method='POST' enctype="multipart/form-data">
                                     <input type="hidden" name='action' value='edita'>
                                     <input type="hidden" name='tabela' value='imoveis'>
                                     <input type="hidden" name='id' value='<?= $dados['id'] ?>'>
                                    <div class="form-group col-md-12">
                                        <label>Título da publicação:</label>
                                        <input type="text" value="<?= $dados['titulo'] ?>" name='titulo' class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Descrição:</label>
                                        <textarea type="textarea" value="<?= $dados['descricao'] ?>" name='descricao' class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Bairro:</label>

                                        <select name="bairro_id" class="form-control select2" >
                                            <?php
                                            while ($bairros = $result2->fetch_assoc()) {
                                                if ($bairros['id'] == $dados['bairro_id']) {
                                                    ?>
                                                    <option selected value="<?= $bairros['id'] ?>"><?= $bairros['nome'] ?></option>
                                                <?php } else {
                                                    ?>
                                                    <option  value="<?= $bairros['id'] ?>"><?= $bairros['nome'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>


                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Latitude:</label>
                                        <input type="text" value="<?= $dados['latitude'] ?>" name='latitude' class="form-control">
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label>Longitude:</label>
                                        <input type="text" value="<?= $dados['longitude'] ?>" name='longitude' class='form-control'>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Destaque?</label>
                                        <?php
                                        if ($dados['destaque'] == 1) {
                                            ?>
                                            <input type="checkbox" checked name='destaque' value="1" >
                                            <?php
                                        } else {
                                            ?>
                                            <input type="checkbox" name='destaque' value="1" >
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group pull-right col-md-12">
                                        <label>Imagem atual</label>
                                        <img class='img img-responsive' style='max-height: 350px;' src="../images/imoveis/<?= $dados['imagem'] ?>" alt="" />
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Nova imagem</label>
                                        <input type="file" name='imagem' value='<?= $dados['imagem'] ?>' id='imagem' >
                                        <input type="hidden" name='imagemm' value='<?= $dados['imagem'] ?>' >
                                    </div>

                                    <div class="form-group col-md-12">

                                        <input type="submit" value="Salvar" name="submit" class="btn btn-twitter">
                                    </div>






                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
include('rodape.php');
?>