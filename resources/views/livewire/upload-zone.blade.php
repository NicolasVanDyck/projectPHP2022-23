<div>
    <form wire:submit.prevent="save">

        <input type="file" wire:model="files" multiple id="upload{{ $iteration }}">

        @error('files.*')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit">Save GPX</button>
        <div wire:loading wire:target="files">Uploading...</div>

    </form>
</div>
