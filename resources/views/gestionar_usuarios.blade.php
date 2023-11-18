<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/caraguino.png')}}" />
    <title>GUINO | Usuarios</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/gestion_pregunta.css') }}">
</head>

<body>
    <div class="navbar">
        <nav style="box-shadow: none !important;">
            <div class="nav-wrapper">
                <img src="{{ asset(auth()->user()->ruta_foto) }}" alt="" class="circle responsive-img logo">
                <span class="brand-logo hide-on-med-and-down" style="color: #121212;">{{ auth()->user()->name .' '. auth()->user()->apellido_paterno ." ". auth()->user()->apellido_materno}}</span>
                <span class="sub-brand-logo indigo-text hide-on-med-and-down">{{ auth()->user()->email }}</span>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    @if(auth()->user()->tipo_usu == 0)
                    @if (auth()->user()->subscripcion == 0)
                    <li>
                        <a href="#" id="vidas-link" class="modal-trigger" style="font-weight: bolder; font-size: 1.2rem; color: #869DF1;">
                            <i class="material-icons left red-text">favorite</i>
                            <span id="vidas">{{ auth()->user()->vidas }}</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->subscripcion == 0)
                    <li><a href="#suscripcion" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem; color: #869DF1;"><i class="material-icons left teal-text text-lighten-2">stars</i>Gratis</a></li>
                    @else
                    <li><a href="#suscripcion" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem; color: #869DF1;"><i class="material-icons left teal-text text-lighten-2">stars</i>Premiun</a></li>
                    @endif
                    @else
                    <li><a href="#" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem; color: #869DF1;"><i class="material-icons left teal-text text-lighten-2">stars</i>Administrador</a></li>
                    @endif
                    <li><a href="/logout" class="waves-effect waves-light btn red accent-2" style="border-radius: 50px;"><i class="material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
        <li><a href=""><i class="material-icons left">person</i>{{ auth()->user()->name .' '. auth()->user()->apellido_paterno ." ". auth()->user()->apellido_materno}}</a></li>
        <li><a href=""><i class="material-icons left">email</i>{{ auth()->user()->email }}</a></li>
        @if(auth()->user()->tipo_usu == 0)
        @if (auth()->user()->subscripcion == 0)
        <li><a href="#" id="vidas-link" class="modal-trigger" style="font-weight: bolder; font-size: 1.2rem;"><i class="material-icons left red-text">favorite</i> <span id="vidas">{{ auth()->user()->vidas }}</span>
            </a></li>
        @endif

        @if (auth()->user()->subscripcion == 0)
        <li><a href="#suscripcion" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem;"><i class="material-icons left teal-text text-lighten-2">stars</i>Gratis</a></li>
        @else
        <li><a href="#suscripcion" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem;"><i class="material-icons left teal-text text-lighten-2">stars</i>Premiun</a></li>
        @endif

        @else
        <li><a href="#" class="modal-trigger" style="font-weight: bold; font-size: 1.1rem; color: #869DF1;"><i class="material-icons left teal-text text-lighten-2">stars</i>Administrador</a></li>
        @endif
        <li><a href="/logout"><i class="material-icons left red-text text-accent-2">exit_to_app</i>Cerrar Sesion</a></li>
    </ul>
    <main>
        <div class="container">
            <div class="row up_section">
                <div class="col s12 m12 l8">
                    <h4 class="indigo-text"><i class="material-icons indigo-text">group</i> Usuarios</h4>
                </div>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <script>
                    toast('{{ $error }}')
                </script>
                @endforeach
                @endif
                <div class="col s12 m12 l4" style="margin-top: 2%;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar</label>
                    </div>
                </div>
            </div>
            <div class="table-container">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Aciertos</th>
                            <th>Racha</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['name']. ' ' .$usuario['apellido_paterno']. ' ' .$usuario['apellido_materno']  }}</td>
                            <td>{{ $usuario['email'] }}</td>
                            <td class="aciertos">{{ $porcentajes[$usuario->id] }}%</td>
                            <td class="racha">{{ $niveles[$usuario->id] }}</td>
                            <td class="boton"><a href="{{ route('ver_usuario_id', $usuario['id']) }}" class="waves-effect waves-light btn-small blue darken-4" style="border-radius: 50px;"><i class="material-icons">visibility</i></a></td>
                            <td class="boton"><a class="waves-effect waves-light btn-small modal-trigger red darken-1" href="#eliminar_modal" style="border-radius: 50px;" onclick="setCategoryId('{{ $usuario->id }}')"><i class="material-icons">delete</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="spacer"></div>
    <div class="footer-fixed">
        <footer class="">
            <nav class="z-depth-0">
                <div class="nav-wrapper indigo">
                    <ul class="justify">
                        <li><a href="{{ route('profile') }}"><i class="material-icons">person</i></a></li>
                        @if(auth()->user()->tipo_usu == 1)
                        <li><a href="{{ route('gestionar_usuarios') }}" style="background-color: #869DF1; border-radius: 10px;"><i class="material-icons indigo-text">group</i></a></li>
                        @endif
                        @if(auth()->user()->tipo_usu == 0)
                        <li><a href="{{ route('preguntas_normales',1) }}" style="background-color: #869DF1; border-radius: 10px;"><i class="material-icons indigo-text">lightbulb</i></a></li>
                        @endif
                        <li><a href="{{ route('desafio') }}"><i class="material-icons">grade</i></a></li>
                        <li><a href="{{route('home')}}"><i class="material-icons">home</i></a></li>
                        <li><a href="{{route ('gestionar_pregunta')}}"><i class="material-icons">format_list_bulleted</i></a></li>
                    </ul>
                </div>
            </nav>
        </footer>
    </div>

    <!--Estructura de modals-->

    <div id="eliminar_modal" class="modal">
        <div class="modal-content">
            <h4 class="red-text">¿Estás seguro de que quieres eliminar este usuario?</h4>
            <p>Esta acción no se puede deshacer.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            <a href="eliminar_usuario" class="waves-effect waves-red btn-flat" id="confirmarEliminar">Aceptar</a>
        </div>
    </div>

    <div id="mas_corazon" class="modal">
        <div class="modal-content">
            <h4 class="red-text">¿Quieres más corazones?</h4>
            <div class="divider"></div>
            <h5>Regenerarás un <i class="material-icons red-text">favorite</i> en <span id="tiempo-restante" class="indigo-text" style="font-weight: bolder;"></span></h5>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            <a href="{{ route('comprarVida') }}" class="waves-effect waves-red btn-flat" id="confirmarEliminar">Comprar <span class="light-green-text text-lighten-2">$700</span></a>
        </div>
    </div>

    <div id="suscripcion" class="modal">
        <div class="modal-content center-align">
            <h4>Subscripciones de <span class="indigo-text" style="font-weight: bolder;">GÜINO</span></h4>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-sub">
                        <div class="center-align">
                            <i class="material-icons large blue-grey-text text-lighten-3">stars</i>
                            <h5 class="indigo-text">Suscripción Gratuita</h5>
                        </div>
                        <div class="divider"></div>
                        <ul class="center-align">
                            <li>Vidas limitadas</li>
                            <!--<li>Anuncios</li>-->
                        </ul>
                        <div class="center-align">
                            @if(auth()->user()->subscripcion == 0)
                            <a href="{{ route('comprarSubscripcion',0) }}" class="waves-effect waves-light btn green" disabled><i class="material-icons left">attach_money</i>Comprar <span class="light-green-text text-lighten-2">(Gratis)</span></a> <!-- Botón -->
                            @else
                            <a href="{{ route('comprarSubscripcion',0) }}" class="waves-effect waves-light btn green"><i class="material-icons left">attach_money</i>Comprar <span class="light-green-text text-lighten-2">(Gratis)</span></a> <!-- Botón -->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l12">
                    <div class="card-sub">
                        <div class="center-align">
                            <i class="material-icons large teal-text text-lighten-2">stars</i>
                            <h5 class="indigo-text">Suscripción Premiun</h5>
                        </div>
                        <div class="divider"></div>
                        <ul class="center-align">
                            <li>Vidas ilimitadas</li>
                            <!--<li>Sin anuncios</li>-->
                            <li>Consultoria con profesionales</li>
                        </ul>
                        <div class="center-align">
                            @if(auth()->user()->subscripcion == 1)
                            <a href="{{ route('comprarSubscripcion',1) }}" class="waves-effect waves-light btn green" disabled><i class="material-icons left">attach_money</i>Comprar <span class="light-green-text text-lighten-2">$2.000</span></a> <!-- Botón -->
                            @else
                            <a href="{{ route('comprarSubscripcion',1) }}" class="waves-effect waves-light btn green"><i class="material-icons left">attach_money</i>Comprar <span class="light-green-text text-lighten-2">$2.000</span></a> <!-- Botón -->
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function actualizarVidasEnTiempoReal() {
            $.ajax({
                url: '{{ route("actualizarVidas") }}',
                method: 'GET',
                success: function(response) {
                    $('#vidas').text(response.vidas);
                    actualizarTiempoRestante(response.marca_tiempo);

                    if (response.vidas >= 5) {
                        $('#vidas-link').attr('href', '#'); // Enlace vacío o '#', según tus necesidades
                    } else {
                        $('#vidas-link').attr('href', '#mas_corazon');
                    }
                },
                error: function(error) {
                    console.error('Error al actualizar las vidas:', error);
                }
            });
        }

        function actualizarTiempoRestante(marcaTiempo) {

            var ahora = new Date();

            var ultimaActualizacion = new Date(marcaTiempo.replace(/-/g, '/'));

            var diferencia = ultimaActualizacion.getTime() + (15 * 60 * 1000) - ahora.getTime();

            var minutosRestantes = Math.floor(diferencia / (60 * 1000));
            var segundosRestantes = Math.floor((diferencia % (60 * 1000)) / 1000);

            $('#tiempo-restante').text(minutosRestantes + ':' + (segundosRestantes < 10 ? '0' : '') + segundosRestantes);
        }

        setInterval(actualizarVidasEnTiempoReal, 1000);
    </script>
    <script>
        function setCategoryId(id) {
            var confirmarEliminarLink = document.getElementById('confirmarEliminar');
            confirmarEliminarLink.href = 'eliminar_usuario/' + id;

            var modal = M.Modal.getInstance(document.getElementById('eliminar_modal'));
            modal.open();
        }
    </script>

    <script src="{{ asset('materialize/js/materialize.js')}}"></script>
    <script src="{{ asset('js/navbar.js')}}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
</body>

</html>