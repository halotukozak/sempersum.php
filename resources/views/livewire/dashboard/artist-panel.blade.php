<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow bg-white dark:bg-gray-600 rounded-lg mx-3 md:m-auto">
            <div
                class="px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16 border-2 dark:border-blue-400 dark:border-opacity-75">
                <div class="flex justify-center -mt-16 md:justify-end mb-3 ">
                    @if($artist && $artist->avatar('md'))
                        <img
                            class="object-cover w-32 h-32 rounded-full border-2 dark:border-blue-400 dark:border-opacity-75"
                            alt="Artist's avatar."
                            src="{{ $artist->avatar('md') }}">
                    @else
                        <div
                            class="bg-blue-400 rounded-full w-32 h-32 border-2 dark:border-blue-400 dark:border-opacity-75">
                        </div>
                    @endif
                </div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">{!! $name !!}</h2>
            </div>
            <div class="flex justify-center md:justify-start space-x-2 my-1 px-1 md:px-6 md:py-2 flex-wrap">
                <section class="w-full p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                    <form wire:submit.prevent="save" autocomplete="off">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 text-gray-700 dark:text-gray-200">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="name">Nazwa<span
                                        class="text-red-700"  {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>

                                <input wire:model="name" id="name" type="text" placeholder="Wpisz tytuł..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                       dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                       focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('name'){{ $message }}@enderror</p>
                            </div>
                            <div class="col-span-full ">
                                <label for="description"
                                       class="text-gray-700 dark:text-gray-200">
                                    Opis</label>

                                <textarea
                                    wire:model="description"
                                    wire:ignore
                                    id="description"
                                    x-data="{ resize: () => { $el.style.height = '500px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                    x-init="resize()"
                                    @input="resize()"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                focus:border-blue-500 dark:focus:border-blue-500
                                focus:outline-none focus:ring resize-none overflow-hidden"
                                ></textarea>
                                <i class="fas fa-question-circle p-1"></i><span class="text-sm text-gray-600">Krótki opis pomoże lepiej poznać Twoją/Waszą twórczość, ale linki do social mediów należy zamieścić w kolejnych polach.
</span>
                                @push('scripts')
                                    <script>
                                        HTMLTextAreaElement.prototype.getCaretPosition = function () { //return the caret position of the textarea
                                            return this.selectionStart;
                                        };
                                        HTMLTextAreaElement.prototype.setCaretPosition = function (position) { //change the caret position of the textarea
                                            this.selectionStart = position;
                                            this.selectionEnd = position;
                                            this.focus();
                                        };
                                        HTMLTextAreaElement.prototype.hasSelection = function () { //if the textarea has selection then return true
                                            return this.selectionStart !== this.selectionEnd;
                                        };
                                        HTMLTextAreaElement.prototype.getSelectedText = function () { //return the selection text
                                            return this.value.substring(this.selectionStart, this.selectionEnd);
                                        };
                                        HTMLTextAreaElement.prototype.setSelection = function (start, end) { //change the selection area of the textarea
                                            this.selectionStart = start;
                                            this.selectionEnd = end;
                                            this.focus();
                                        };

                                        var textarea = document.getElementsByTagName('textarea')[0];

                                        textarea.onkeydown = function (event) {

                                            //support tab on textarea
                                            if (event.keyCode == 9) { //tab was pressed
                                                var newCaretPosition;
                                                newCaretPosition = textarea.getCaretPosition() + "    ".length;
                                                textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                                                textarea.setCaretPosition(newCaretPosition);
                                                return false;
                                            }
                                            if (event.keyCode == 8) { //backspace
                                                if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                    var newCaretPosition;
                                                    newCaretPosition = textarea.getCaretPosition() - 3;
                                                    textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                                                    textarea.setCaretPosition(newCaretPosition);
                                                }
                                            }
                                            if (event.keyCode == 37) { //left arrow
                                                var newCaretPosition;
                                                if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                    newCaretPosition = textarea.getCaretPosition() - 3;
                                                    textarea.setCaretPosition(newCaretPosition);
                                                }
                                            }
                                            if (event.keyCode == 39) { //right arrow
                                                var newCaretPosition;
                                                if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                    newCaretPosition = textarea.getCaretPosition() + 3;
                                                    textarea.setCaretPosition(newCaretPosition);
                                                }
                                            }
                                        }
                                    </script>
                                @endpush

                                <p class="text-red-500 text-sm p-1 font-semibold">@error('description'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="deezer">Link do Deezer<i
                                        class="fab fa-deezer p-1"></i></label>
                                <input wire:model.debounce.500ms="deezer" id="deezer" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"/>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('deezer'){{ $message }}@enderror</p>

                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="youtube">Link do YouTube<i
                                        class="fab fa-youtube p-1"></i></label>
                                <input wire:model.debounce.500ms="youtube" id="youtube" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"/>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('youtube'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="soundcloud">Link do
                                    SoundCloud<i
                                        class="fab fa-soundcloud p-1"></i></label>
                                <input wire:model.debounce.500ms="soundcloud" id="soundcloud" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('soundcloud'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <i
                                    class="fas fa-question-circle" {{ Popper::pop(tip('info', 'To pole można edytować po skontaktowaniu się z <strong><a href="mailto:bartek@sempersum.pl">administratorem</a></strong>', "Spotify ID")) }}></i>

                                <label class="text-gray-700 dark:text-gray-200" for="spotify"> Spotify ID<i
                                        class="fab fa-spotify p-1"></i></label>
                                <input wire:model.debounce.500ms="spotify" id="spotify" type="text"
                                       placeholder="Wprowadź ID..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring disabled:bg-gray-100 disabled:dark:bg-gray-100"
                                       disabled>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('spotify'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="email">E-mail <i
                                        class="fas fa-envelope p-1"></i></label>
                                <input wire:model.debounce.500ms="email" id="email" type="text"
                                       placeholder="Wprowadź email..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('email'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="website">Strona internetowa <i
                                        class="fas fa-globe p-1"></i></label>
                                <input wire:model.debounce.500ms="website" id="website" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('website'){{ $message }}@enderror</p>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                    {{__('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
