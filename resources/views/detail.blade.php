<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <!-- @foreach($data as $datas)
      <li>{{$datas->name}}</li>
      @endforeach -->

          <!-- // for else -->
      <!-- @forelse($data as $datas)
      <li>{{$datas->name}}</li>
      @empty
      <p>No users</p>
     @endforelse -->
    

     <!--Switch case--!>
     <!-- @switch($i=3)
    @case(1)
    {{ jhel}}
         <!-- <li>{{$data}}</li> -->
        <!-- @break

     @case(2) -->
    
         <!-- <li>{{$data}}</li>
          @break

         @default
        {{$data}}
        @endswitch --> -->
                     

             <!-- @for ($i = 0; $i < 10; $i++)
             <li>{{ $data }}<li>
                @endfor -->
              
                <!-- @while (false)
                <p>{{$data}}.</p>
                    @endwhile -->


                    for each with condition

                <!-- @foreach($data as $datas)   
                 @if($datas->name=='Salman') 
                 {{'HEloo'}}
                    @continue
                 @endif
                 @if($datas->id==5) 
                  @break
                 @endif
                 @endforeach -->

                 @foreach ($data as $user)
                 @if ($loop->first)
                    This is the first iteration.
                     @endif

                     @if ($loop->last)
                    This is the last iteration.
                    @endif

                 <p>This is user {{ $user->id }}</p>
                    @endforeach
                 

                 
</body>
</html>