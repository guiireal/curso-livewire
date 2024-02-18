<div class="row my-5">
  <div class="input-group input-group-lg">
    <input
      wire:model.live.debounce="search"
      type="text"
      class="form-control form-control-lg rounded"
      placeholder="Pesquisar"
      aria-label="Pesquisar"
    >
  </div>
  <p class="mt-4 mb-0 d-flex flex-row align-self-center" style="color: #939597">
    <span class="fw-bold pe-1">{{ $users->total() }} resultados</span>
  </p>
  <div wire:loading wire:target="search">
    <x-loading/>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
      </tr>
    @endforeach
  </table>
  <div>
    {{ $users->links() }}
  </div>
</div>
