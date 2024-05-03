<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="w-10/12 mx-auto mt-12 ">
        <table class="w-full text-sm text-center text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
              <tr>
                <th scope="col" class="py-3">
                  Nom
                </th>
                <th scope="col" class="py-3">
                  Email
                </th>
                <th scope="col" class="py-3">
                  Ville
                </th>
                <th scope="col" class="py-3">
                  Telephone
                </th>
              </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <td class="py-4">{!! $client->nom !!} {!! $client->prenom !!}</td>
                        <td>{!! $client->email !!}</td>
                        <td>{!! $client->ville !!}</td>
                        <td>{!! $client->telephone !!}</td>
                    </tr>
                @empty
                    <h2 class="text-xl font-semibold text-gray-500">There is no clients yet !</h2>
                @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {{ $clients->links() }}
        </div>
    </div>

</x-app-layout>
