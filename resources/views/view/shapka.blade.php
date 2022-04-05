{{-- Шапка --}}  
  <nav class="navbar navbar-light " style="background-color: #000000;">
    
      
    <!-- Контент навигационной панели -->
  
<div >
    
    @if (Route::has('login'))
        <div >
            <a class="navbar-brand" href="action" >Открыть сообщения</a>            
            @auth
                {{-- <a href="{{ url('/dashboard') }}" >Dashboard</a> --}}
            @else
                <a class="navbar-brand" href="{{ route('login') }}" >Авторизироваться</a>
  
                @if (Route::has('register'))
                    <a class="navbar-brand" href="{{ route('register') }}" >Зарегестрироваться</a>
                @endif
            @endauth
        </div>
    @endif
    
  </div>  
</nav>

@if (Auth::id()!="") 
<form method="POST" action="{{ route('logout') }}" >
  @csrf

  <x-dropdown-link :href="route('logout')"
          onclick="event.preventDefault();
                      this.closest('form').submit();" class="btn btn-success" >
      {{ __('Выйти') }}
    
  </x-dropdown-link>
</form>
@endif
<br><br>