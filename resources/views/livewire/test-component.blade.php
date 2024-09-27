<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-12">
            <div class=" py-3 form-row justify-content-center"> Тип товара - <b>{{ $productType->name }}</b></div>
            <table class="table table-striped">
                <thead>
                    <th>id</th>
                    <th>Характеристика</th>
                    <th>Значение</th>
                    <th>Действия</th>
                </thead>
                @foreach ($props as $prop)
                <tr>
                    <td>{{ $prop->id }} </td>
                    <td> {{ $prop->name }}</td>
                    <td>
                        {{-- @if ($this->property_show[$prop->id] == true) --}}
                        {{-- <label for="select_{{ $prop->id }}">Выберите поле</label> --}}
                        <div class="mb-3">
                            <select class="form-control" id="select_{{ $prop->id }}">
                                <option value="0">Выберите вариант</option>
                                <!-- Здесь будут ваши опции wire:model= property_test. " -->
                            </select>
                        </div>
                        {{-- @endif --}}
                    </td>
                    <td>
                        <button type="button" wire:click="editProperty({{$prop->id}})" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" wire:click="deleteProperty({{$prop->id}})" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class=" py-3 form-row justify-content-center">
                <button wire:click="save" type="button" class="btn btn-primary" {{ $isDisabled==true ? 'disabled' : ''
                }}>Сохранить </button>
            </div>
        </div>
    </div>


    @foreach ($props as $prop)

    @push('js')
    <script>
        $(document).ready(function() {
            $('#select_{{ $prop->id }}').select2({
                tags: true
                , ajax: {
                    url: "/api/v1/admin/property_list"
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    }
                    , processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.value
                                    , id: item.id,
                                    // position: item.position,
                                }
                            })
                            , pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                    , cache: false
                }
                , placeholder: 'Select an option'
            , });
        });

    </script>
      @endpush
    @endforeach
</div>
