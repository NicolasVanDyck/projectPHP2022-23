<x-templatelayout>
    <x-slot name="title">Contactpagina</x-slot>
    <x-slot name="description">Contactpagina</x-slot>


    <div class="flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/2">
            <livewire:admin.texts/>
        </div>
        <div class="w-full sm:w-1/2">
            <x-wd_components.form/>
        </div>
    </div>

</x-templatelayout>
