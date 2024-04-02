<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>API de Contatos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
    </head>
    <body class="">
    <div>
        <div class="min-h-screen bg-white flex items-start justify-center">
            <div class="w-full max-w-screen-lg ">
                <h1 class="text-4xl font-semibold text-black text-center">API de Contatos</h1>
                <p class="text-sm text-black text-center mt-4">API de contatos desenvolvida com Laravel.</p>
                 <div>
                  <div>                      
                    <a href="{{ route('contatos') }}" class='bg-blue-400 text-white rounded-md p-2'>Limpar Filtros</a>
                    <button onclick='filterContacts()' class='bg-blue-400 text-white rounded-md p-2'>Filtrar</button>
                  </div>
                  <div class='flex'>
                    <input type="text" id="nomeSobrenomeInput" placeholder="Nome Sobrenome">
                    <input type="text" id="dataNascInput" placeholder="Data de Nascimento">
                    <input type="text" id="telefoneInput" placeholder="Telefone">
                    <input type="text" id="celularInput" placeholder="Celular">
                    <input type="text" id="emailInput" placeholder="Email">
                    <input type="text" id="empresaInput" placeholder="Empresa">                    
                  </div>

                  <script>
                      function filterContacts() {
                          const empresa = document.getElementById('empresaInput').value;
                          const nomeSobrenome = document.getElementById('nomeSobrenomeInput').value;
                          const dataNasc = document.getElementById('dataNascInput').value;
                          const telefone = document.getElementById('telefoneInput').value;
                          const celular = document.getElementById('celularInput').value;
                          const email = document.getElementById('emailInput').value;                          

                          const queryParams = new URLSearchParams({
                              empresa,
                              nome_sobrenome: nomeSobrenome,
                              data_nascimento: dataNasc,
                              telefone,
                              celular,
                              email                              
                          });

                          const filterUrl = "{{ route('contatos') }}?" + queryParams.toString();
                          window.location.href = filterUrl;
                      }
                  </script>
                </div>
                <form class='mt-4 pt-2 border-t-2 border-zinc-500 ' method="POST" action="{{ route('contatos.store') }}">
                  @csrf
                  <button type='submit' class='bg-green-400 text-white rounded-md p-2 mt-4'>Adicionar contato</button>
                  <div class='flex flex-wrap'>
                    <input type="text" name="nome" placeholder="Nome">
                    <input type="text" name="sobrenome" placeholder="Sobrenome">
                    <input type="date" name="data_nascimento" placeholder="Data de Nascimento">
                    <input type="text" name="telefone" placeholder="Telefone">
                    <input type="text" name="celular" placeholder="Celular">
                    <input type="email" name="email" placeholder="Email">
                    <select name="empresa">
                      @foreach ($empresas as $empresa)
                      <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                      @endforeach
                    </select>
                  </div>                  
                </form>
                <h1 class='my-4 text-lg text-center'>Contatos</h1>
                <div class="mt-16">
                    <table class="w-full border-collapse border border-zinc-500">
                        <thead>
                            <tr>
                                <th class="border border-zinc-500 px-3 py-2">Nome</th>
                                <th class="border border-zinc-500 px-3 py-2">Sobrenome</th>
                                <th class="border border-zinc-500 px-3 py-2">Data de Nascimento</th>
                                <th class="border border-zinc-500 px-3 py-2">Telefone</th>
                                <th class="border border-zinc-500 px-3 py-2">Celular</th>
                                <th class="border border-zinc-500 px-3 py-2">Email</th>
                                <th class="border border-zinc-500 px-3 py-2">Empresa</th>
                                <th class="border border-zinc-500 px-3 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->nome }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->sobrenome }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->data_nascimento }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->telefone }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->celular }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->email }}</td>
                                <td class="border border-zinc-500 px-3 py-2">{{ $contact->empresa->nome }}</td>
                                <td class="border border-zinc-500 px-3 space-y-2">
                                  <a href="{{ route('contatos.edit', $contact->id) }}" class='bg-blue-400 text-white rounded-md p-2'>Editar</a>
                                  <form method="POST" action="{{ route('contatos.delete', $contact->id) }}" onsubmit="return confirm('Deseja realmente excluir este contato?')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class='bg-red-400 text-white rounded-md p-2'>Excluir</button>
                                  </form>
                                  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>               
            </div>
        </div>
    </div>
</body>

</html>
