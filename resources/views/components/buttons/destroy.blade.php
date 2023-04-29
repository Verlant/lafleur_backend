<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<form method="POST" action="{{ $action }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn-red"
        onclick='return confirm("Etes-vous sûr de vouloir supprimer cet élément de la base de données définitivement ?")'>{{ __('Supprimer') }}</button>
</form>
