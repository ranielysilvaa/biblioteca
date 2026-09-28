<?php
require_once __DIR__ . "/../../templates/_cabecalho.php";
require_once __DIR__ . "/../../models/categoria.php";

$resultado = Categoria::listar();

?>

<main class="container-centraliza">
    <a href="/biblioteca/views/categoria/cadastro_categoria.php" class="link-btn">Adicionar Categoria</a>
    <table>
        <tr>
            <th>Nome da Categoria</th>
            <th colspan="2">Opções</th>
        </tr>

        <?php foreach($resultado as $categoria): ?>
            <tr>
                <td><?= $categoria['nome'] ?></td>
<<<<<<< HEAD
                <td><a href="/biblioteca/views/categoria/editar_categoria.php?id=<?=$categoria["id_categoria"]?>">Editar</a></td>
                <td><a href="/biblioteca/controllers/categoria_del_controller.php?id=<?=$categoria["id_categoria"]?>">Deletar</a></td>
=======
                <td><a href="/biblioteca/views/categoria/editar_categoria.php?id=<?= $categoria['id_categoria'] ?>">Editar</a></td>
                <td><a href="/biblioteca/controllers/categoria_del_controller.php?id=<?= $categoria['id_categoria'] ?>" onclick="return confirm('Tem certeza que deseja deletar esta categoria?')">Deletar</a></td>
>>>>>>> 870c52ef65851ed55589e4f32f998947f38331e0
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php
require_once __DIR__ . "/../../templates/_rodape.php";
?>