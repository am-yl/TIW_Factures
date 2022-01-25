<div class="container">
    <div class="row">
        <form method="POST" class="pb-4" action="/?data=facture&action=add">
            <h2>Créer une facture</h2>
            <div class="form-group py-2">
                <label class="form-label" for="nom-facture">Nom de la facture </label>
                <input class="form-control" type="text" id="nom-facture" name="nom-facture" placeholder="Inscrivez le nom de la facture" required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="cid">Client</label>
                <select class="form-control" type="text" id="cid" name="cid" aria-label="" required>
                    <option selected>Selectionner un client</option>
                    <?php foreach($clients as $client) : ?>
                    <option value="<?=$client['id']?>"><?=$client['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    
        <h2>Toutes les factures</h2>
        <table class="table table-hover pt-2 col-sm-10 col-md-8 ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Client</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($factures as $facture) : 
                    $client=get_client($facture['client_id']);?>
                <tr>
                    <td>
                        <?= $facture['name']?>
                    </td>
                    <td>
                        <?= $client['name'] ?>
                    </td>
                    <td>
                        <a href="/?data=facture&action=view&fid=<?= $facture['id'] ?>" class="btn btn-primary">voir</a>
                        <a href="/?data=facture&action=delete&fid=<?= $facture['id'] ?>" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>