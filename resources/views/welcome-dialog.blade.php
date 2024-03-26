<div>
    <button wire:click="toggleWelcome" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Mostrar Bienvenida
    </button>

    @if($showWelcome)
        <div class="mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Bienvenido!</p>
            <p>¡Gracias por visitar nuestro sitio web!</p>
        </div>
    @endif
</div>
