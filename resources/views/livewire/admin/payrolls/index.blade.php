<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Payrolls</flux:heading>
        <flux:subheading size="lg" class="mb-6">Payrolls for {{ getCompany()->name }}</flux:subheading>
        <flux:separator/>
    </div>

    <div class="flex justify-between items-center">
        <div class="w-full pr-4">
            <flux:input
                type="month"
                name="month"
                placeholder="Choose the month"
                wire:model="monthYear"
                :invalid="$errors->has('monthYear')"
            />
        </div>
        <div>
            <flux:button
                variant="primary"
                wire:click="generatePayroll"
            >
                Generate Payrolls
            </flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @foreach($payrolls as $payroll)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-lg font-semibold mb-2">Payroll for {{ $payroll->month_string }}</h3>
                <p class="text-gray-600">Total Employees: {{ $payroll->salaries?->count() }}</p>
                <p class="text-gray-600">Total Amount: {{ number_format($payroll->salaries?->sum('gross_salary'), 2) }}&euro;</p>
                <flux:button
                    variant="primary"
                    wire:click="viewPayroll({{ $payroll->id }})"
                >
                    View Details
                </flux:button>
            </div>
        @endforeach
    </div>

</div>
