<section>
    <header>
        <h2 class="text-lg font-medium text-pink-600 dark:text-pink-300">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-pink-600 dark:text-pink-300" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-pink-600 dark:text-pink-300" />
        </div>
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-pink-600 dark:text-pink-300" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-pink-600 dark:text-pink-300" />
        </div>
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-pink-600 dark:text-pink-300" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-pink-600 dark:text-pink-300" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 border-none text-white hover:from-pink-600 hover:to-yellow-500">{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-pink-600 dark:text-pink-300"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
