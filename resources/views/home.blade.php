@extends ('layout')

@section ('content')
    <section id="home">
      <main class="home">
          <div class="flex-center position-ref">
              <div class="title m-b-md">
                  {{$title}}
              </div>
          </div>
          <div class="flex-center position-ref">
              <form method="GET" action="/search-git">
                  @csrf
                  <button id="search" class="button home-searching">Search</button>
              </form>
              <form method="GET" action="/list-git">
                  @csrf
                  <button id="list" class="button home-listing">List</button>
              </form>
          </div>
      </main>
    </section>
@endsection