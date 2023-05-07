<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Parameters</title>
    </head>
    <body>

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


    {{-- Data inserting part  --}}
    <div>
        <h1><u> Parameter</u></h1>
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



    {{-- Data Deleting part  --}}
    @isset($parameters)
        <div>
            <h1><u>Delete Parameter</u></h1>
            <form wire:submit.prevent="destroy">
                <div>
                    <label for="parameter_id_delete">Select parameter to delete:</label>
                    <select name="parameter_id_delete" id="parameter_id_delete" wire:model.defer="parameter_id">
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

    {{-- Data Updating part  --}}
{{--    <div>--}}
{{--        <h1 style="font-weight: bold">Update Parameter</h1>--}}
{{--        <form wire:submit.prevent="update">--}}
{{--            @csrf--}}
{{--            <label for="current_end_date_order">Current End Date Order:</label>--}}
{{--            <select id="current_end_date_order" name="parameter_id" wire:model="parameter_id">--}}
{{--                <option value="">Select parameter</option>--}}
{{--                @foreach ($parameters as $parameter)--}}
{{--                    <option value="{{ $parameter->id }}">{{ $parameter->end_date_order }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            @error('parameter_id') <span>{{ $message }}</span> @enderror<br><br>--}}
{{--            <label for="new_end_date_order">New End Date Order:</label>--}}
{{--            <input type="date" id="new_end_date_order" name="end_date_order" wire:model.lazy="end_date_order">--}}
{{--            @error('end_date_order') <span>{{ $message }}</span> @enderror<br><br>--}}
{{--            <button type="submit">Update Parameter</button>--}}
{{--        </form>--}}
{{--        @if (session()->has('message'))--}}
{{--            <div>{{ session('message') }}</div>--}}
{{--        @endif--}}
{{--    </div>--}}


{{--    <div>--}}
{{--        <h1><u>Edit Parameter</u></h1>--}}
{{--        @if (session()->has('message'))--}}
{{--            <div>{{ session('message') }}</div>--}}
{{--        @endif--}}
{{--        <form wire:submit.prevent="update">--}}
{{--            @csrf--}}
{{--            <div>--}}
{{--                <label>Select parameter to edit:</label>--}}
{{--                @foreach ($parameters as $parameter)--}}
{{--                    <label>--}}
{{--                        <input type="radio" wire:model="selectedParameterId" value="{{ $parameter->id }}">--}}
{{--                        {{ $parameter->end_date_order }}--}}
{{--                    </label>--}}
{{--                @endforeach--}}
{{--                @error('selectedParameterId') <span>{{ $message }}</span> @enderror--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="end_date_order">End Order Date:</label>--}}
{{--                <input type="date" name="end_date_order" id="end_date_order" wire:model.defer="end_date_order">--}}
{{--                @error('end_date_order') <span>{{ $message }}</span> @enderror--}}
{{--            </div>--}}
{{--            <button type="submit">Update Parameter</button>--}}
{{--        </form>--}}
{{--    </div>--}}




    {{--    <div>--}}
{{--        <h1><u>Edit Parameter</u></h1>--}}
{{--        @if (session()->has('message'))--}}
{{--            <div>{{ session('message') }}</div>--}}
{{--        @endif--}}
{{--        <form wire:submit.prevent="update">--}}
{{--            <div>--}}
{{--                <label>Select parameter to edit:</label>--}}
{{--                @foreach ($parameters as $parameter)--}}
{{--                    <label>--}}
{{--                        <input type="radio" wire:ignore name="parameter_id" value="{{ $parameter->id }}" wire:model="parameter_id">--}}
{{--                        {{ $parameter->end_date_order }}--}}
{{--                    </label>--}}
{{--                @endforeach--}}
{{--                @error('parameter_id') <span>{{ $message }}</span> @enderror--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="end_date_order">End Order Date:</label>--}}
{{--                <input type="date" name="end_date_order" id="end_date_order" wire:model.lazy="end_date_order">--}}
{{--                @error('end_date_order') <span>{{ $message }}</span> @enderror--}}
{{--            </div>--}}
{{--            <button type="submit">Update Parameter</button>--}}
{{--        </form>--}}
{{--    </div>--}}




    </body>
</html>


