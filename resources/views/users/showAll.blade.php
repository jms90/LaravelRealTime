@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <p class="card-text">Podrás ver en vivo cuando se crean/borran/actualizan cuentas.</p>

                        <p class="card-text">Para probarlo puedes usar <a href="https://www.postman.com/">Postman</a> a la ruta 127.0.0.1:8000/api/users
                        con los diferentes métodos http.<br>
                        Recuerda rellenar el body cómo form-data en el metodo POST con los campos name, email y password y los campos que desees modificar en el metodo PUT/PATCH cómo x-www-form-urlencoded.</p>
                        <ul id="users">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.axios.get('/api/users')
            .then((response) => {
                const usersElements = document.getElementById('users');

                let users = response.data;

                users.forEach((user, index) => {
                    let element = document.createElement('li');

                    element.setAttribute('id', user.id);
                    element.setAttribute('class', 'list-group-item');

                    element.innerText = user.name;

                    usersElements.appendChild(element);
                });
            });

    </script>

    <script>
        Echo.channel('users')
            .listen('UserCreated', (e) => {
                const usersElements = document.getElementById('users');

                let element = document.createElement('li');


                
                element.setAttribute('class', 'list-group-item bg-success');
                element.setAttribute('id', e.user.id);;

                setInterval(function() {
                    element.classList.remove('bg-success');
                }, 3000);

                element.innerText = e.user.name;

                usersElements.appendChild(element);
            })
            .listen('UserUpdated', (e) => {
                let element = document.getElementById(e.user.id);

                element.setAttribute('class', 'list-group-item bg-primary');
                console.log(element.classList)

                setInterval(function() {
                    element.classList.remove('bg-primary');
                }, 3000);

                element.innerText = e.user.name;
            })
            .listen('UserDeleted', (e) => {
                let element = document.getElementById(e.user.id);

                element.parentNode.removeChild(element);
            });

    </script>
@endpush
