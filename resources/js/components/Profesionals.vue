<template>
    <!-- Main content -->
    <!-- Default box -->
    <main class="main">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profesionales</h3>
                <button type="button" class="btn btn-secondary" @click="AbrirModal('Profesionals', 'Registrar')">
                    <i class="fas fa-plus"></i>&nbsp;Nuevo
                </button>

                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="remove"
                        title="Remove"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="display" style="width:100%" id="tabla">
                    <thead>
                        <tr>
                            <th style="width: 3%">
                                Id
                            </th>
                            <th style="width: 14%">
                                Documento
                            </th>
                            <th style="width: 14%">
                                Nombre
                            </th>
                            <th style="width: 14%">
                                Apellido
                            </th>
                            <th style="width: 22%">
                                Habilidades
                            </th>
                            <th style="width: 11%">
                                Salario
                            </th>
                            <th style="width: 10%">
                                Disponible
                            </th>
                            <th style="width: 12%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="datos in arrayProfesionals" :key="datos.id">
                            <td v-text="datos.id"></td>
                            <td v-text="datos.documento"></td>
                            <td v-text="datos.nombre"></td>
                            <td v-text="datos.apellido"></td>
                            <td v-text="datos.habilidades"></td>
                            <td v-text="datos.salario"></td>
                            <td class="project-state">
                                <div v-if="datos.disponible == 1">
                                    <span class="badge badge-success">Activo</span>
                                </div>
                                <div v-else>
                                    <span class="badge badge-danger">Desactivado</span>
                                </div>
                            </td>
                            <td class="project-actions text-right">
                                <!--<a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              Ver
                          </a>
                          -->
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Editar
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Eliminar
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-check"> </i>
                                    Activar
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!--Inicio del modal agregar/actualizar
        <div
            :class="{'mostrar' : modal}"
            class="modal fade"
            id="modalNuevo"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button type="button" class="close" aria-label="Close" @click="CerrarModal()">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            action=""
                            method="post"
                            enctype="multipart/form-data"
                            class="form-horizontal"
                        >
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="number-input"
                                    >Documento:</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Numero documento"
                                        step="1"
                                        v-model="documento"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Nombre:</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nombre profesional"
                                        v-model="nombre"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Apellido:</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Apellido profesional"
                                        v-model="apellido"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="textarea"
                                    >Habilidades:</label
                                >
                                <div class="col-md-9">
                                    <textarea class="form-control" v-model="habilidades"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="number-input"
                                    >Salario:</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Salario profesional"
                                        v-model="salario"
                                        step="1"
                                    />
                                </div>
                            </div>
                            <div class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="CerrarModal()">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-primary" v-if="tipoAccion == 1" @click="RegistrarProfesionals()">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-primary" v-if="tipoAccion == 2">
                            Actualizar
                        </button>
                    </div>
                </div>
                <!- /.modal-content ->
            </div>
            <!- /.modal-dialog ->
        </div>-->
        <!--Fin del modal-->
    </main>
</template>

<script>
export default {
    data(){
        return{
            modal : 0,
            tituloModal : '',
            tipoAccion : 0,
            documento : '',
            nombre : '',
            apellido : '',
            habilidades : '',
            salario : '',
            arrayProfesionals:[]
        }
    },

    methods:{
        ListarProfesionals(){
            let me = this;
            
            axios.get('/profesionals')
            .then(function (response) {
                me.arrayProfesionals = response.data;
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },

        AbrirModal(modelo, accion, data){
            switch(modelo){
                case "Profesionals":{
                    switch(accion){
                        case "Registrar":{
                            this.modal = 1,
                            this.tituloModal = 'Registrar profesional',
                            this.tipoAccion = 1,
                            this.documento = '',
                            this.nombre = '',
                            this.apellido = '',
                            this.habilidades = '',
                            this.salario = ''                 
                            break;
                        }
                    }
                }
            }
        }
    },

    CerrarModal(){
        this.modal = 0,
        this.tituloModal = '',
        this.tipoAccion = 0,
        this.documento = '',
        this.nombre = '',
        this.apellido = '',
        this.habilidades = '',
        this.salario = '' 
    },

    RegistrarProfesionals(){
        let me = this;
        axios.post('/profesionals/registrar',{
            'documento' : this.documento,
            'nombre' : this.nombre,
            'apellido' : this.apellido,
            'habilidades' : this.habilidades,
            'salario' : this.salario
        })
        .then(function (response) {
            me.CerrarModal();
            me.ListarProfesionals();
            console.log(response);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
    },

    mounted() {
        //console.log("Construyendo el Componente");
        this.ListarProfesionals();
    }
};
</script>
<style>
.modal-content{
    width: 100% !important;
    position: absolute !important;
    margin-top: -300px !important;
}

.mostrar{
    display: list-item !important;
    opacity: 1 !important;
    background-color: rgba(0,0,0,0.3) !important;
    /*position: absolute !important;*/
}
</style>
