<x-templatelayout>
    <x-slot name="title">Contactpagina</x-slot>
    <x-slot name="description">Contactpagina</x-slot>


    <div class="lg:flex lg:flex-col lg:justify-between ">
        <div class="lg:flex lg:w-[400px] xl:w-[550px]">
            <livewire:admin.texts/>
        </div>
        <div class="lg:w-[400px] xl:w-[550px]">
            @if(session('success'))
                <div class="bg-success text-white">
                    {{ session('success') }}
                </div>
            @endif

            <x-wd_components.form/>
        </div>
    </div>
</x-templatelayout>
