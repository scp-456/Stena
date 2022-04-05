{{-- Проверка авторства --}}
{{-- Редактирование (проверка есть ли сообщение) --}}

@if ((Auth::id()!="") && (isset ($_POST['edit']))) 
<?
if (isset($_POST['doaction']) && $_POST['doaction'] === 'edit1'){
  $query = DB::table('stena')
                ->where('id', $_POST['edit'])
                ->update(['text' => $_POST['text'], 'updated_at' => date("Y-m-d H:i:s")]);
// echo "<pre>";
// print_r($query);
// echo "</pre>"; 
    // if (Auth::id() == $query->user_id){ 
    // echo "Это автор сообщения";
    // }
    // else unset ($_POST);  
}
// echo Auth::id();
?> 

@endif
{{-- Само редактирование --}}
@if ((Auth::id()!="") && (isset ($_POST['edit'])))



<?
  if (isset($_POST['fedit'])){
  $_POST['fedit'] = (int) $_POST['fedit'];
  $just = $_POST['fedit'] ;
  $twojust = $_POST['theme']; 
  $affected = DB::table('stena')
              ->where('id', '=', $just)
              ->update(['theme' => $twojust]);
              // ->toSql();
  // echo $affected;            
              $affected = DB::table('stena')
              ->where('id', $_POST['fedit']) 
              ->update(['text' => $_POST['text']]);
  
  // echo $affected;
 
//  echo "<pre>";
//   print_r($_POST);
//   echo "</pre>";
  
 }
?>

<?
  $query = DB::table('stena')
                ->select('theme', 'text')
                ->where('id', '=', $_POST['edit'])->where('user_id', '=', Auth::id())
                ->get();
  // echo "<pre>";
  // print_r($query);
  // echo "</pre>";  
         
  // $deleted = DB::table('stena')->where('id', '=', $_POST['edit'])->where('user_id', '=', Auth::id())->delete();
?>

{{-- @foreach ($query as $row)

@endforeach --}}

{{-- Форма редактирования сообщения --}}
<form action='/action' method="post">
  @csrf
 
  <?
   $id = $_POST['edit'];
    $text = $query[0]->text;
    $theme = $query[0]->theme;
  ?>

  <label for="fname">Тип:</label>
  
  <input type="radio" id="contactChoice1"
     name="theme" value="Важно"
    @if ($theme=="Важно") 
    checked @endif> 
    <label for="contactChoice1">Важно</label>
  
  
    <input type="radio" id="contactChoice2"
     name="theme" value="Неважно"
    @if ($theme=="Неважно") 
    checked @endif>
    <label for="contactChoice2">Неважно</label>
    
  {{-- <input type="text" id="fname" name="theme" value=""> --}}
  <br><br>
  <textarea class="form-control " id="w3review" name="text" rows="6" cols="50" >{{$text}}</textarea> 
  <input type="hidden" name="doaction" value="edit1"> 
  <input type="hidden" name="edit" value=<?= $_POST['edit'] ?>>    
  <input type="hidden" name="fedit" value="{{ $_POST['edit'] }}"> 
  <br>
  <button type="submit" class="btn btn-primary">Редактировать</button>             
  {{-- <input type="submit" value="Редактировать"> --}}
</form>
@endif