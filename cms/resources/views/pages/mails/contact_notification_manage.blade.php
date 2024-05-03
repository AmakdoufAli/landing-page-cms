<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Notifications Manage') }}
        </h2>
    </x-slot>

    <div class="w-8/12 mx-auto py-10">
        @if(Session::has('success'))
            <div class="bg-green-200 text-green-800 rounded-md p-4 mb-4 mx-auto ">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="">

            <div class="flex flex-row gap-5 bg-gray-100 p-7 rounded-md text-lg">
                <div class="min-w-fit flex flex-col gap-3">
                    <b>Nom :</b>
                    <b>Email :</b>
                    <b>Télephone :</b>
                    <b>Message :</b>
                </div>
                <div class="flex flex-col gap-3">
                    <p>{{ $notification->nom }}</p>
                    <p>{{ $notification->email }}</p>
                    <p>{{ $notification->telephone }}</p>
                    <p>{{ $notification->message }}</p>
                </div>
            </div>

            @if (count($replies) !== 0)
                <div class="bg-gray-100 mt-4 rounded-md p-4">
                    <h2 class="font-bold text-lg my-2">Your Replies : </h2>
                    @foreach ($replies as $reply)
                        <div class="border rounded-lg p-3 flex flex-col gap-2 my-2 bg-white">
                            <div class="">
                                <p>{{ $reply->created_at }}</p>
                            </div>
                            <div class="flex flex-row gap-3 items-start">
                                <img src={{ asset('images/profile.png') }} alt="you" style="width:20px;height:20px;border-radius:100%;">
                                <p class="">{{ $reply->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="">
                <form action={{ route('contact_notification_replay') }} method="POST">
                    @csrf
                    <input type="hidden" name="id_notification" value={{ $notification->id }}>
                    <label for="replay" class="block text-lg font-medium text-gray-900">Replay :</label>
                    <textarea name="message" id="replay" placeholder="Message..." required class="w-full bg-gray-50 border border-gray-300 text-lg text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-32"></textarea>
                    <input type="submit" value="Send" class="text-white my-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
