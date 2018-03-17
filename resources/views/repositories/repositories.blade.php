@extends ('layout')

@section ('content')
    <section id="repos-list">
        <main class="repos-list">
            @if ($language && $language!='all')
            <div class="flex-center position-ref">
                <div class="title m-b-md">
                    {{$language}}
                </div>
            </div>
            @endif
            <div class="search-for-language">
                <form method="GET" action="/list-git" class="">
                    @csrf
                    <select title="language" name="language" class="custom-select fo">
                        <option>all</option>
                        <option value="php">php</option>
                        <option value="assembly">assembly</option>
                        <option value="javascript">javascript</option>
                        <option value="clojure">clojure</option>
                        <option value="swift">swift</option>
                    </select>
                    <button type="submit" id="search" class="button search-btn">Search</button>
                </form>
            </div>
            <div class="list-wrapper">
            @foreach ($repos as $repo)
                @include ('repositories.repository')
            @endforeach
            </div>
        </main>
    </section>
@endsection