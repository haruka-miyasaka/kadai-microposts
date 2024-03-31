@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- タブ --}}
            @include('users.navtabs')
            <div class="mt-4">
                {{-- お気に入り一覧 --}}
                @if (isset($microposts))
                    <ul class="list-none">
                        @foreach ($microposts as $micropost)
                            <li class="flex items-center gap-x-2 mb-4">
                                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                                <div class="avatar">
                                    <div class="w-12 rounded">
                                        <img src="{{ Gravatar::get($user->email) }}" alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        {{ $micropost->content }}
                                    </div>
                                    <div>
                                        {{-- ユーザ詳細ページへのリンク --}}
                                        <p><a class="link link-hover text-info" href="{{ route('users.show', $micropost->user->id) }}">View profile</a></p>
                                    </div>
                                    @include('favorite.favorite_button')    
                                    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- ページネーションのリンク --}}
                    {{ $microposts->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection