<div class="filter-bar">
    <button 
        wire:click="selectOption(null)" 
        class="{{ is_null($selected) ? 'active' : '' }}">
        Tous
    </button>

    @foreach ($options as $option)
        <button 
            wire:click="selectOption('{{ $option['id'] }}')" 
            class="{{ $selected == $option['id'] ? 'active' : '' }}">
            {{ $option['label'] }}
        </button>
    @endforeach
</div>