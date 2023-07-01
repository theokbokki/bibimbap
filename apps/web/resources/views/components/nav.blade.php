<nav class="flex between center-y | mt-32 | nav">
    <h2 class="sr-only">Main nav</h2>
    <a href="/" class="title-small-medium {{ request()->is('auth*') ? 'clr-neutral-200' : 'clr-primary-400' }}">
        Bibimbap</a>

    <!-- The User avatar -->
    @if (auth()->check())
        <div class="grid | gy-8 | avatar">
            <input type="checkbox" class="sr-only">
            <label class="avatar-image">
                <img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
            </label>
            <div class="transparent-overlay"></div>
            <div class="grid | px-8 py-16 gy-16 radius-8 | avatar-actions">
                <a href="/profile" class="text-medium smooth | link no-underline">
                    View profile
                </a>
                <form action="/auth/login" method="post" class="pt-8 | avatar-logout">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-medium clr-error smooth pointer">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    @elseif(!request()->is('auth*'))
        <!-- The login et register links -->
        <div class=" flex center-y | gx-24">
            <a href="/auth/login" class="text-medium-large smooth | link">
                Login
            </a>
            <a href="/auth/register" class="btn">
                Register
            </a>
        </div>
    @endif
</nav>
