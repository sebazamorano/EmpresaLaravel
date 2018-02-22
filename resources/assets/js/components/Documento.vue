<template>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-lg-2" for="">Tipo Documento</label>
                <div class="col-lg-6">
                    <select v-model="documento.tipo_documento_id" class="form-control">
                        <option value="">Selecciona tipo documento</option>
                        <option :value="tp.id" v-for="tp in tipoDocumentos">{{ tp.nombre }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2" for="">Proveedor</label>
                <div class="col-lg-6">
                    <select v-model="documento.proveedor_id" class="form-control">
                        <option value="">Selecciona proveedor</option>
                        <option :value="p.id" v-for="p in proveedores">{{ p.nombre }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2" for="">Forma de Pago</label>
                <div class="col-lg-6">
                    <input class="form-control" v-model="documento.forma_pago" type="text" value="">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline">
                    <div class="form-group">
                        <select v-model="categoria_id" class="form-control">
                            <option value="">Selecciona Categoria</option>
                            <option :value="c.id" v-for="c in aCategorias">{{ c.nombre }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select v-model="productoSelected" class="form-control">
                            <option value="">Selecciona Producto</option>
                            <option :value="p" v-for="p in aProductos">{{ p.nombre }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" :value="productoSelected.precio" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" v-model="cantidad" class="form-control" placeholder="Cantidad">
                    </div>
                    <button class="btn btn-success" @click.prevent="addDetalle"><i class="fa fa-plus"></i></button>
                </form>
            </div>
            <hr>
            <documento-detalle :detalles="detalles"></documento-detalle>
            <button class="btn btn-success" @click="save">Guardar</button>
        </div>
    </div>
</template>
<script>
    import DocumentoDetalle from './DocumentoDetalle';

    export default {
        props: ['tipoDocumentos', 'proveedores'],
        data () {
            return {
                documento:{
                   tipo_documento_id: '',
                   proveedor_id: '',
                   forma_pago: ''
                } ,
                id_documento: '',
                aCategorias: [],
                aProductos: [],
                categoria_id: '',
                productoSelected: '',
                cantidad: 1,
                detalles:[]
            }
        },
        created () {
            this.getCategorias();
        },
        methods: {
            save: function () {
                let self = this;

                axios.post('/api/v1/documento', this.documento).then(function (response) {
                    axios.post('/api/v1/documento/' + response.data.id + '/detalles', self.detalles);
                })
            },
            addDetalle: function () {
                this.detalles.push({
                    id: this.productoSelected.id,
                    nombre: this.productoSelected.nombre,
                    cantidad: this.cantidad,
                    valor: this.cantidad * this.productoSelected.precio
                });
            },
            getCategorias: function () {
                let self = this;
                axios.get('/api/v1/categorias').then(function (response) {
                    self.aCategorias = response.data;
                });
            },
            getCategoriasWithProducts: function ($categoria) {
                let self = this;
                axios.get('/api/v1/categorias/' + $categoria + '/productos').then(function (response) {
                    self.aProductos = response.data.productos;
                });
            }
        },
        watch: {
            categoria_id: function (value) {
                this.getCategoriasWithProducts(value);
            }
        },
        components: {
            DocumentoDetalle
        }
    }
</script>