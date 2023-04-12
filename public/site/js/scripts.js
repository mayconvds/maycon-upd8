let states = []
let cities = []
let actPage = "";

function replaceFormatBirth(birth) {
    const splitBirth = birth.split("-")
    return splitBirth[2] + '/' + splitBirth[1] + '/' + splitBirth[0];
}

function findState(id) {
    let s = undefined;
    states.forEach((val, k ) => {
        if (parseInt(id) === parseInt(val.id)) {
            s = val;
        }
    })
    return s;
}

function deleteUser(id) {
    let str = `Tem certeza que deseja deletar o usuário ${id}?`;
    if (confirm(str)) {
        $.ajax({
            url: `/api/usuarios/${id}`,
            type: "delete",
            dataType: "JSON",
            success: function (response) {
                alert(response[0])
                sendSearchPage(actPage)
            },
            complete: function () {}
        });
    }
}

function findCity(id) {
    let s = undefined;
    cities.forEach((val, k ) => {
        if (parseInt(id) === parseInt(val.id)) {
            s = val;
        }
    })
    return s;
}

function editUser(id) {
    window.location.href = `/editar/usuario/${id}`;
}

function sendSearchPage(query = "") {
    let pagination = $(".pagination");
    let colPagination = $(".col-pagination");
    let sendSearch = $(".send-search");

    let sendUri = (query.length > 0 ? `/api/usuarios/buscar?${query}` : "/api/usuarios/buscar")

    $.ajax({
        url: sendUri,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            colPagination.css("display", "none")
            pagination.html("")
            sendSearch.html("")

        },
        success: function (response) {
            if (response.data.length >= 1) {
                response.data.forEach((val, k) => {
                    const checkState = (findState(val.state_id) === undefined ? "not find" : findState(val.state_id).initials)
                    const city = findCity(val.city_id);
                    const checkCity = (city === undefined ? "not find" : city.name)
                    let repData = replaceFormatBirth(val.date_of_birth)
                    const sex = (val.sex === 1 ? "M" : "F");
                    sendSearch.append(`
                                <tr>
                                    <td><button onclick="editUser('${val.id}')" class="btn btn-success btn-sm">Editar</button></td>
                                    <td><button onclick="deleteUser('${val.id}')" class="btn btn-danger btn-sm">Excluir</button></td>
                                    <td>${val.name}</td>
                                    <td>${val.cpf}</td>
                                    <td>${repData}</td>
                                    <td>${checkState}</td>
                                    <td>${checkCity}</td>
                                    <td>${sex}</td>
                                </tr>
                            `)
                })

            } else {
                sendSearch.append(`
                   <tr>
                        <td colspan="8" class="text-center font-weight-bold text-info" >Nenhum cliente encontrado</td>
                   </tr>
                `);
            }
            if (response.last_page > 1) {
                colPagination.css("display", "block")
                pagination.append(`
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0)" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Anterior</span>
                                            </a>
                                        </li>
                        `);
                for (let i = 1; i <= response.last_page; i++) {
                    pagination.append(`<li class="page-item"><a onclick="sendPage('${i}')" class="page-link" href="javascript:void(0)">${i}</a></li>`)
                }

                pagination.append(`
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Próximo">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Próximo</span>
                                            </a>
                                        </li>
                        `);
            }

        },
        complete: function () {}
    })
}

function sendPage(page) {
    let form = $('form[name="formAjax"]');
    let serialize = form.serialize();
    let urlForm = `${serialize}&page=${page}`;
    actPage = urlForm;
    sendSearchPage(urlForm)
}

$(document).ready(function () {
    $(".mask-doc").mask('000.000.000-00', {reverse: true});

    $('.btn-back').click(function(e) {
        window.location.href = "/usuarios";
    })

    $('.btn-cancel').click(function (e) {
        $('form[name="formAjax"]').trigger("reset");
    })

    $('form[name="formAjax"]').submit(function (e) {
        e.preventDefault();
        let form = $(this)
        let action = form.attr("action")
        let method = form.attr("method")
        let messageAlert = $('.message-alert');
        let data = $(this).data();

        if (data.formtype === "search") {
            sendPage(1);
            return;
        }

        $.ajax({
            url: action,
            type: method,
            dataType: "JSON",
            data: form.serialize(),
            beforeSend: function () {
                messageAlert.fadeOut(200)
                messageAlert.removeClass("alert-danger")
                messageAlert.removeClass("alert-success")
                messageAlert.removeClass("alert-info")
            },
            success: function (response) {
                if (response.errorInfo) {
                    messageAlert.fadeIn(200)
                    messageAlert.addClass("alert-danger")
                    messageAlert.html(response.errorInfo[2])
                } else {
                    if (data.formtype === "edituse") {
                        messageAlert.addClass("alert-info");
                        messageAlert.fadeIn(200)
                        messageAlert.html(response[0]);
                        setTimeout(() => {
                            window.location.href = "/usuarios";
                        }, 2000)
                    } else {
                        messageAlert.fadeIn(200)
                        messageAlert.addClass("alert-success");
                        messageAlert.html(response);
                        if (data.formtype !== "search") {
                            form.trigger("reset");
                        }
                    }
                }
            },
            error: function (response) {

            },
            complete: function () {

            }
        })
    });

    if ($('form[name="formAjax"]').length > 0) {
        let selectCity = $('[name=city_id]');
        let selectStates = $('[name=state_id]');
        let form = $('form[name="formAjax"]');
        let formData = form.data();

        selectStates.change(function (e) {
            const stateId = $( this ).val()
            $('[name=city_id] option').each(function() {
                $(this).remove();
            });
            if (formData.formtype === "search") {
                selectCity.append(`<option value="all" selected>Todos</option>`)
            }
            cities.forEach((value, key) => {
                if (parseInt(stateId) === parseInt(value.ufid)) {
                    selectCity.append(`<option value="${value.id}">${value.name}</option>`)
                }
            })
        })
        $.ajax({
            url: "/api/localidades",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                if (response.success) {
                    states = response.states
                    cities = response.cities
                    states.forEach((value, key) => {
                        if (formData.formtype === "edituse") {
                            let st = formData.stateid;
                            let ct = formData.cityid;
                            let selected = (parseInt(value.id) === parseInt(st) ? "selected" : "");
                            selectStates.append(`<option ${selected} value="${value.id}">${value.initials}</option>`)

                            $('[name=city_id] option').each(function() {
                                $(this).remove();
                            });

                            cities.forEach((value, key) => {
                                let selectedCity = (parseInt(value.id) === parseInt(ct) ? "selected" : "");
                                if (parseInt(st) === parseInt(value.ufid)) {
                                    selectCity.append(`<option ${selectedCity} value="${value.id}">${value.name}</option>`)
                                }
                            })
                        } else {
                            selectStates.append(`<option value="${value.id}">${value.initials}</option>`)
                        }
                    })
                }
            },
            complete: function () {}
        });

        if (formData.formtype === "search") {
            sendSearchPage();
            // $('.send-search').html();

        }
    }
})
