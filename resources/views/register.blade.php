@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="main-register">
                 <div class="content-register">
                     <div class="logo-register">
                        <img src="{{ asset("images/logo/upd8logo-a.png") }}">
                         <div class="alert message-alert" style="display: none"></div>
                     </div>
                     <div class="container-register">
                         <div class="container-title mb-3">Cadastro Cliente</div>

                         <form class="form-register" data-formtype="createuse" method="post" action="{{ url("/api/usuarios") }}" name="formAjax">
                             @csrf
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
                                         <option selected>Selecione</option>
                                         <option value="1">Masculino</option>
                                         <option value="2">Feminino</option>
                                     </select>
                                 </div>
                             </div>

                             <div class="form-row">
                                 <div class="col-md-4 mb-3">
                                     <label for="inputStreet" class="mr-sm-2">Endereço:</label>
                                     <input name="street" type="text" id="inputStreet" class="form-control mr-sm-2">
                                 </div>

                                 <div class="form-group col-md-4 mb-3">
                                     <label for="inputState">Estado:</label>
                                     <select name="state_id" id="inputState" class="form-control">
                                         <option selected>Selecione</option>
                                     </select>
                                 </div>

                                 <div class="form-group col-md-4 mb-3">
                                     <label for="inputCity">Cidade:</label>
                                     <select name="city_id" id="inputCity" class="form-control">
                                         <option selected>Selecione</option>
                                     </select>
                                 </div>
                             </div>

                             <div class="form-row">
                                 <div class="col-12 text-right">
                                    <div class="mr-3">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-cancel">
                                            Cancelar
                                        </button>
                                    </div>
                                 </div>
                             </div>

                         </form>
                     </div>
                 </div>
            </div>
        </div>
    </div>

@endsection
