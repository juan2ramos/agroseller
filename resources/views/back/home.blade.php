@extends('layoutBack')

@section('content')
    @if(session('messageError'))
        <div class="MessagePlatform row middle center">
            <div class="MessagePlatform-content">
                <span class="MessagePlatform-close">X</span>
                <h2>Error en compra</h2>
                <p>No puedes realizar la compra.</p>
                <p>Debes loguearte o registrarte como proveedor.</p>
                <p>Gracias por elegirnos.</p>
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
            </div>
        </div>
    @endif
@endsection