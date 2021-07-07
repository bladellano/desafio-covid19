<?php $v->layout("theme/_theme"); ?>

<h3 class="text-center"> <?= $title ?> </h3>

<?php if (count($resultado)) : ?>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">MÊS</th>
                <th scope="col">TOTAL</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($resultado as $mesAno => $qtd) : ?>
                <tr>
                    <th scope="row"><?= $mesAno ?></th>
                    <td><?= number_format($qtd, 0, ',', '.') ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

<?php else : ?>

    <div class="col-md-12">
        <div class="alert alert-danger">Nenhum registro encontrado.</div>
    </div>

<?php endif; ?>