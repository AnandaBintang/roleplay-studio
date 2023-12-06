<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <x-table>
                    <x-slot name="head">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Login</th>
                    </x-slot>
                    @foreach ($users as $index => $user)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $user->email }}
                                <br />
                                <span class="badge badge-ghost badge-sm">{{ $user->role_name }}</span>
                            </td>
                            <td>{{ $user->last_login }}</td>
                            <th>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                    class="btn btn-ghost btn-xs">details</a>
                            </th>
                        </tr>
                    @endforeach
                    <x-slot name="foot">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
