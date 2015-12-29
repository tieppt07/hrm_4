<!-- Modal -->
<div class="modal fade" id="editModal{{$position->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit position</h4>
            </div>
            {!! Form::open(['method' => 'PATCH', 'url' => "positions/{$position->id}"]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-12">
                            {!! Form::label('name', 'Name:', ['class' => 'control-lable']) !!}
                            {!! Form::text('name', $position->name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-12">
                            {!! Form::label('description', 'Email:', ['class' => 'control-lable']) !!}
                            {!! Form::textarea('description', $position->description, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
