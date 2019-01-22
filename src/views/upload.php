<form method ="post" enctype="multipart/form-data">
    <label>Envoyer votre fichier</label>
    <input type="file" class="btn btn-primary" name="userfile">
    <br>

    <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
    <br>
    <h2><?=$data["_msg"]?></h2>
</form>