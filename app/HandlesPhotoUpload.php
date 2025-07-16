<?php

namespace App;

trait HandlesPhotoUpload
{
    public function updatedFormPhoto($file)
    {
        if ($file && !in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
            $this->form->photo = null;

            $this->addError('form.photo', 'The photo must be a file of type: jpeg, png, gif, webp.');
        } else {
            $this->resetValidation('form.photo');
        }
    }
}
