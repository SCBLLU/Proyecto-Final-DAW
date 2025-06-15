<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-pink-600 dark:text-pink-300">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 border-none text-white hover:from-pink-600 hover:to-yellow-500"
    >{{ __('Delete Account') }}</x-danger-button>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-pink-600 dark:text-pink-300">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>
            <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-pink-600 dark:text-pink-300" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-200 dark:bg-neutral-700 text-gray-700 dark:text-white">{{ __('Cancel') }}</x-secondary-button>
                <x-danger-button class="ms-3 bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 border-none text-white hover:from-pink-600 hover:to-yellow-500">{{ __('Delete Account') }}</x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
