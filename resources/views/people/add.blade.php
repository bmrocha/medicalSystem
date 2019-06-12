﻿<script type="text/javascript">
    function habilitaBtn () {
        var op = document.getElementById("profile").value;

        if(op == "4") // Paciente
        {
            document.getElementById('medico').style.display = 'none';
            document.getElementById('funcionario').style.display = 'none';
        }

        if(op == "3") // Medico
        {
            document.getElementById('medico').style.display = 'block';
            document.getElementById('funcionario').style.display = 'none';
        }

        if(op == "2") // Funcionário
        {
            document.getElementById('funcionario').style.display = 'block';
            document.getElementById('medico').style.display = 'none';

            //if(document.getElementById('avancar').disabled) document.getElementById('avancar').disabled=false;
        }


    }
</script>

     <script src="public/js/jquery.maskedinput.js"></script>

        <script type="text/javascript">
            $(function() {
                $.mask.definitions['~'] = "[+-]";
                $("#telephone").mask("(99) 9. 999-9999");
                $("#phoneExt").mask("(999) 999-9999? x99999");
                $("#iphone").mask("+33 999 999 999");
                $("#tin").mask("99-9999999");
                $("#ssn").mask("999-99-9999");
                $("#product").mask("a*-999-a999", { placeholder: " " });
                $("#eyescript").mask("~9.99 ~9.99 999");
                $("#po").mask("PO: aaa-999-***");
                $("#pct").mask("99%");
                $("#phoneAutoclearFalse").mask("(999) 999-9999", { autoclear: false, completed:function(){alert("completed autoclear!");} });
                $("#phoneExtAutoclearFalse").mask("(999) 999-9999? x99999", { autoclear: false });

                $("input").blur(function() {
                    $("#info").html("Unmasked value: " + $(this).mask());
                }).dblclick(function() {
                    $(this).unmask();
                });
            });

        </script>

        <script src="/public/js/cidadeEstado.js"></script>

        <script>
            $(document).ready(function() {
                new dgCidadesEstados({
                    cidade: document.getElementById('cidade'),
                    estado: document.getElementById('estado')
                })
            });
        </script>

   <!--   TUTORIAIS PARA MASCARAS
    http://www.kadunew.com/blog/jquery/criando-mascara-de-entrada-em-formularios-com-masked-input
    https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
    https://cercal.io/jquery-mask-mascaras-para-campos-de-formularios/
   -->



@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Pessoas</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ route('people.index') }}"><b>Pessoas</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
            </ol>

                    <form action="{{ route('people.save') }}" method="post">
                    {{ csrf_field() }}


                    <div class="form-group row">
                        <label for="profile" class="col-md-1 control-label">Perfil</label>
                        <div name="profile" class="col-md-3" value="{{ old('profile') }}" required autofocus>
                        <select  class="form-control"  id="profile" data-placeholder="Selecione" onchange="habilitaBtn()" >
                            <option value="4">Paciente</option>
                            <option value="3"> Médico</option>
                            <option value="2">Funcionário</option>
                        </select>
                        </div>
                    </div>

					<!-- se clicar em Funcionario -->
                    <div style="display:none" id='funcionario' class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="crm">Cargo</label>
                            <input type="text" crm="crm" class="form-control" placeholder="Descreva o Cargo do Funcionário">
                            <label for="crm">Setor</label>
                            <input type="text" crm="crm" class="form-control" placeholder="Descreva o setor que trabalha">

                            @if($errors->has('crm'))
                        <span class="help-block">
                            <strong>{{$errors->first('crm')}}</strong>
                        </span>
                        @endif
                        </div>

                    <!-- se clicar em Medico -->
                    <div style="display:none" id='medico' class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                        <label for="crm">CRM</label>
                        <input type="text" crm="crm" class="form-control" placeholder="CRM do Médico">
                        <label for="crm">Especialidade</label>
                        <input type="text" crm="crm" class="form-control" placeholder="Especialidade do Médico">

                        @if($errors->has('crm'))
                    <span class="help-block">
                        <strong>{{$errors->first('crm')}}</strong>
                    </span>
                    @endif
                    </div>



                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('birthdate') ? 'has-error' : '' }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Data de nascimento">
                        @if($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{$errors->first('birthdate')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('genre') ? 'has-error' : '' }}">
                            <label for="genre">Genêro</label>
                            <input type="text" name="genre" class="form-control" placeholder="Genêro">
                        @if($errors->has('genre'))
                        <span class="help-block">
                            <strong>{{$errors->first('genre')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('cpf') ? 'has-error' : '' }}">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00">
                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpf')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('RG') ? 'has-error' : '' }}">
                            <label for="RG">RG</label>
                            <input type="text" name="RG" class="form-control" placeholder="0000000000">
                        @if($errors->has('RG'))
                        <span class="help-block">
                            <strong>{{$errors->first('RG')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('number') ? 'has-error' : '' }}">
                            <label for="number">Número</label>
                            <input type="text" name="number" class="form-control" placeholder="Número residência">
                        @if($errors->has('number'))
                        <span class="help-block">
                            <strong>{{$errors->first('number')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('district') ? 'has-error' : '' }}">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" class="form-control" placeholder="Bairro">
                        @if($errors->has('district'))
                        <span class="help-block">
                            <strong>{{$errors->first('district')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">Observação</label>
                            <input type="obs" name="obs" class="form-control" placeholder="Observação">
                            @if($errors->has('obs'))
                        <span class="help-block">
                            <strong>{{$errors->first('obs')}}</strong>
                        </span>
                        @endif
                        </div>

                        <button class="btn btn-info">Adicionar</button>

                    </form>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@stop
