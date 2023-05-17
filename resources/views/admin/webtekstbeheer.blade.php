<x-templatelayout>

<x-slot name="title">Webtekstbeheer</x-slot>
<x-slot name="description">Op deze pagina kan u als admin de inhoud van de webteksten beheren.</x-slot>

<div class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
    <div class='w-full mb-24 max-w-[70%] mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
        <div class='mx-auto '>
            <div class='p-4 mx-auto w-[70%]'>
                <livewire:admin.texts />
            </div>
        </div>
    </div>
</div>


</x-templatelayout>