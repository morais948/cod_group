<div class="row p-4">
    <div class="col-12">
        <div style="font-size: 2rem" class="row mb-3">
            @if ($config['add'])
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route($prefix . '.create') }}" class="btn btn-success">novo registro</a>
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table border rounded">
                <thead>
                    <tr style="font-size: 1.5rem; background-image: linear-gradient(to right, #41afd1 , #4174d2); color: white">
                        @foreach ($titles as $item)
                            <th class="text-center">
                                {{ $item }}
                            </th>
                        @endforeach
                        <th class="text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $linha)
                        <tr>
                            @foreach (array_slice($linha->getAttributes(), 0, -2)  as $item)
                                <td class="text-center">
                                    {{ strlen($item) > 50 ? substr($item, 0, 50) . "..." : $item }}
                                </td>
                            @endforeach
                            <td class="text-center fs-3">
                                <i class="fas fa-ellipsis-v points text-secondary" id="dropdownMenuButton{{ $linha->id }}" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $linha->id }}">
                                    @if ($config['edit'])
                                        <li>
                                            <a class="dropdown-item" href="{{ route($prefix . '.edit', $linha->id) }}">Editar <i class="far fa-edit icon-painel text-primary ml-2"></i></a>
                                        </li>
                                    @endif
                                    @if ($config['remove'])
                                        <li>
                                            <form onsubmit="confirmDelete(event)" class="dropdown-item d-inline" action="{{ route($prefix . '.destroy', $linha->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-remove-table">Remover <i class="far fa-trash-alt icon-painel text-danger ml-2"></i></button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="{{ count($titles) + 1 }}">
                            {{ $content->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@push('js')
    <script>
        function confirmDelete(event){
            event.preventDefault();
            const result = confirm("Tem certeza que deseja excluir o Registro?");
            result ? event.target.submit() : null;
        }
    </script>
@endpush
