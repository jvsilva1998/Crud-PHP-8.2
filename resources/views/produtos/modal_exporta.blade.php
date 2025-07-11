<!-- Modal de Exportação -->
<div class="modal fade" id="exportarModal" tabindex="-1" aria-labelledby="exportarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produtos.exportar') }}" method="GET">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exportarModalLabel">Exportar Produtos para Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Escolha o formato de exportação:</p>
                    <div class="mb-3">
                        <label for="formato" class="form-label">Formato</label>
                        <select class="form-select" name="formato" id="formato" required>
                            <option value="xlsx">Excel (.xlsx)</option>
                            <option value="xls">Excel 97-2003 (.xls)</option>
                            <option value="csv">CSV (.csv)</option>
                        </select>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Exportar</button>
                </div>
            </form>
        </div>
    </div>
</div>
