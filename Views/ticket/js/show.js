$(document).ready(function () {
    $('#ticketCommentForm').submit(function (e) {

        let data = new FormData(this);
        let date = new Date();

        $.ajax({
            url: `${base_path}ticket/fComment`,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'json',
            success: function (msg) {
                if(msg.return) {
                    let comment = data.get('comment');
                    let more_content = '<div></div>';
                    if (role) {
                        more_content = `
                        <div class="card-body p-2 card-body-border-bottom">
                            <div class="card-body p-2 bg-danger text-white">${role}</div>
                        </div>`
                        ;
                    }

                    let append = $(`
                    <div class="card-body card-body-border-bottom">
                       <div class="row">
                           <div class="col-12 col-md-2">
                               <div class="card card-default text-center card-shadow">
                                   <img class="card-img-top d-none d-md-block" src="${useravatar}" alt="User Avatar">
                                   <div class="card-body p-2">
                                       ${username}
                                   </div>
                                   ${more_content}
                               </div>
                           </div>
                           <div class="col-12 col-md-10">
                               <div class="card mb-3">
                                   <div class="card-body">
                                       ${comment}
                                   </div>
                                   <div class="card-footer text-right">
                                       ${('0' + date.getDate()).slice(-2)}.${('0' + date.getMonth()).slice(-2)}.${date.getFullYear()} ${('0' + date.getHours()).slice(-2)}:${('0' + date.getMinutes()).slice(-2)}
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    `);

                    $('#ticketCard').hide().append(append).fadeIn(500);

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(append).offset().top - 100
                    }, 1000);
                } else {
                    $.notify(msg.response,'error');
                }
            },
            error: function () {
                alert('Wystąpił błąd');
            }
        });

        e.preventDefault();
    });

    $('a[href=a--changeStatus').click(function(e){
        let id = $(this).attr('data-id');
        let date = new Date();

        $.ajax({
            url: `${base_path}ticket/fChangeStatus`,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: `&id=${id}`,
            dataType: 'json',
            success: function(msg) {

            },
            error: function(){

            }
        )}

        let append =`
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2">
                    <div class="card card-default text-center card-shadow">
                        <img class="card-img-top d-none d-md-block" src="${useravatar}" alt="User Avatar">
                        <div class="card-body p-2 card-body-border-bottom">
                            ${username}
                        </div>
                        <div class="card-body p-2 card-body-border-bottom">
                            <div class="card-body p-2 bg-danger text-white">${role}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="card card-default text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Zmieniono status ticketu na "xyz"</h5>
                            Tutaj coś wymyślę
                        </div>
                        <div class="card-footer text-right">
                            ${('0' + date.getDate()).slice(-2)}.${('0' + date.getMonth()).slice(-2)}.${date.getFullYear()} ${('0' + date.getHours()).slice(-2)}:${('0' + date.getMinutes()).slice(-2)}
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

        $('#ticketCard').hide().append(append).fadeIn(500);

        $([document.documentElement, document.body]).animate({
            scrollTop: $(append).offset().top - 100
        }, 1000);
        e.preventDefault();
    });
});