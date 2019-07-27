<div class="content-wrapper">
    <div class="content">

        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Lista nierozwiązanych ticketów</h2>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="row">
                    <div class="col-12">
                        <table class="table valign-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th score="col">Status</th>
                                    <th scope="col">Temat</th>
                                    <th scope="col">Data Dodania</th>
                                    <th scope="col">Dodał</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->tickets as $ticket):?>
                                <tr>
                                    <td scope="row"><?=$ticket['ticketid']?></td>
                                    <td><span class="badge badge-<?=$ticket['solvetion']['class']?>"><?=$ticket['solvetion']['text']?></span></td>
                                    <td><?=$ticket['title']?></td>
                                    <td><?=date('d.m.Y H:i',$ticket['post_date'])?></td>
                                    <td><?=$ticket['added_by_login']?></td>
                                    <td>
                                        <a href="<?=$this->base_path?>ticket/show/<?=$ticket['ticketid']?>" data-toggle="tooltip" title="" data-original-title="Pokaż ticket" class="btn btn-primary py-1"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Zmień status" class="btn btn-primary py-1"><i class="mdi mdi-bookmark"></i></a>
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Usuń" class="btn btn-danger py-1"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>