<div class="mt-5">
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h2>Editar post</h2>
      </div>
      @session('success')
      <div class="alert alert-success" role="alert">
        {{ $value }}
      </div>
      @endsession
    </div>
    <div class="card-body">
      <form wire:submit="submit">
        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input
            wire:model.live.debounce="title"
            type="text"
            class="form-control"
            id="title"
            placeholder="Título"
          >
          @error('title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Conteúdo</label>
          <textarea
            wire:model.live.debounce="content"
            class="form-control"
            id="content"
            rows="3"
            placeholder="Conteúdo"></textarea>
          @error('content')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
          <div
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
          >
            <div x-show="uploading">
              <progress max="100" :value="progress"></progress>
            </div>
            <label for="photo" class="form-label">Imagem</label>
            <input wire:model="photo" type="file" class="form-control" id="photo">
            @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="mt-2">
            @if($post->photo && !$photo)
              <img src="{{ $post->photo }}" alt="Imagem do post" class="img img-fluid w-25">
            @endif
            @if($photo)
              <img src="{{ $photo->temporaryUrl() }}" alt="Imagem temporária" class="img img-fluid w-25">
            @endif
          </div>
        </div>
        <div class="d-flex align-items-center">
          <button type="submit" class="btn btn-primary">Confirmar</button>
          <div wire:loading>
            <x-loading/>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
