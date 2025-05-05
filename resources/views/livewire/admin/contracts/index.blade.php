<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Contracts</flux:heading>
        <flux:subheading size="lg" class="mb-6">List of Contracts for {{ getCompany()->name }}</flux:subheading>
        <flux:separator/>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Employee Details
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contract Details
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rate
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($contracts as $key => $contract)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $key+1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex flex-col">
                                        <span class="text-gray-900 font-semibold text-lg">{{ $contract->employee->name }}</span>
                                        <span class="text-gray-500">{{ $contract->employee->email }}</span>
                                        <span class="text-gray-500">{{ $contract->employee->phone }}</span>
                                        <span class="text-gray-500 font-bold">{{ $contract->employee->designation->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <h5>Start: {{ $contract->start_date }}</h5>
                                        <p>End: {{ $contract->end_date }}</p>
                                        <p class="font-semibold text-lg">Duration: {{ $contract->duration }} </p>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($contract->rate) }}&euro; {{ $contract->rate_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <flux:button variant="filled" icon="pencil" :href="route('contracts.edit', $contract->id)"/>
                                        <flux:button variant="danger" icon="trash" wire:click="delete({{ $contract->id }})"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
