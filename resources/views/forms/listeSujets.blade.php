@extends('../index')

@section('title')
    Forum - Les sujets
@endsection

@section('content')
   @foreach($sujets as $sujet)
      <div class="row col-md-12">
            <div class="col-md-3" >
              <img src="../resources/assets/images/{{$sujet->pj}}" style="background-color:green; border-radius:50%; height:30px; width:30px;">
            </div>
           <div class="col-md-4">
               <p class="text-primary">{{$sujet->titre}}</p>
           </div>
           <div class="col-md-3">
               <p class="text-warning"><a href="{{route('commentaires',['id'=>$sujet->id])}}">Voir commentaires>></a></p>
           </div>
           <div class="col-md-2">
               <p><a class="text-danger" href="{{route('deleteSujet',['id'=>$sujet->id])}}" onclick="if (!confirm('Supprimer le sujet ?')){event.preventDefault();}">Supprimer</a></p>
           </div>
      </div><hr>
   @endforeach
   <a class="pull-right bnt-btn-info" href="{{ route('ajouterSujet')}}">Ajouter un autre sujet</a>
   <hr>
@endsection