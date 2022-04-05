{{-- Форма добавки  сообщения--}}
@if ((Auth::id()!="") && (!isset ($_POST['edit'])))
<form action="{{url('/action')}}" method="post">
  @csrf


  <label for="fname">Тип:</label>
  <input type="radio" id="contactChoice1"
     name="theme" value="Важно" checked=false>
    <label for="contactChoice1">Важно</label>

    <input type="radio" id="contactChoice2"
     name="theme" value="Неважно" checked=true>
    <label for="contactChoice2">Неважно</label>
  {{-- <input type="text" id="fname" name="theme"> --}}
  <br><br>


  <textarea class="form-control" id="w3review" name="text" rows="6" cols="50"></textarea> 
  <input  type="hidden" name="doaction" value="add"> 
  <br>
  <button type="submit" class="btn btn-primary ">Добавить сообщение </button>
  {{-- <input type="submit" value="Добавить сообщение"> --}}
</form>
@endif