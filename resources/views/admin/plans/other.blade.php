

<form #formPolitic="ngForm" role="form" (submit)="save()">
    <div class="form-body">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="accordion_personals_data" data-children=".personalData">
                        <div class="personalData">
                            <div class="card-header bg-info text-center">
                                <a data-toggle="collapse" data-parent="#accordion_access"
                                   href="#accordion_personal_data"
                                   aria-expanded="true" aria-controls="accordion_personal_data">
                                    Dados pessoais
                                </a>
                            </div>
                            <div id="accordion_personal_data" class="collapse show" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        required
                                                        #contribuitor_name="ngModel"
                                                        [(ngModel)]="contribuitor.rg"
                                                        name="rg">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>RG</label>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.cpf"
                                                        name="cpf">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>CPF</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.name"
                                                        name="name">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Nome</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.last_name"
                                                        name="last_name"
                                                        appMask="(99) 9 9999-9999">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Sobrenome</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.nickname"
                                                       name="nickname">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Apelido</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.genre"
                                                        name="genre">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Genero</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        type="date"
                                                        [(ngModel)]="contribuitor.birth"
                                                        name="birth">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Aniversario</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.voter_title"
                                                        name="voter_title">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Titulo de Eleitor</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.zone_id"
                                                        name="zone_id">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Zona Eleitoral</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.session_id"
                                                        name="session_id">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Seção Eleitoral</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div id="accordion_access" data-children=".access">
                <div class="access">
                    <div class="card-header bg-info text-center">
                        <a data-toggle="collapse" data-parent="#accordion_access"
                           href="#accordion_access_item"
                           aria-expanded="true" aria-controls="accordion_access_item">
                            Acesso ao sistema
                        </a>
                    </div>
                    <div id="accordion_access_item" class="collapse show" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Usuario</label>
                                    <div class="group">
                                        <input
                                                type="text"
                                                [(ngModel)]="contribuitor.user_id"
                                                name="user_id">
                                        <!--<select name="user_id" [(ngModel)]="contribuitor.user_id"-->
                                        <!--class="form-control input-material">-->
                                    <!--<option *ngFor="let us of user" [value]="us.id"> {{us.nome}}-->
                                        <!--</option>-->
                                        <!--</select>-->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Subordinado a</label>
                                    <div class="group">
                                        <input
                                                type="text"
                                                [(ngModel)]="contribuitor.candidate_id"
                                                name="candidate_id">
                                        <!--<select name="plan_id" [(ngModel)]="contribuitor.candidate_id"-->
                                        <!--class="form-control input-material">-->
                                        <!--<option *ngFor="let plan of plans" [value]="plan.id">-->
                                    <!--{{plan.nome}}-->
                                        <!--</option>-->
                                        <!--</select>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- card end-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="accordion_address" data-children=".addressData">
                        <div class="addressData">
                            <div class="card-header bg-info text-center">
                                <a data-toggle="collapse" data-parent="#accordion_access"
                                   href="#accordion_address_form"
                                   aria-expanded="true" aria-controls="accordion_address_form">
                                    Endereço do candidato
                                </a>
                            </div>
                            <div id="accordion_address_form" class="collapse show" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.address"
                                                       name="address">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Endereço</label>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.stret"
                                                       name="stret">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Rua</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.neighborhood"
                                                       name="neighborhood">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Bairro</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.cep"
                                                       name="cep">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>CEP</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.ibge_code"
                                                       name="ibge_code">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Codigo IBGE</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <div class="input-group">
                                                    <input
                                                            type="text"
                                                            [(ngModel)]="contribuitor.uf"
                                                            name="uf">
                                                    <!--<select name="uf" [(ngModel)]="contribuitor.uf" class="form-control input-material">-->
                                                <!--<option *ngFor="let state of states" [value]="state.id"> {{state.uf}}</option>-->
                                                    <!--</select>-->
                                                </div>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>UF</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input
                                                        type="text"
                                                        [(ngModel)]="contribuitor.city"
                                                        name="city">
                                                <!--<select name="city" [(ngModel)]="contribuitor.city" class="form-control input-material">-->
                                            <!--<option *ngFor="let city of cities" [value]="city.id"> {{city.cidade}}</option>-->
                                                <!--</select>-->
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Cidade</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.country"
                                                       name="country">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Pais</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="group">
                                                <input type="text"
                                                       [(ngModel)]="contribuitor.created_by"
                                                       name="created_by">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Criado por</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="biography" data-children=".biographyData">
                        <div class="biographyData">
                            <div class="card-header bg-info text-center">
                                <a data-toggle="collapse" data-parent="#accordion_access"
                                   href="#accordion_biography"
                                   aria-expanded="true" aria-controls="accordion_biography">
                                    Leads
                                </a>
                            </div>
                            <div id="accordion_biography" class="collapse show" role="tabpanel">
                                <div class="card-body">

                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.proposed_leads"
                                                        name="proposed_leads">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Leads propostos</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.operation_state"
                                                        name="operation_state">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Estado de operação</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.operation_city"
                                                        name="operation_city">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Cidade de atuação</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.operation_neighborhoods"
                                                        name="operation_neighborhoods">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Bairro de atuação principal</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.interest"
                                                        name="interest">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Interesses</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.facebook"
                                                        name="facebook">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Facebook</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.twitter"
                                                        name="twitter">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Twitter</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.linkdin"
                                                        name="linkdin">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>LinkedIn</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.instagram"
                                                        name="instagram">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Instagram</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.whatsapp"
                                                        name="whatsapp">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Whatsapp</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.skype"
                                                        name="skype">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Skype</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="group">
                                                <input
                                                        [(ngModel)]="contribuitor.salary"
                                                        name="salary">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Salario</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="biography" data-children=".biographyData">
                        <div class="biographyData">
                            <div class="card-header bg-info text-center">
                                <a data-toggle="collapse" data-parent="#accordion_access"
                                   href="#accordion_biography"
                                   aria-expanded="true" aria-controls="accordion_biography">
                                    Observações
                                </a>
                            </div>
                            <div id="accordion_biography" class="collapse show" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-12">
                                            <div class="group">
                                                            <textarea
                                                                    [(ngModel)]="contribuitor.observation"
                                                                    name="observation"
                                                                    rows="20"
                                                                    style="width:100%">
                                                            </textarea>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Biografia</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="form-actions">
        <button type="submit" class="btn blue" [disabled]="formPolitic.form.invalid">Cadastrar</button>
        <button type="reset" class="btn red">Limpar</button>
    </div>
</form>

</div>
</div>
</div>
