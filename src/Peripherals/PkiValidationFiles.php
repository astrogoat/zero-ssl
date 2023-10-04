<?php

namespace Astrogoat\ZeroSsl\Peripherals;

use Helix\Fabrick\Notification;
use Helix\Lego\Http\Livewire\Traits\ProvidesFeedback;
use Helix\Lego\Settings\Peripherals\Peripheral;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class PkiValidationFiles extends Peripheral
{
    use WithFileUploads;
    use ProvidesFeedback;

    public $validation_file;

    protected string $path = '.well-known/pki-validation';

    public function title(): string
    {
        return 'PKI Validation';
    }

    public function getExistingValidationFiles(): array|Collection
    {
        return collect(Storage::allFiles($this->path))
            ->map(fn ($fileName) => Str::after($fileName, $this->path . '/'));
    }

    public function getValidationFileRoute($fileName)
    {
        return asset($this->path . '/' .$fileName);
    }

    public function deleteValidationFile($fileName)
    {
        Storage::delete($this->path . '/' . $fileName);

        $this->notify(Notification::success('Deleted')->autoDismiss());
    }

    public function save()
    {
        $this->validate([
            'validation_file' => 'max:1024', // 1MB Max
        ]);

        $this->validation_file->storeAs($this->path, $this->validation_file->getClientOriginalName());

        $this->notify(Notification::success('Uploaded', 'PKI Validation file has been successfully uploaded')->autoDismiss());

        $this->validation_file = null;
    }

    public function render()
    {
        return view('zero-ssl::peripherals.pki-validation-files');
    }
}
