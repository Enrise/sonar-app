<table class="min-w-full divide-y divide-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <th><span class="sr-only">Status icon</span></th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Time</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Transaction</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Retries</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Options</span>
            </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
        @foreach($transactions as $transaction)
        <tr>
            <td class="pl-2">
                @if($transaction['status'] === 'failed')
                    <div class="w-3 h-3 rounded-full bg-red-500"><span class="sr-only">This transaction has {{ $transaction['status'] }}</span></div>
                @elseif($transaction['status'] === 'done')
                    <div class="w-3 h-3 rounded-full bg-green-500"><span class="sr-only">This transaction is {{ $transaction['status'] }}</span></div>
                @elseif($transaction['status'] === 'started')
                    <div class="w-3 h-3 rounded-full bg-blue-500"><span class="sr-only">This transaction has {{ $transaction['status'] }}</span></div>
                @endif
            </td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-6">{{ $transaction['created_at'] }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-gray-800">{{ $transaction['name'] }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($transaction['retries'] > 0)
                    <x-badge.warning :text="$transaction['retries']" />
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($transaction['status'] === 'failed')
                    <x-badge.error :text="$transaction['status']" />
                @elseif($transaction['status'] === 'done')
                    <x-badge.success :text="$transaction['status']" />
                @elseif($transaction['status'] === 'started')
                    <x-badge.info :text="$transaction['status']" />
                @endif
            </td>
            <td x-data="{ menuOpen: false }" class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <button x-on:click="menuOpen = !menuOpen">
                    <i class="bi bi-three-dots"></i><span class="sr-only">open menu</span>
                </button>
                <form x-show="menuOpen" class="absolute z-10 w-48 mt-1 right-0 shadow rounded bg-white p-3 flex flex-col">
                    <a  />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
