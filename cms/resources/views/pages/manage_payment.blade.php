<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    @if(Session::has('success'))
        <div class="bg-green-200 text-green-800 rounded-md p-4 mb-4 w-10/12 mx-auto ">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="w-10/12 mx-auto mt-12">
        <table class="text-sm text-left rtl:text-right text-gray-500 w-full">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Client
                </th>
                <th scope="col" class="px-6 py-3">
                  Formation
                </th>
                <th scope="col" class="px-6 py-3">
                  Prix
                </th>
                <th scope="col" class="px-6 py-3">
                  Source
                </th>
                <th scope="col" class="px-6 py-3">
                  Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Url
                </th>
                <th scope="col" class="py-3 text-center">
                  Regenerate
                </th>
              </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{!! $payment->client->prenom !!} {!! $payment->client->nom !!}</td>
                        <td>{!! $payment->landingPage->name!!}</td>
                        <td>{!! $payment->amount_value !!} {!! $payment->amount_currency_code !!}</td>
                        <td>{!! $payment->paymentSource !!}</td>
                        <td>{!! $payment->status !!}</td>
                        <td class="max-w-60 truncate">{!! $payment->generatedUrl !!}</td>
                        <td class="text-center">
                            <form action={{ route('payments.update', $payment->id)}} method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="idlp" value={{ $payment->landingPage->id }}>
                                <button type="submit"><x-refresh-svg/></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"><h2 class="text-xl font-semibold text-gray-500">There is no payments yet !</h2></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {{ $payments->links() }}
        </div>
    </div>

</x-app-layout>
