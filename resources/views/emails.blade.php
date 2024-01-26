<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Emails') }}
            </h2>
            <div x-data="{ open: false }">
                <button x-on:click="open = true" class="py-2 px-4 rounded-md bg-indigo-600 text-white font-semibold">Compose Email</button>
                <div class="fixed top-0 left-0 h-full w-full" x-show="open" x-cloak x-transition>
                    <div class="w-full h-full flex items-center justify-center" x-on:click.self="open = false">
                        <form action="{{ route('email.send') }}" class="max-w-xl shadow-2xl p-6 rounded-lg bg-white w-full" enctype="multipart/form-data" method="POST">
                            @csrf
                            <h2 class="text-3xl mb-4 font-bold">Compose your email</h2>
                            <div class="mb-3 w-full">
                                <x-input-label for="email" :value="__('To Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-3 w-full">
                                <x-input-label for="subject" :value="__('Subject')" />
                                <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>

                            <div class="mb-3 w-full">
                                <x-input-label for="body" :value="__('Content')" />
                                <textarea id="editor" name="body"></textarea>
                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            </div>

                            <label for="files" class="mb-3 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-gray-100">
                                        <img width="20px" src="https://api.iconify.design/gg:attachment.svg?color=%23262626">
                                    </div>
                                    <h4 class="ml-3 font-semibold">Attachement files (no folders)</h4>
                                </div>
                            </label>
                            <input id="files" class="hidden" type="file" name="files[]" multiple>

                            <x-primary-button class="mt-3">
                                {{ __('Send') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (count($emails))
                    <table class="w-full">
                        <tr class="text-sm text-white bg-gray-800">
                            <th class="p-2 text-start">Email</th>
                            <th class="text-start">Subject</th>
                            <th class="text-start">Body</th>
                            <th class="text-end">Attachments</th>
                            <th class="p-2 text-end">Sent</th>
                        </tr>
                        @foreach ($emails as $item)
                            <tr class="text-sm odd:bg-gray-100">
                                <td class="p-2 text-start">{{ $item->email }}</td>
                                <td class="text-start">{{ $item->subject }}</td>
                                <td class="text-start" x-data="{ open: false }">
                                    <span x-on:click="open = !open" class="underline text-indigo-600 cursor-pointer">View</span>
                                    <div class="fixed bottom-3 left-3 flex items-center justify-center" x-show="open" x-cloak x-transition>
                                        <div class="max-w-xl shadow-2xl p-6 rounded-lg bg-white w-full relative">
                                            <img width="40px" class="absolute -top-6 -right-6" src="https://api.iconify.design/material-symbols:cancel-rounded.svg?color=%23e42f2f" x-on:click.self="open = false">
                                            {!! $item->body !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end" x-data="{ open: false }">
                                    @if (count($item->attachments))
                                        <span x-on:click="open = !open" class="text-red-600 font-semibold cursor-pointer">{{ count($item->attachments) }}</span>
                                        <div class="fixed bottom-3 left-3 flex items-center justify-center" x-show="open" x-cloak x-transition>
                                            <div class="max-w-xl shadow-2xl p-6 rounded-lg bg-white w-full relative">
                                                <img width="40px" class="absolute -top-6 -right-6" src="https://api.iconify.design/material-symbols:cancel-rounded.svg?color=%23e42f2f" x-on:click.self="open = false">
                                                
                                                <ul class="ml-3">
                                                    @foreach ($item->attachments as $attachment)
                                                        <li>{{ $attachment->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <span>None</span>
                                    @endif
                                </td>
                                <td class="p-2 text-end">{{ $item->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($emails->hasPages())
                        <div class="py-3">
                            {{ $emails->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No emails data exist!</p>
                @endif
            </div>
        </div>
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
    </div>
</x-app-layout>