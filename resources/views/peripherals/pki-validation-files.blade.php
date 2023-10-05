@php use Helix\Fabrick\Icon;use Illuminate\Support\Str;use Astrogoat\ZeroSsl\Settings\ZeroSslSettings; @endphp
<div class="space-y-10">
    <x-fab::layouts.panel
        title="Upload PKI Validation File"
    >
        <form
            wire:submit.prevent="save"
            class="flex justify-between items-center"
        >
            <input type="file" wire:model="validationFile">

            @error('validationFile') <span class="error">{{ $message }}</span> @enderror

            <x-fab::elements.button
                type="submit"
                :disabled="! $validationFile || blank(settings(ZeroSslSettings::class, 'filesystem_disk'))"
            >
                Upload
                <x-fab::elements.icon
                    :icon="Icon::CLOUD_UPLOAD"
                    class="h-5 w-5 ml-2"
                />
            </x-fab::elements.button>
        </form>
    </x-fab::layouts.panel>

    <x-fab::lists.table title="PKI Validation files">
        <x-slot name="headers">
            <x-fab::lists.table.header>File name</x-fab::lists.table.header>
            <x-fab::lists.table.header hidden>View</x-fab::lists.table.header>
            <x-fab::lists.table.header hidden>Actions</x-fab::lists.table.header>
        </x-slot>

        @foreach($this->getExistingValidationFiles() as $pkiValidationFile)
            <x-fab::lists.table.row :odd="$loop->odd">
                <x-fab::lists.table.column primary>{{ $pkiValidationFile }}</x-fab::lists.table.column>
                <x-fab::lists.table.column slim align="right">
                    <a
                        href="{{ $this->getValidationFileRoute($pkiValidationFile) }}"
                        target="_blank"
                        class="underline flex items-center"
                    >
                        View
                        <x-fab::elements.icon :icon="Icon::EXTERNAL_LINK" class="h-4 w-4 ml-1" />
                    </a>

                </x-fab::lists.table.column>
                <x-fab::lists.table.column slim align="right">
                    <x-fab::elements.button size="xs" destructive>
                        <x-fab::elements.icon
                            wire:click="deleteValidationFile('{{ $pkiValidationFile }}')"
                            :icon="Icon::TRASH"
                            class="h-4 w-4"
                        />
                    </x-fab::elements.button>
                </x-fab::lists.table.column>
            </x-fab::lists.table.row>
        @endforeach
    </x-fab::lists.table>
</div>
