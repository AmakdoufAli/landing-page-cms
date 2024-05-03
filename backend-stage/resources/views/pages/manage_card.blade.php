<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card Manage') }}
        </h2>
    </x-slot>

    <div class="mt-14">
        <div class="w-10/12 mx-auto">

            <div class="">
                @if(Session::has('success'))
                    <div class="bg-green-200 text-green-800 rounded-md p-4 mb-4">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('card.update', $card->id) }}" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf @method('PUT')

                    @isset($card->title['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="">
                                <label for="title_fr" class="block font-medium text-gray-900">Titre (Francais)</label>
                                <input
                                    type="text"
                                    name="title_fr"
                                    id="title_fr"
                                    value="{{ $card->title['fr'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Titre (Francais)"
                                    required
                                >
                            </div>
                            <div class="">
                                <label for="title_en" class="block font-medium text-gray-900">Title (Anglais)</label>
                                <input
                                    type="text"
                                    name="title_en"
                                    id="title_en"
                                    value="{{ $card->title['en'] }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Title (Anglais)"
                                    required
                                >
                            </div>
                        </div>
                    @endisset

                    @isset($card->description['fr'])
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div>
                                <label htmlFor="description_fr" class="block font-medium text-gray-900">
                                    Description (Francais)
                                </label>
                                <textarea
                                    name="description_fr"
                                    id="description_fr"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-40 "
                                    required
                                >{{ $card->description['fr'] }}</textarea>
                            </div>
                            <div>
                                <label htmlFor="description_en" class="block font-medium text-gray-900">
                                    Description (Anglais)
                                </label>
                                <textarea
                                    name="description_en"
                                    id="description_en"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 h-40 "
                                    required
                                >{{ $card->description['en'] }}</textarea>
                            </div>
                        </div>
                    @endisset

                    @isset($card->image)
                        <div class="flex gap-4 items-center">
                            <div class="w-32">
                                <img id="previewImage" src="{{ asset($card->image) }}" alt="{{ $card->name }}" class="w-full h-auto" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <input type="file" name="image" id="image" onchange="previewFile()" class="px-3 py-2 border border-gray-300 rounded-md" />
                                <button type="button" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-400" onclick="resetImage()">Reset</button>
                            </div>
                        </div>
                    @endisset

                    <div>
                        <input
                            type="submit"
                            value="Enregistrer"
                            class="my-3 text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                        />
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('previewImage');
            const file = document.getElementById('image').files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset($card->image) }}";
            }
        }

        function resetImage() {
            const preview = document.getElementById('previewImage');
            preview.src = "{{ asset($card->image) }}";
            document.getElementById('image').value = '';
        }
    </script>

</x-app-layout>
