<div class="content-wrapper">
    <div class="content">

        <div class="card card-default" id="ticketCard">
            <div class="card-header card-header-border-bottom">
                <span class="mr-2 badge badge-<?= $this->solvetion['class'] ?>">
                    <?= $this->solvetion['text'] ?>
                </span>
                <h2>Ticket id: <?= $this->ticketid ?></h2>
                <?php if($this->logged):?>
                <div class="dropleft ml-auto">
                    <button class="btn btn-primary py-0 px-2" type="button" data-toggle="dropdown">
                        <i class="mdi mdi-24px mdi-menu"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="a--TicketDelete">Usuń wpis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-id="1" href="a--changeStatus">Oznacz jako "nowy"</a>
                        <a class="dropdown-item" data-id="2" href="a--changeStatus">Oznacz jako "zamknięty"</a>
                        <a class="dropdown-item" data-id="3" href="a--changeStatus">Oznacz jako "w trakcie"</a>
                        <a class="dropdown-item" data-id="4" href="a--changeStatus">Oznacz jako "odrzucony"</a>
                    </div>
                </div>
                <?php endif?>
            </div>
            <div class="card-body card-body-border-bottom">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="card card-default text-center card-shadow">
                            <img class="card-img-top d-none d-md-block" src="<?= $this->base_path ?>public/img/user/undefined.jpg" alt="User Avatar">
                            <div class="card-body p-2 card-body-border-bottom">
                                <?= $this->added_by ?>
                            </div>
                            <div class="card-body p-2 card-body-border-bottom">
                                <i class="mdi mdi-24px mdi-discord"></i> <?= $this->added_by_nick ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom"><?= $this->title ?></div>
                            <div class="card-body">
                                <?= $this->description ?>
                            </div>
                            <div class="card-footer text-right">
                                <?= $this->post_date ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php foreach($this->comments as $comment):?>
            <div class="card-body card-body-border-bottom">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="card card-default text-center card-shadow">
                            <img class="card-img-top d-none d-md-block" src="<?= $this->base_path ?>public/img/user/undefined.jpg" alt="User Avatar">
                            <div class="card-body p-2 card-body-border-bottom">
                                <?= $comment['username'] ?>
                            </div>
                            <?php if($comment['role']):?>
                            <div class="card-body p-2 card-body-border-bottom">
                                <div class="card-body p-2 bg-danger text-white"><?=$comment['role']?></div>
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="card card-default">
                            <div class="card-body">
                                <?= $comment['text'] ?>
                            </div>
                            <div class="card-footer text-right">
                                <?= $comment['post_date'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>

        <?php if ($this->logged) : ?>
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Dodaj komentarz</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div class="card card-default text-center card-shadow">
                                <img class="card-img-top d-none d-md-block" src="<?= $this->base_path ?>public/img/user/undefined.jpg" alt="User Avatar">
                                <div class="card-body p-2 card-body-border-bottom">
                                    <?= $this->login ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-10">
                            <form id="ticketCommentForm">
                                <div class="input-group mb-2">
                                    <textarea type="text" name="comment" style="resize:none" class="form-control" rows="8" style="height:100% !important" id="inlineFormInputGroup" placeholder="Komentarz"></textarea>
                                    <input value="<?=$this->ticketid?>" name="ticketid" hidden/>
                                    <input value="<?=$this->userid?>" name="userid" hidden/>
                                    <button type="submit" class="btn btn-primary w-100">Wyślij</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

    </div>
</div>