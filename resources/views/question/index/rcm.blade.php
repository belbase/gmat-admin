<tr>
  <td>
    <span data-toggle="modal" data-target="#modal-{{ $item['qid'] }}">{!! 'Question -'.$i !!}</span>
    <div class="modal fade" id="modal-{{ $item['qid'] }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{!! 'Question -'.$i !!}</h4>
          </div>
          <div class="modal-body" style="overflow-y:auto;max-height:450px;">
            {!! $item->content !!}
            @if (isset($item->statement))
              <p> <b>{!! $item->statement !!}</b></p>

            @endif
            @if (isset($item->options))
              <ol type="a">
                @foreach ($item->options as $key => $value)
                  @if ($value->is_correct==1)
                    <li class="text-success"><b>{{ ucfirst($value->content) }} </b></li>
                  @else
                    <li> {{ ucfirst($value->content) }} </li>
                  @endif
                @endforeach

              </ol>
            @endif
          </div>
        </div>
        {{-- /.modal-content --}}
      </div>
      {{-- /.modal-dialog --}}
    </div>
    {{--  /.modal --}}
  </td>
  <td>{!! $arrangement->getSub($item->cat) !!}</td>
  <td>
    <form action="/question/edit" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="section" value="{{ $db }}">
    <input type="hidden" name="id" value="{{ $item['qid'] }}">
    <button type="submit" class="no-btn"><i class="fa fa-edit"></i> edit</button>
    <a href="#" data-toggle="modal" class="no-btn" data-target="#del-box-{{ $item['qid'] }}"><i class="fa fa-trash-o"></i> Delete</a>
  </form>

      {{-- The Starting of the Modal  --}}
      <div class="modal fade" id="del-box-{{ $item['qid'] }}">
        <div class="modal-dialog">
          <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            {{-- Modal body --}}
            <div class="modal-body">
              Do You Want to Delete The Question?
            </div>

            {{-- Modal footer --}}
            <div class="modal-footer">
              <form action="/question/delete" method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <input type="hidden" name="section" value="{{ $db }}">
                <input type="hidden" name="id" value="{{ $item['qid'] }}">
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End of the Delete Model --}}
  </td>
  <td>{{ date('M d, Y - h:i:s A', strtotime($item['updated_at'])) }}</td>
</tr>
