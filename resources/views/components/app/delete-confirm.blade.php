 @props(['click' => 'delete' , 'confirmButton' =>  __('dialog.delete')])

 <div x-cloak x-show="deleteConfirm" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50" x-transition>
     <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-xl w-full max-w-sm space-y-4">
         <h2 class="text-lg font-bold text-gray-800 dark:text-white"> {{ __('dialog.areYouSure') }}</h2>
         <p class="text-sm text-gray-500 dark:text-gray-300">{{ $slot }}</p>
         <div class="flex justify-end gap-2">
             <button @click="deleteConfirm = false"
                 class="px-4 py-1 bg-gray-200 hover:cursor-pointer dark:bg-zinc-600 rounded">
                 {{ __('dialog.cancel') }}
             </button>
             <button wire:click="{{ $click }}" @click="confirmOpen = false"
                 class="px-4 py-1 hover:cursor-pointer bg-red-600 text-white rounded">
                    {{ $confirmButton }}
             </button>
         </div>
     </div>
 </div>
