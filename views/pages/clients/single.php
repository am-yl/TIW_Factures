<div class="container">
    <div class="row">
        <form method="POST" action="/?data=client&action=edit">
            <h1>Ici vous pouvez gérer la page de <span class="text-decoration-underline"><?=$client['name'] ?></span></h1>
            <div class="form-groupe pb-2">
                <label class="form-label" for="nom-client">Modifier le nom du client :</label>
                <input type="text" class="form-control"  required name="client_name" id="client_name" value="<?=$client['name'] ?>">
            </div>
            <input type="hidden" name="cid" value="<?= $client['id'] ?>">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="/?data=client&action=list" class="btn btn-dark">Retourner à la liste des clients</a>
        </form>
    </div>
</div>