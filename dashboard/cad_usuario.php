<?php include 'header.php'; ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Criar Usuário</h5>
                        <p class="m-b-0">&nbsp;</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Inverse table card end -->
                <!-- Hover table card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Usuários</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Login</th>
                                        <th>Senha</th>
                                        <th>Cargo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>André Luiz</td>
                                        <td>GLIA#4321</td>
                                        <th>Gerente</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Iago mello</td>
                                        <td>GLIA#4321</td>
                                        <th>Gerente</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Gustavo muller</td>
                                        <td>GLIA#4321</td>
                                        <th>Gerente</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>joao</td>
                                        <td>joao41</td>
                                        <th>Auxiliar</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <!-- Main-body end -->

    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Row end -->
        <!-- Row start -->
        <div class="row">
            <!-- Color Open Accordion start -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Criar usuário</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <form action="">
                            <h6 style="margin: 0px;">Login</h6>
                            <input type="text" class="formField"><br><br>

                            <h6 style="margin: 0px;">Senha</h6>
                            <input type="text" class="formField"><br>
                            <br>
                            <h6>Nível de permissão</h6>
                            <ul>
                                <li>
                                    <input type="checkbox" id="scales" name="scales" checked>
                                    <label for="scales">Gerente</label>
                                </li>
                                <li style="word-break: break-all;">
                                    <input type="checkbox" id="scales" name="scales" checked>
                                    <label for="scales">Auxiliar (Não tem acesso ao financeiro e não tem permissão para adicionar e alterar produtos)</label>
                                </li>
                            </ul>
                            <input type="submit" value="Salvar" class="formField" style="background-color: #11c15b; color: #ffff; border: 1px solid #11c15b;">
                        </form>
                    </div>
                </div>
                <!-- Row end -->
                <style>
                    @media (max-width: 425px) {
                        .formField {
                            height: 35px;
                            width: 75vw;
                        }
                    }

                    @media (min-width: 426px) {
                        .formField {
                            height: 35px;
                            width: 60vw;
                        }
                    }

                    @media (min-width: 768px) {
                        .formField {
                            height: 35px;
                            width: 30vw;
                        }
                    }
                </style>
            </div>
            <!-- Page-body end -->
        </div>

        <div class="main-body">
            <div class="page-wrapper">

            </div>
        </div>
    </div>
    <div id="styleSelector">

    </div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Accordion js -->
<script type="text/javascript" src="assets/pages/accordion/accordion.js"></script>
<!-- Custom js -->
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vertical/vertical-layout.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>