<div class="modal fade" id="importarModal" tabindex="-1" aria-labelledby="importarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produtos.importar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importarModalLabel">Importar Planilha de Produtos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="arquivo" class="form-label">Selecione um arquivo Excel (.xlsx, .xls, .csv)</label>
                        <input class="form-control" type="file" name="arquivo" id="arquivo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>
