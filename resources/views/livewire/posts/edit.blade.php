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
            <svg xmlns="http://www.w3.org/2000/svg"
                 style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;"
                 width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
              <circle cx="30" cy="50" fill="#e90c59" r="20">
                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30"
                         begin="-0.5s"></animate>
              </circle>
              <circle cx="70" cy="50" fill="#46dff0" r="20">
                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30"
                         begin="0s"></animate>
              </circle>
              <circle cx="30" cy="50" fill="#e90c59" r="20">
                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30"
                         begin="-0.5s"></animate>
                <animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1"
                         dur="1s" repeatCount="indefinite"></animate>
              </circle>
            </svg>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
