
<table class="table">
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td>
                    <small>{{ $comment->user->name}}</small>
                    <p>{{ $comment->comment }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </td>
                <td class="td-actions text-right">
                <button type="button" rel="tooltip" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-primary btn-link btn-sm"
                        data-original-title="Edit Comment">
                    <i class="material-icons">edit</i>
                </button>
                <a href="{{ route('comments.delete' , ['id' =>$comment->id]) }}" rel="tooltip" class="btn btn-danger btn-link btn-sm"
                     data-original-title="Remove Comment">
                    <i class="material-icons">close</i>
                </a>
                </td>
            </tr>
            <tr style="display: none">
                <td colspan="4">
                    <form action="{{ route('comments.update' , ['id' =>$comment->id]) }}" method="post">
                        @csrf
                        @include('back-end.comments.form' , ['row' =>$comment])
                        <input type="hidden" name="video_id" value="{{ $row->id }}">
                        <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
                        <div class="clearfix"></div>
                      </form>
                </td>
            </tr>
      @endforeach
    </tbody>
  </table>
