    {{-- Вывод стены сообщений --}}
    <?

     $users = DB::table('stena')
                 ->join('users', 'users.id', '=', 'stena.user_id')
                ->select('stena.*' , 'users.name')     
               ->orderBy('updated_at', 'desc')
               ->get();     
     echo "<br><br>";
      echo "В таблице ".count($users)." записей";

     // DB::table('stena')->where('name', '=', 'user_id')->dump();        
     
    ?> 
    
    <br>
    <table border="2" bgcolor="#40E0D0" cellpadding="15" class="table">
      <tr class="success">
       <th>№</th>
       <th>Имя пользователя</th>
       <th>Тема</th>
       <th>Сообщение</th>
       <th>Создано</th>
       <th>edit</th>
       <th>del</th>
      </tr>
    @foreach ($users as $user) 
        <tr >
        <td >{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->theme}}</td>
        <td>{{$user->text}}</td>
        <td>{{$user->updated_at}}</td>

        
        <td ><form action='/action' method='POST'> @csrf 
               <? if (Auth::id() == $user->user_id){ ?>   
              <input name='edit' type='hidden' value={{$user->id}} > 
              <input id='doaction_id' name='doaction' type='hidden' value='edit' >   
              <input  class="btn btn-warning" type='submit' value='Редактировать'> <? }; ?> </form></td>
         <td><form action='/action' method='POST'> @csrf 
               <? if (Auth::id() == $user->user_id){ ?>  
              <input name='del' type='hidden' value={{$user->id}} > 
              <input id='doaction_id' name='doaction' type='hidden' value='del' >   
              <input class="btn btn-danger" type='submit' onclick="return confirm('Вы действительно хотите удалить сообщение? \n {{$user->text}}')" value='Удалить'> 
              <? }; ?></form></td>
               
          </tr> 
    @endforeach
    </table>