<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Constructora YAVARI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Hairline&display=swap" rel="stylesheet">  
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet" />
</head>
<style>
.brand{
    font-family: 'Bungee Hairline', cursive;
    font-weight:bold;
}
</style>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="brand">Constructora Yavari</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li  class="nav-item">
                                <a href="{{route('items.index')}}" class="nav-link">
                                Registros
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="{{route('projects.index')}}" class="nav-link">
                                Obras
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
        @yield('scripts')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
		new Vue({
			el: "#tabla",
            vuetify: new Vuetify(),
            created() {
                axios.get('/indexCall')
                     .then(response => {
                         this.lista = response.data.data;
                         console.log(response.data.data);
                         
                         this.lista.forEach(element => {
                             this.proyectos.push({
                                 id:element.id,
                                 proyecto:element.project.nombre_proyecto,
                                 toperacion:element.tipo_operacion,
                                 fecha:element.fecha_registro,
                                 descripcion:element.descripcion,
                                 cantidad:element.cantidad,
                                 precio:element.precio_unitario,
                                 total:element.monto_total,
                                 trecurso:element.tipo_recurso,
                                 proveedor:element.proveedor,
                                 tcomprobante:element.tipo_comprobante,
                                 ncomprobante:element.numero_comprobante,
                                });
                         });

                        });
            },
			data() {
				return {
                    lista:[],
					search: "",
					headers: [
						{
							text: "ID",
							align: "start",
							sortable: false,
							value: "id",
						},
						{ text: "Proyecto", value: "proyecto" },
						{ text: "T. Operacion", value: "toperacion" },
						{ text: "Fecha", value: "fecha" },
						{ text: "Descripcion", value: "descripcion" },
                        { text: "Cantidad", value: "cantidad" },
						{ text: "Monto Total", value: "total" },
						{ text: "Tipo Recurso", value: "trecurso" },
                        { text: "Proveedor", value: "proveedor" },
                        { text: "Tipo Comprobante", value: "tcomprobante" },
						{ text: "N° Comprobante", value: "ncomprobante" },
                        
                        
					],
					proyectos: [
					],
				};
			},
		});
	</script>
<script type="module">
import calculo from "{{asset('js/calculo.js')}}";
const app = new Vue({
    el: '#app-items',
    data: {
    },
    components:{
      calculo,
    }
  })
</script>
</html>
