<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Ajouter une Categorie</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=postAddCategorie" method="post" class="form-incription">
                <input type="text" name="libelleCate" class="form-inscription-input" placeholder="libelle">
                <textarea name="descCate" class="form-text-area" cols="30" rows="10" placeholder="Description"></textarea>
                <input type="file" name="pictureCate" class="form-inscription-profile-picture">
                <input type="submit" value="Ajouter" name="add" class="bouton-sup">
            </form>
        </div>
    </div>
</div>