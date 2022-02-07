<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О сайте</h4>
                    <p class="text-muted"> На этом сайте вы найдете много новостей.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
{{--                        <h2>Привет, {{ Auth::user()->name }}</h2>--}}
                        <br>
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.index') }}" style="color:red">В админку</a>
                            <br>
                        @endif
                        <a href="{{ route('account.logout') }}">Выход</a>
{{--                        <li><a href="{{route('admin.index')}}" class="text-white">ADMIN</a></li>--}}
{{--                        <li><a href="{{route('admin.index')}}" class="text-white">--}}
{{--                                <div>--}}
{{--                                    <form method="post" action="{{ route('admin.categories.store') }}">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="name">Ваше имя</label>--}}
{{--                                            <input type="text" class="form-control" id="name" name="name" required>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="phone">Номер телефона</label>--}}
{{--                                            <input type="text" class="form-control" name="phone" id="phone">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="email">Email</label>--}}
{{--                                            <input type="email" class="form-control" name="email" id="email">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="newsToFind">Что ищем?</label>--}}
{{--                                            <textarea class="form-control" name="newsToFind" id="newsToFind"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <br>--}}
{{--                                        <button type="submit" class="btn btn-success" style="float: right;">Найти</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('news') }}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Shamma news</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
