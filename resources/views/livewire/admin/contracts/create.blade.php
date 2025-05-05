<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Contracts</flux:heading>
        <flux:subheading size="lg" class="mb-6">Create New Contract</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input type="search" name="search" wire:model.live="search" placeholder="Search for an Employee" />
        @if($search != '' && $employees->count() > 0)
        <div class="z-10 mt-2 w-full rounded-md bg-white shadow-lg">
            <ul class="max-h-60 overflow-y-auto rounded-md border border-gray-300">
                @foreach($employees as $employee)
                    <li wire:click="selectEmployee({{ $employee->id }})" class="cursor-pointer p-2 hover:bg-gray-100">
                        {{ $employee->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:select name="department" label="Department" wire:model.live="department_id">
                    <option value="">Select a Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </flux:select>
            </div>
            <div>
                <flux:select name="designation" label="Designation" wire:model.live="contract.designation_id">
                    <option value="">Select a Designation</option>
                    @foreach($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input type="date" name="start_date" label="Start Date" wire:model.live="contract.start_date" />
            </div>
            <div>
                <flux:input type="date" name="end_date" label="End Date" wire:model.live="contract.end_date" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input type="number" name="rate" label="Rate" wire:model.live="contract.rate" />
            </div>
            <div>
                <flux:select name="rate_type" label="Rate Type" wire:model.live="contract.rate_type">
                    <option value="">Select Rate Type</option>
                    <option value="daily">Daily</option>
                    <option value="monthly">Monthly</option>
                </flux:select>
            </div>
        </div>

        <div class="flex justify-start">
            <flux:button type="submit" variant="primary" class="mt-4">
                Save
            </flux:button>
        </div>
        
    </form>

</div>
