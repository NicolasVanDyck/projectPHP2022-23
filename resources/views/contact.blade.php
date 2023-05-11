<x-templatelayout>
    <x-slot name="title">Contactpagina</x-slot>
    <x-slot name="description">Contactpagina</x-slot>

    <div class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
        <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
                <div class='p-8'>
                    <livewire:admin.texts/>
                </div>
            </div>
        </div>
    </div>
{{--        nog niet goedgekeurd--}}
            <x-wd_components.form></x-wd_components.form>
</x-templatelayout>