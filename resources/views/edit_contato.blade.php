<form method="POST" action="{{ route('contatos.update', $contact->id) }}">
    @csrf
    @method('PUT')
    
    <input type="text" name="nome" value="{{ $contact->nome }}">
    <input type="text" name="sobrenome" value="{{ $contact->sobrenome }}">
    <input type="date" name="data_nascimento" value="{{ $contact->data_nascimento }}">
    <input type="text" name="telefone" value="{{ $contact->telefone }}">
    <input type="text" name="celular" value="{{ $contact->celular }}">
    <input type="email" name="email" value="{{ $contact->email }}">
    <!-- <input type="text" name="empresa" value="{{ $contact->empresa->nome }}"> -->
    <button type="submit">Salvar</button>
</form>
