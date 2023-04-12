@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="main-box">
                <div class="content-box">
                    <div class="logo-box">
                        <img src="{{ asset("images/logo/upd8logo-a.png") }}">
                        <div class="alert message-alert" style="display: none"></div>
                    </div>
                    <div class="container-logo">
                        <div class="container-title mb-3">Consulta Cliente</div>
                        <form class="form-register" data-formtype="search" method="get" action="{{ url("/api/usuarios/buscar") }}" name="formAjax">
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="inputCpf" class="mr-sm-2">CPF:</label>
                                    <input name="cpf" type="text" id="inputCpf" class="form-control mr-sm-2 mask-doc"  placeholder="123.456.789-00">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="inputName" class="mr-sm-2">Nome:</label>
                                    <input name="name" type="text" id="inputName" class="form-control mr-sm-2">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="inputName" class="mb-2 mr-sm-2">Data de nascimento:</label>
                                    <input name="date_of_birth" type="date" id="inputName" class="form-control  mr-sm-2">
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <label for="inputSex">Sexo:</label>
                                    <select name="sex" id="inputSex" class="form-control">
                                        <option value="1" selected>Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="inputState">Estado:</label>
                                    <select name="state_id" id="inputState" class="form-control">
                                        <option value="all" selected>Todos</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <label for="inputCity">Cidade:</label>
                                    <select name="city_id" id="inputCity" class="form-control">
                                        <option value="all" selected>Todos</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 mb-3 text-right" style="margin-top: 25px">
                                    <button type="submit" class="btn btn-primary">
                                        Pesquisar
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-cancel">
                                        Limpar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="container-logo mt-4">
                        <div class="container-title text-primary">Resultado da pesquisa</div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Cliente</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Data de nasc.</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Sexo</th>
                            </tr>
                            </thead>
                            <tbody class="send-search">

                            </tbody>
                        </table>

                        <div class="col-12 col-pagination" style="display: none">
                            <div class="row justify-content-center">
                                <nav >
                                    <ul class="pagination">


                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

@endsection
