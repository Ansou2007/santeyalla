@extends('layouts.master')
@section('contenu')
    <div class="card">
        <div class="card-header">
        <h5 class="card-title">CONFIGURATION</h5>
        </div>
        <a href="{{route('Reglage.ajout')}}" class="btn btn-primary ms-auto float-end">Ajouter</a>

        <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-hover" id="utilisateur">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Valeur</th>
                    <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reglage as $reglage ) 
                    <tr> 
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$reglage->type}} </td>
                    <td>{{$reglage->value}} </td>
                    <td></td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
        </div>
        </div>
        </div>
        
        <script>
            $(document).ready(function(){
                $('#utilisateur').DataTable();

                /* @if (session()->has('Message'))
                    Swal.fire('Utilisateur',"{{session()->get('Message')}}",'info');
                @endif */
        

                })
        </script> 
       
@endsection
 

