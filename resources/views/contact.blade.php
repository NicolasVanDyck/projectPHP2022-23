<x-templatelayout>
    <x-slot name="title">Contactpagina</x-slot>
    <x-slot name="description">Contactpagina</x-slot>


    <div
        class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen">
        <div class="md:w-1/2 h-screen">
            <div class="pt-20">
                <livewire:admin.texts/>
            </div>
            <div class="mt-20">
                <x-wd_components.form/>
            </div>
        </div>
    </div>
</x-templatelayout>
