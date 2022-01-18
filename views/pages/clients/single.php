<div class="container">
    <div class="row">
        <form method="POST" class="pb-4" action="/?data=client&action=edit">
            <h1>Ici vous pouvez gérer la page de <span class="text-decoration-underline"><?=$client['name'] ?></span></h1>
            <div class="form-groupe pb-2">
                <label class="form-label" for="client-name">Modifier le nom du client :</label>
                <input type="text" class="form-control"  required name="client_name" id="client_name" value="<?=$client['name'] ?>">
            </div>
            <input type="hidden" name="cid" value="<?= $client['id'] ?>">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="/?data=client&action=list" class="btn btn-dark">Retourner à la liste des clients</a>
        </form>

        <h2>Factures de <?=$client['name'] ?></h2>
        <table class="table table-hover pt-2 col-sm-10 col-md-8 ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($factures as $facture) : ?>
                <tr>
                    <td>
                        <?= $facture['name']?>
                    </td>
                    <td>
                        <a href="/?data=facture&action=view&fid=<?= $facture['id'] ?>" class="btn btn-primary">voir</a>
                        <a href="/?data=facture&action=delete&fid=<?= $facture['id'] ?>&cid=<?= $client['id'] ?>" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>

    </div>
</div>