<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Designations</flux:heading>
        <flux:subheading size="lg" class="mb-6">Create New Designation</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:select label="Department" wire:model.live="designation.department_id" :invalid="$errors->has('designation.department_id')">
            <flux:select.option value="">Select Department</flux:select.option>
            @foreach($departments as $department)
                <flux:select.option value="{{ $department->id }}">{{ $department->name }}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:input
            label="Designation Name"
            wire:model.live="designation.name"
            :invalid="$errors->has('designation.name')"
            type="text"
        />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>

</div>
