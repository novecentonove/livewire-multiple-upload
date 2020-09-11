<div>

    <form wire:submit.prevent="save">
        <input type="file" wire:model="photos" multiple>
    
        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
    
        <button type="submit">Save Photo</button>
    </form>
    
    

    @if ($photos)
    <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
    <!-- Progress Bar -->
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>
    </div>

    @for ($i = 0; $i < count($photos); $i++)
    @isset($photos[$i])
    <img wire:click="removeThumb('{{$i}}')" class="w-10 h-auto" src="{{ $photos[$i]->temporaryUrl() }}">
    @endisset
    @endfor
    
    @endif
</div>
