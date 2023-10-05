<?php

namespace Astrogoat\ZeroSsl\Peripherals;

use Astrogoat\ZeroSsl\Settings\ZeroSslSettings;
use Helix\Fabrick\Notification;
use Helix\Lego\Http\Livewire\Traits\ProvidesFeedback;
use Helix\Lego\Settings\Peripherals\Peripheral;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class PkiValidationFiles extends Peripheral
{
    use WithFileUploads;
    use ProvidesFeedback;

    public $validationFile;

    protected string $path = '.well-known/pki-validation';
    protected Filesystem $filesystem;
    protected string $disk;

    public function boot()
    {
        $this->disk = app(ZeroSslSettings::class)->filesystem_disk;
        $this->filesystem = Storage::disk($this->disk);
    }

    public function title(): string
    {
        return 'PKI Validation';
    }

    public function getExistingValidationFiles(): array|Collection
    {
        return collect($this->filesystem->allFiles($this->path))
            ->map(fn ($fileName) => Str::after($fileName, $this->path . '/'));
    }

    public function getValidationFileRoute($fileName)
    {
        return asset($this->path . '/' .$fileName);
    }

    public function deleteValidationFile($fileName)
    {
        $this->filesystem->delete($this->path . '/' . $fileName);

        $this->notify(Notification::success('Deleted')->autoDismiss());
    }

    public function save()
    {
        $this->validate([
            'validationFile' => 'max:1024', // 1MB Max
        ]);

        $this->validationFile->storeAs($this->path, $this->validationFile->getClientOriginalName(), $this->disk);

        $this->notify(Notification::success('Uploaded', 'PKI Validation file has been successfully uploaded')->autoDismiss());

        $this->validationFile = null;
    }

    public function render()
    {
        return view('zero-ssl::peripherals.pki-validation-files');
    }
}
