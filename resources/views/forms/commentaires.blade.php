@extends('../index')

@section('title')
    Forum - Commentaires
@endsection

@section('content')
    
    <!--Titre du sujet-->
    @if(Session::has('sid'))
      <div class="row col-md-12">
        <div class="col-md-9">
            <h2 class="text-warning"><i class=""><i>{{Session::get('stitre')}}</h2>
        </div>
        <div class="col-md-3" >
            <img src="../../resources/assets/images/{{Session::get('spj')}}" style="background-color:green; border-radius:50%; height:70px; width:70px;">
        </div>
      </div>
    @endif
    <!--Fin-->
   
   
   <!--Ajouter un autre commentaire à ce sujet-->
    <div class="col-md-12">
         @if(Session::has('errorBecauseCommentEmpty'))
                <div class="alert alert-danger">{{Session::get('errorBecauseCommentEmpty')}}</div>
         @endif
        <form method="post" action="{{route('validerCommentaire')}}">
            <div class="form-group">
                <label for="commentaire">Laisser un commentaire</label>
                <textarea class="form-control" name="commentaire" id="commentaire" placeholder="Commentaire:"></textarea>
            </div>
                
            <input type="hidden" name="sujet"> <!--value="sujet"--> 
            
            <input type="hidden" name="_token" value="{{csrf_token()}}">
           
            <div class="form-group">
                <button type="submit" class="btn btn-info">Ajouter</button>
            </div>
        </form>
    <div
    <!--Ses differents commentaires-->
    @foreach($commentaires as $commentaire)
      <div class="row col-md-12">
          <div class="col-md-2">
              <p>User {{$commentaire->uid}}</p>
          </div>
          <div class="col-md-5">
              <p class="text-primary">{{$commentaire->text}}</p>
          </div>
          <div class="col-md-3">
             <p class="text-primary">{{($commentaire->created_at)->format('D M Y')}} at {{($commentaire->created_at)->format('H:i:s')}}</p>
          </div>
          <div class="col-md-2">
             <a class="text-danger" href="{{route('deleteComment',['id'=>$commentaire->id])}}"  onclick="if (!confirm('Supprimer le commentaire ?')){event.preventDefault();}">Supprimer</a>
          </div>
     </div><hr>
    @endforeach
@endsection