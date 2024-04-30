<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div
            class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
            <div class="mb-2 mb-md-0" style="font-weight: bold;">
                {{ now()->format('Y') }} © COPOM | Desenvolvido pelo CB PM Luanque - EQUIPE BRAVO
            </div>


            <div class="d-none d-lg-inline-block">
                <a href="#" class="footer-link me-4" data-bs-toggle="modal" data-bs-target="#license">{{ __('Licença') }}</a>
                <a href="#" class="footer-link me-4" data-bs-toggle="modal" data-bs-target="#developers">{{ __('Desenvolvedores') }}</a>
            </div>
        </div>
    </div>
</footer>


<div class="modal fade" id="license" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">  <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Desenvolvedores') }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <p>Este é o corpo do modal. Você pode inserir qualquer conteúdo aqui, como texto, formulários, imagens etc.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="developers" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">  <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Desenvolvedores') }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-12">
                    <div class="card h-100">
                        <div class="d-flex align-items-end row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title pb-2">Idealizador e Criador</h4>
                                    <div class="badge bg-label-success rounded-pill lh-xs">Luanque dos Santos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Este é o corpo do modal. Você pode inserir qualquer conteúdo aqui, como texto, formulários, imagens etc.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
