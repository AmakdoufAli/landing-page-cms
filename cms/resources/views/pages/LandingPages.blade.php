<x-app-layout>
    <x-slot name="header" class="w-10/12 mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Pages') }}
        </h2>
    </x-slot>

    <div class="mt-14">
        <div class="w-10/12 mx-auto">

            <div class="flex flex-col">
                <table class="text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Link
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($landing_pages as $landing_page)
                            <tr class="odd:text-black odd:dark:bg-gray-100 even:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{!! $landing_page->name !!}</td>
                                <td>{!! $landing_page->link !!}</td>
                                <td>{!! $landing_page->price !!}</td>
                                <td>{!! $landing_page->title['fr'] !!}</td>
                                <td>{!! $landing_page->description['fr'] !!}</td>
                                <td class="flex flex-row items-center justify-center gap-3 pt-3">
                                    <a href="/d-landing-pages-m/{{ $landing_page->id }}"><x-setting-svg/></a>
                                    <form action="{{ route('lp-duplicate', $landing_page->id) }}" method="post" id="duplicateForm{{ $landing_page->id }}">
                                        @csrf
                                        <input type="hidden" name="link" id="linkInput{{ $landing_page->id }}">
                                        <button type="button" onclick="promptLink({{ $landing_page->id }})"><x-duplicate/></button>
                                    </form>
                                    <form action="{{ route('lp-delete', $landing_page->id) }}" method="POST" id="deleteForm{{ $landing_page->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $landing_page->id }})"><x-delete/></button>
                                    </form>
                                    <form action="{{ route('togglelanding') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_landingpage" value="{{ $landing_page->id }}">
                                        <button type="submit">
                                            @if (!$landing_page->etat)
                                                <x-hidden/>
                                            @else
                                                <x-show-svg/>
                                            @endif
                                        </button>
                                    </form>
                                    <a href="{{ $landing_page->link }}"><x-next-svg/></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-3xl text-blue-500 font-bold">There is no landing page yet !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-3">
                    {{ $landing_pages->onEachSide(3)->links() }}
                </div>
            </div>

        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if(id === 1){
                alert("You can't delete this landing page")
            }else{
                if(confirm('Are you sure you want to delete this landing page?')){
                    document.getElementById('deleteForm' + id).submit();
                }
            }
        }
        function promptLink(id) {
            let link = prompt('Please enter the link for duplication:');
            if (link !== null) {
                document.getElementById('linkInput' + id).value = link;
                document.getElementById('duplicateForm' + id).submit();
            }
        }
    </script>

</x-app-layout>
