<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" placeholder="current password">
            <small>{{$errors->updatePassword->first('current_password') }}</small>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="new password">
            <small>{{$errors->updatePassword->first('password') }}</small>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="password_confirmation">
            <small>{{$errors->updatePassword->first('password_confirmation') }}</small>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
            <p data="{ show: true }" show="show" transition init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>