<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<form method="POST" action="{{ $action }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn-red">{{ __('Supprimer') }}</button>
</form>
