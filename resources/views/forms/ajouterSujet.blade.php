@extends('../index')

@section('title')
    Forum - Ajout d'un sujet
@endsection

@section('content')
    <div class="col-md-12">
        <form method="post" action="{{ route('validerSujet')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titre">Titre sujet </label>
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre:">
            </div>
            <div class="form-group">
                <label for="description">Description sujet</label>
                <textarea  class="form-control" name="description" id="description" placeholder="Description:"></textarea>
            </div>
            <div class="form-group">
                <label for="pj">Image sujet</label>
                <input type="file" name="pj" id="pj">
            </div>
                
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            
            <div class="row col-md-12">
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-info pull-left">Ajouter le sujet</button>
                </div>
            <div>
        </form>
    </div>
@endsection