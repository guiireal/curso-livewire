<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Post $post;

    #[Rule('required')]
    public string $title;

    #[Rule(['required', 'min:5'])]
    public string $content;

    #[Rule(['nullable', 'image', 'max:1024'])]
    public $photo;

    public function mount(): void
    {
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function updatedPhoto(): void
    {
        if (!in_array($this->photo->extension(), ['jpg', 'jpeg', 'png'])) {
            $this->photo = null;
            $this->addError('photo', 'A foto deve ser do tipo jpg, jpeg ou png.');
        }
    }

    public function submit(): void
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $this->post->photo,
        ]);

        session()->flash('success', 'Post atualizado com sucesso!');
    }

    public function render(): View
    {
        return view('livewire.posts.edit');
    }
}
