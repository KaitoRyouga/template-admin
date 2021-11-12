<td>
     @if ($item->{$itemField['name']} == 0)
         <a href="{{route('admin.user.active', ['id'=>$item->{$itemField['id']}])}}" class="btn btn-danger">deactive</a> 
     @else
          <a href="{{route('admin.user.deactive',['id'=>$item->{$itemField['id']}])}}" class="btn btn-success">active</a> 
     @endif

</td>
