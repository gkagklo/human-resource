<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Contracts</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit Contract for {{ $contract->employee->name }}</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        {{-- <flux:input type="search" name="search" wire:model.live="search" placeholder="Search for an Employee" :invalid="$errors->has('contract.employee_id')" />
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
        @endif --}}
        
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:select name="department" label="Department" wire:model.live="department_id" :invalid="$errors->has('department_id')">
                    <option value="">Select a Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </flux:select>
                <flux:error name="department_id" class="mt-2" />
            </div>
            <div>
                <flux:select name="designation" label="Designation" wire:model.live="contract.designation_id" :invalid="$errors->has('contract.designation_id')">
                    <option value="">Select a Designation</option>
                    @foreach($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                    @endforeach
                </flux:select>
                <flux:error name="contract.designation_id" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input type="date" name="start_date" label="Start Date" wire:model="contract.start_date" :invalid="$errors->has('contract.start_date')" />
                <flux:error name="contract.start_date" class="mt-2" />
            </div>
            <div>
                <flux:input type="date" name="end_date" label="End Date" wire:model="contract.end_date" :invalid="$errors->has('contract.end_date')" />
                <flux:error name="contract.end_date" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <flux:input type="number" name="rate" label="Rate" wire:model="contract.rate" :invalid="$errors->has('contract.rate')" />
                <flux:error name="contract.rate" class="mt-2" />
            </div>
            <div>
                <flux:select name="rate_type" label="Rate Type" wire:model="contract.rate_type" :invalid="$errors->has('contract.rate_type')" >
                    <option value="">Select Rate Type</option>
                    <option value="daily">Daily</option>
                    <option value="monthly">Monthly</option>
                </flux:select>
                <flux:error name="contract.rate_type" class="mt-2" />
            </div>
        </div>

        <div class="flex justify-start">
            <flux:button type="submit" variant="primary" class="mt-4">
                Save
            </flux:button>
        </div>
        
    </form>

</div>
