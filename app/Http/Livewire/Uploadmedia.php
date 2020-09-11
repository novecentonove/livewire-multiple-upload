<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Uploadmedia extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function removeThumb($index){
        $this->photos[$index] = null;
    }

    public function save()
    {
        foreach ($this->photos as $photo) {
            if($photo !== null){
                $photo->store('photos');
            }
        }
    }

    public function render()
    {
        return view('livewire.uploadmedia');
    }
}
