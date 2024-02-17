<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\CreateForm;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public CreateForm $form;

    public function render(): View
    {
        return view('livewire.posts.create');
    }

    public function submit(): void
    {
        $this->validate();

        Post::create([
            'title' => $this->form->title,
            'slug' => Str::slug($this->form->title),
            'content' => $this->form->content,
            'user_id' => 1
        ]);

        $this->reset(['form.title', 'form.content']);

        session()->flash('success', 'Post criado com sucesso!');
    }
}
