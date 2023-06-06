<div>
    {{-- Data Showing part  --}}
    @isset($parameters)
        @if (count($parameters) > 0)
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>End Date Order</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($parameters as $parameter)
                    <tr>
                        <td>{{ $parameter->id }}</td>
                        <td>{{ $parameter->end_date_order }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endisset


{{--    --}}{{-- Data inserting part  --}}
    <div>
        <h3><u> Parameter</u></h3>
        <form wire:submit.prevent="store">
            @csrf
            <div>
                <label for="end_date_order">End Date Order:</label>
                <input type="date" id="end_date_order" wire:model.defer="end_date_order">
                @error('end_date_order')
                    <span>{{ $message ?? 'Werkt niet' }}</span>
                @enderror
            </div>
            <button type="submit">Create Parameter</button>
        </form>

    </div>



{{--     Data Deleting part--}}
    @isset($parameters)
        <div>
            <h3><u>Delete Parameter</u></h3>
            <form wire:submit.prevent="destroy">
                <div>
                    <label for="parameter_id_delete">Select parameter to delete:</label>
                    <select name="parameter_id_delete" id="parameter_id_delete" wire:model.defer="parameter_id_delete">
                        <option value="">Select parameter</option>
                        @foreach ($parameters as $parameter)
                            <option value="{{ $parameter->id }}">{{ $parameter->end_date_order }}</option>
                        @endforeach
                    </select>
                    @error('parameter_id')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit">Delete</button>
            </form>
        </div>
    @endisset

{{--     Data Updating part--}}
    @isset($parameters)
        <div>
            <h3><u>Edit Parameter</u></h3>
            @if (session()->has('message'))
                <div>{{ session('message') }}</div>
            @endif
            <form wire:submit.prevent="update">
                <div>
                    <label for="parameter_id">Select parameter to edit:</label>
                    <select name="parameter_id" id="parameter_id" wire:model="selectedParameterId">
                        <option value="">Select parameter</option>
                        @foreach ($parameters as $parameter)
                            <option value="{{ $parameter->id }}">{{ $parameter->end_date_order }}</option>
                        @endforeach
                    </select>
                    @error('selectedParameterId') <span>{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="end_date_order">End Order Date:</label>
                    <input type="date" name="end_date_order" id="end_date_order" wire:model.defer="end_date_order">
                    @error('end_date_order') <span>{{ $message }}</span> @enderror
                </div>
                <button type="submit">Update Parameter</button>
            </form>
        </div>
    @endisset
</div>




