@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                    <div class="btn btn-group">
                        <a class="btn btn-sm btn-success" href="{{ route('post.create') }}">
                            New
                        </a>
                    </div>
                    
                    <table class="table table-striped table-hover" id="post-table" width="100%">
                        <thead>
                            <tr>
                                <th>Manage</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Author</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <div class="btn btn-group">
                                            <a class="btn btn-sm btn-warning" href="{{ route('post.change') }}?idpost={{ $post->idpost }}">
                                                Edit
                                            </a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('post.delete') }}?idpost={{ $post->idpost }}">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->date }}</td>
                                    <td>{{ $post->username }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
