<div class="mt-5">
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h2>Criar post</h2>
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
          <input wire:model.live.debounce="form.title" type="text" class="form-control" id="title" placeholder="Título">
          @error('form.title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Conteúdo</label>
          <textarea
            wire:model.live.debounce="form.content"
            class="form-control"
            id="content"
            rows="3"
            placeholder="Conteúdo"></textarea>
          @error('form.content')<span class="text-danger">{{ $message }}</span>@enderror
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
