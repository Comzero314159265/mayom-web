<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($member->user_id) ? $member->user_id : ''}}" required>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('team_id') ? 'has-error' : ''}}">
    <label for="team_id" class="control-label">{{ 'Team Id' }}</label>
    <input class="form-control" name="team_id" type="number" id="team_id" value="{{ isset($member->team_id) ? $member->team_id : ''}}" required>
    {!! $errors->first('team_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('member_role_id') ? 'has-error' : ''}}">
    <label for="member_role_id" class="control-label">{{ 'Member Role Id' }}</label>
    <input class="form-control" name="member_role_id" type="number" id="member_role_id" value="{{ isset($member->member_role_id) ? $member->member_role_id : ''}}" required>
    {!! $errors->first('member_role_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
