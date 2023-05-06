<!DOCTYPE html>
<html>
    <head>
        <title>Parameters</title>
        @livewireStyles
    </head>
    <body>
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

    <div>
        <h1><u> Parameter</u></h1>
        <form wire:submit.prevent="store">
            @csrf
            <div>
                <label for="end_date_order">End Date Order:</label>
                <input type="date" id="end_date_order" wire:model="end_date_order">
                @error('end_date_order') <span>{{ $message ?? 'Werkt niet' }}</span> @enderror
            </div>
            <button type="submit">Create Parameter</button>
        </form>
    </div>



    <div>
        <h1><u>Delete Parameter</u></h1>
        <form wire:submit.prevent="destroy">
            <div>
                <label for="parameter_id">Select parameter to delete:</label>
                <select name="parameter_id" id="parameter_id" wire:model="parameter_id">
                    <option value="">Select parameter</option>
                    @foreach ($parameters as $parameter)
                        <option value="{{ $parameter->id }}">{{ $parameter->end_date_order }}</option>
                    @endforeach
                </select>
                @error('parameter_id') <span>{{ $message }}</span> @enderror
            </div>
            <button type="submit">Delete</button>
        </form>
    </div>

    @livewireStyles
    </body>
</html>


