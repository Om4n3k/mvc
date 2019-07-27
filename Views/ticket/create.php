<div class="content-wrapper">
    <div class="content">

        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Dodaj ticket</h2>
            </div>
            <div class="card-body">
                <div class="alert alert-warning alert-dismissible">
                    Przed dodaniem ticketu sprawdź, czy podobny problem nie został już dodany <a href="<?= $this->base_path ?>ticket/unsolved">tutaj</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="formResult"></div>
                <form id="ticketCreateForm" enctype="multipart/form-data">
                    <?php if (!$this->logged) : ?>
                        <div class="form-group">
                            <label>Twój nick Discord</label>
                            <input name="discord" type="text" class="form-control" placeholder="John#1234" required>
                            <span class="mt-2 d-block">Musimy wiedzieć kto podesłał nam ticket. Opcjonalnie możesz się <a href="<?= $this->base_path ?>user/register">zarejestrować</a></span>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Tytuł</label>
                        <input name="title" type="text" class="form-control" placeholder="Tytuł" required>
                        <span class="mt-2 d-block">Określ twój problem w kilku słowach.</span>
                    </div>
                    <div class="form-group">
                        <label>Opis problemu</label>
                        <textarea name="description" rows="10" class="form-control" placeholder="Opis problemu" required></textarea>
                        <span class="mt-2 d-block">
                            Opisz twój problem. Najlepiej według schematu poniżej:<br>
                            Co się stało:<br>
                            Gdzie się stało:<br>
                            Co w tym momencie robiliście:<br>
                            Opcjonalnie z kim i w jakim pojeździe:<br>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Typ ticketu</label>
                        <select name="type" class="form-control" required>
                            <option value="1" selected>Błąd</option>
                            <option value="2">Zły balans</option>
                            <option value="3">Skarga na gracza</option>
                            <option value="4">Skarga na administratora</option>
                            <option value="5">Inne</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Załączniki</label>
                        <input type="file" name="attatchments[]" multiple class="form-control-file" accept="image/*">
                        <span class="mt-2 d-block">
                            Prześlij nam jakieś zdjęcia. Dzięki nim ułatwi nam to pracę.<br>
                            (Prezentacja błędu, dowód umacniający skargę, itd.)
                        </span>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Dodaj ticket</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>