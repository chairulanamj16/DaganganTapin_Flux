<?php

namespace App\Concerns;

use Illuminate\Support\Facades\Session;

trait Toastable
{
    public function showToast(string $type, string $message): void
    {
        $this->dispatch('show-toast', [
            'type'  => $type,
            'message' => $message,
        ]);
    }

    public function flashToast(string $type, string $message): void
    {
        Session::flash('toast', [
            'type'    => $type,
            'message' => $message,
        ]);
    }

    public function showValidationErrors(): void
    {
        $errors = $this->getErrorBag()->messages();

        if (! empty($errors)) {
            $errorList = [];
            foreach ($errors as $field => $messages) {
                $fieldName = $this->getLabel($field);
                $errorList[] = $fieldName . ': ' . $messages[0];
            }

            $this->showToast('error', implode(', ', $errorList));
        }
    }
}
