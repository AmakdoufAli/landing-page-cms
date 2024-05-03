<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Notifications') }}
        </h2>
    </x-slot>

    <div class="mt-14">
        <div class="w-10/12 mx-auto">

            <div class="flex flex-col">
                <table class="text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Télephone
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Message
                            </th>
                            <th>
                                Date & Heure
                            </th>
                            <th class="text-center">Status</th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notifications as $notification)
                            <tr class="odd:text-black odd:dark:bg-gray-100 even:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{!! $notification->nom !!}</td>
                                <td>{!! $notification->email !!}</td>
                                <td>{!! $notification->telephone !!}</td>
                                <td class="max-w-60 pr-5 truncate">{!! $notification->message !!}</td>
                                <td>{!! $notification->created_at !!}</td>
                                <td align="center">
                                    @if ($notification->status)
                                        <x-green-mark/>
                                    @else
                                        <x-red-mark/>
                                    @endif
                                </td>
                                <td class="flex flex-row items-center justify-center gap-4 pt-3 ">
                                    <form action="{{ route('notification-delete') }}" method="POST" id="deleteForm{{ $notification->id }}">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="id_notification" value={{ $notification->id }}>
                                        <button type="button" onclick="confirmDelete({{ $notification->id }})"><x-delete/></button>
                                    </form>
                                    <form action="{{ route('contact_notification_manage', $notification->id) }}" method="GET">
                                        <button type="submit"><x-send/></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-3xl text-white font-bold">There is no contact notification yet !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-3">
                    {{ $notifications->links() }}
                </div>

            </div>

        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if(confirm('Are you sure you want to delete this Message Notification?')){
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>

</x-app-layout>
