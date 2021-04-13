@extends('plantilla')
@section('contenido')
    <template v-if="menu == 0">
        Soy el home
    </template>
    <template v-if="menu == 1">
        <profesionals></profesionals>
    </template>
@endsection