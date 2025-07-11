<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome" value="{{ old('nome', $produto->nome ?? '') }}" class="form-control" required>
    @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
    @error('descricao') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="preco" class="form-label">Preço (R$)</label>
    <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco', $produto->preco ?? '') }}" class="form-control" required>
    @error('preco') <div class="text-danger">{{ $message }}</div> @enderror
</div>
