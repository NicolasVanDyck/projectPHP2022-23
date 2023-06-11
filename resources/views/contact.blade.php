<x-templatelayout>
    <x-slot name="title">Contactpagina</x-slot>
    <x-slot name="description">Contactpagina</x-slot>


    <div
        class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen">
        <div class="md:w-1/2">
            <div class="pt-20">
                <livewire:admin.texts/>
            <div class="mt-20">
             @if(session('success'))
                <div class="bg-success text-white">
                    {{ session('success') }}
                </div>
            @endif
                     <x-wd_components.form/>
                 </div>
            </div>
        </div>
    </div>
</x-templatelayout>
