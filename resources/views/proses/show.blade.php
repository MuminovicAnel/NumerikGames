{{--
  -- Show
  -- Layout for proses show page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div id="prose-id">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{$prose->theme->name}}</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($versesLast as $verse)
                        <div>
                            <p class="text-center">{{$verse->content}}</p>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="content" id="verse" type="text" placeholder="Une souris verte..." autofocus>
                    </div>
                    <div>
                        <button class="btn btn-outline-success btn-lg btn-block" type="submit" name="addVerse" id="addVerse" data-toggle="modal" data-target="#exampleModalCenter">Ajouter mon texte</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header modal-header-centered">
            <h5 class="modal-title" id="exampleModalLongTitle">Est-ce que ce vers vous convient ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @foreach ($versesLast as $verse)
                <p class="text-center">{{$verse->content}}</p>
            @endforeach

        <form method="POST" action="{{ route('verses.store', ['prose_id' => $prose ]) }}">
            @csrf
            <p class="text-center" name="content" id="modalVerse" type="text"></p>
            <input class="form-control form-control-lg" name="content" id="verse" type="hidden">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary" id="addVerse">Enregistrer</button>
        </form>
        </div>
        </div>
    </div>
    </div>

@endsection
