<div class="box box-info collapsed-box" id="question">
  <div class="box-header with-border">
    <h3 class="box-title" data-toggle="modal" data-target="#question-dialog">Question</h3>
    <div class="modal fade" id="question-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Question
              <small>
                <button type="button" name="add-question" class="btn btn-primary" id="add-question">
                  <span class="fa fa-plus"></span> Add An Question
                </button>
              </small>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="question-container">
            <div class="modal-body row" id="q-1">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="question-1">Question -1</label>
                  <textarea name="question-1" class="editor form-control" id="question-1" rows="8" cols="80" placeholder="Enter your Question here"></textarea>
                </div>
              </div>
              <hr/>
              <div class="col-md-6">
                <div class="form-group input-group">
                  <input type="text" class="form-control option-input" name="q1o1" placeholder="Option 1">
                      <div class="input-group-addon">
                        <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-q1o1" value="1">
                      </div>
                </div>
                <div class="form-group input-group">
                  <input type="text" class="form-control option-input" name="q1o2" placeholder="Option 2">
                      <div class="input-group-addon">
                        <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                      </div>
                </div>
                <div class="form-group input-group">
                  <input type="text" class="form-control option-input" name="1" id="1" placeholder="Option 1">
                      <div class="input-group-addon">
                        <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                      </div>
                </div>
                <div class="form-group input-group">
                  <input type="text" class="form-control option-input" name="1" id="1" placeholder="Option 1">
                      <div class="input-group-addon">
                        <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                      </div>
                </div>
                <div class="form-group input-group">
                  <input type="text" class="form-control option-input" name="1" id="1" placeholder="Option 1">
                      <div class="input-group-addon">
                        <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                      </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" name="dif" required>
                      @if (isset($content->dif))
                        @foreach ($arrangement->dif($content->dif) as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      @else
                        @foreach ($arrangement->dif() as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      @endif

                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <ul class="pagination question-pannel">
              <li class="question-no"><span>1</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
