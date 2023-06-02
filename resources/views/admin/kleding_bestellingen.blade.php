<x-templatelayout>

<x-slot name="title">Kledingbestellingen</x-slot>
<x-slot name="description">Op deze pagina kan u als admin zien welke kledij er door clubleden besteld werd.</x-slot>

    <div>
        <livewire:admin.kledingbestelling/>
    </div>

    <div>
        @livewire('parameter-component')
    </div>



</x-templatelayout>
