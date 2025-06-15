<section>
    <header>
        <h2 class="text-lg font-medium text-pink-600 dark:text-pink-300">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-pink-600 dark:text-pink-300" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-pink-600 dark:text-pink-300" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-pink-600 dark:text-pink-300" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-pink-50 dark:bg-neutral-800 border border-pink-200 dark:border-pink-900 text-gray-900 dark:text-white rounded focus:border-pink-400 focus:ring-pink-200" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-pink-600 dark:text-pink-300" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-pink-700 dark:text-pink-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-pink-600 hover:text-pink-800 dark:text-pink-300 dark:hover:text-pink-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 border-none text-white hover:from-pink-600 hover:to-yellow-500">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
