<?php

namespace App\Livewire\Forms\Posts;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateForm extends Form
{
    #[Rule('required')]
    public string $title;

    #[Rule(['required', 'min:5'])]
    public string $content;
}
