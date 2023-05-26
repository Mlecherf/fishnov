<div> 


    <div class="container mx-auto">
        <div class="w-full max-w-md mx-auto">
            <form method="POST" action="/company/add">
                @csrf

                <div>
                    <label for="name_company">
                        {{ __('Company Name') }}
                    </label>
                    <input id="name_company" type="text" name="name_company" value="{{ old('name_company') }}" required autofocus>
                </div>

                <div>
                    <label for="name_admin_company">
                        {{ __('Admin Name') }}
                    </label>
                    <input id="name_admin_company" type="text" name="name_admin_company" value="{{ old('name_admin_company') }}" required>
                </div>

                <div>
                    <label for="password_admin_company">
                        {{ __('Admin Password') }}
                    </label>
                    <input id="password_admin_company" type="password" name="password_admin_company" required>
                </div>

                <div>
                    <button type="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>