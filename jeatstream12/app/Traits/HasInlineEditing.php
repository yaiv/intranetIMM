<?php

namespace App\Traits;

trait HasInlineEditing
{
    public bool $isEditing = false;

    public function startEditing()
    {
        $this->isEditing = true;
    }

    public function cancelEditing()
    {
        $this->isEditing = false;
        $this->mount(); // Recarga datos originales
        $this->resetValidation();
    }
}

