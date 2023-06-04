<div>
    <div class="flex flex-col bg-[#c7daea] m-2 shadow rounded-lg">
        <div class="p-5 text-center font-semibold border-b border-gray-100">Upload je gpx bestanden</div>

        <form wire:submit.prevent="save">

            <input type="file" wire:model="files" multiple id="upload{{ $iteration }}">

            @error('files.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit">Save GPX</button>
            <div wire:loading wire:target="files">Uploading...</div>

        </form>
    </div>
</div>
