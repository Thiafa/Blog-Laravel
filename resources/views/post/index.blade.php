@extends('layouts.app')
@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4 col-4">
            @foreach ($posts as $key => $post)
                <div class="card bg-white card-md my-4">
                    <div class="card-body  mx-4" id="infinite-scroll-feed">
                        <h2 class="h2 text-center mb-4">Posts</h2>
                        <p class="text-center">{{ $post->id }}</p>
                        <p class="text-center">{{ $post->name }}</p>
                        <img src="{{ asset('img/cacto.jpg') }}" class="w-50 h-50 " alt="">
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('js')
    <script>
        let page = 1;
        const perPage = 10;

        function loadMoreItems() {
            // Exibir o indicador de carregamento
            document.getElementById('loading-indicator').style.display = 'block';

            // Fazer uma solicitação AJAX para carregar mais itens
            axios.get(`/load-more-items?page=${page + 1}`)
                .then((response) => {
                    const items = response.data;
                    const list = document.getElementById('infinite-scroll-feed');
                    items.forEach((item) => {
                        const listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.textContent = item.title;
                        list.appendChild(listItem);
                    });
                    page += 1;

                    // Ocultar o indicador de carregamento
                    document.getElementById('loading-indicator').style.display = 'none';
                })
                .catch((error) => {
                    console.error('Erro ao carregar mais itens:', error);
                });
        }

        // Adicionar um ouvinte de evento de rolagem
        window.addEventListener('scroll', () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
                loadMoreItems();
            }
        });

        // Carregar mais itens inicialmente
        loadMoreItems();
    </script>
@endsection
