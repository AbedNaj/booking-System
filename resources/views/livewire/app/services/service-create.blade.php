<div>

    <form wire:submit.prevent='ServiceAdd' enctype="multipart/form-data" class="flex flex-col gap-4">

        <flux:input wire:model="name" :label="__('services.name')" />
        <flux:input wire:model="description" :label="__('services.description')" />
        <flux:input wire:model="price" :label="__('services.price')" />
        <flux:input placeholder="{{ __('services.minutes') }}" wire:model="duration_minutes"
            :label="__('services.duration')" />




        <flux:input type="file" wire:model="image" label="image" />

        <flux:select wire:model='category' label="Category">
            <option selected>{{ __('services.categorySelect') }}</option>
            @foreach ($categories as $category)

                <option name="{{ $category->id }}" value="{{ $category->id }}" id="">{{ $category->name }}</option>

            @endforeach
        </flux:select>

        <flux:select wire:model='status' label="{{ __('services.status') }}">

@foreach ($statuses as $status)
          <option value="{{ $status->value }}">{{  $status->label()}}</option>
@endforeach
                
           
        </flux:select>
        <flux:button type="submit" variant="primary" class="w-full hover:cursor-pointer">{{ __('services.add') }}
        </flux:button>

    </form>
</div>