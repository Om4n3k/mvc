<div class="breadcrumb-wrapper">
    <h1><?= $this->title ?></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <?php if (isset($this->url[0])) : ?>
                <li class="breadcrumb-item">
                    <a href="<?= $this->base_path ?>">
                        <span class="mdi mdi-home"></span>
                    </a>
                </li>
            <?php endif ?>
            <?php if (isset($this->url[1])) : ?>
                <li class="breadcrumb-item" <?= !isset($this->url[2]) ? 'aria-current="page"' : null ?>>
                    <?= $this->url[1] ?>
                </li>
            <?php endif ?>
            <?php if (isset($this->url[2])) : ?>
                <li class="breadcrumb-item" aria-current="page"><?= $this->url[2] ?></li>
            <?php endif ?>
        </ol>
    </nav>
</div>